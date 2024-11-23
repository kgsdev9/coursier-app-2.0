<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\TCommune;
use App\Models\TExtrait;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class LoginComponent extends Component
{
    use WithFileUploads;

    public $phone;

    public $adresse;
    public $n_registre;
    public $prixserviceinlivraison = 3000;
    public $requestType;
    public $deliveryMode;
    public $servicePrice = 0;
    public $quantite = 2;
    public $numeroExtrait;
    public $commune_id;
    public $montantTVA;
    public $montantTC;
    public $user_id;

    public $document;

    public $nom_complet;
    public $codeCommande;
    public $totalPrice = 0;
    public $currentStep = 1; // Suivi de l'étape actuelle

    // Validation des données en fonction de l'étape
    protected $rules = [
        'phone' => 'required|numeric',
    ];

    // Fonction de validation en fonction de l'étape
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // Mise à jour du prix total lorsque la quantité change
        if ($propertyName === 'quantite') {
            $this->updateTotalPrice();
        }
    }





    // Gestion de la validation et du passage aux étapes suivantes
    public function save()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'phone' => 'required',
            ]);

            // Vérification si le numéro de téléphone existe déjà
            $user = User::where('telephone', $this->phone)->first();

            if ($user) {
                // Connexion de l'utilisateur si le numéro existe
                Auth::login($user);
            } else {
                // Création et connexion d'un nouvel utilisateur
                $user = User::create([
                    'telephone' => $this->phone,
                ]);

                Auth::login($user);
            }

            // Stockage de l'ID de l'utilisateur pour utilisation future
            $this->user_id = $user->id;

            // Passage à l'étape suivante
            $this->currentStep = 2;
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'requestType' => 'required',
            ]);

            // Passage à l'étape suivante
            $this->currentStep = 3;
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'quantite' => 'required|integer|min:2',
            ]);

            // Mise à jour du prix total en fonction de la quantité
            $this->updateTotalPrice();

            // Passage à l'étape suivante
            $this->currentStep = 4;
        } elseif ($this->currentStep == 4)
        {

        }
    }

    // Mise à jour du prix total en fonction de la quantité
    public function updateTotalPrice()
    {
        $basePricePerExtrait = 500;
        $this->totalPrice = $this->quantite * $basePricePerExtrait;
    }

    // Calcul du prix total en fonction du mode de livraison

    // Réinitialisation du formulaire
    public function resetForm()
    {
        $this->phone = '';
        $this->requestType = '';
        $this->deliveryMode = '';
        $this->servicePrice = 0;
        $this->quantite = 1;
        $this->numeroExtrait = '';
        $this->communeId = '';
        $this->montantTVA = '';
        $this->montantTC = '';
        $this->user_id = '';
        $this->codeCommande = '';
        $this->totalPrice = 0;
        $this->currentStep = 1;
    }

    public function goBack()
    {
        if ($this->currentStep > 1)
        {
            $this->currentStep--;
        }
    }


    // Fonction pour changer d'étape manuellement
    public function goToStep($step)
    {
        $this->currentStep = $step;
    }

    public function saveCommande() {

        $this->validate([
            'n_registre' => 'required|string',
            'commune_id' => 'required|integer',
            'nom_complet' => 'required|string',
            'adresse' => 'required|string',
            'document' => 'required',
            'quantite' => 'required',
        ]);


        $image = md5($this->document . microtime()).'.'.$this->document->extension();
        $this->document->storeAs('extraits', $image);
        $codeextrait  = TExtrait::generateExtraitCode();
        TExtrait::create([
            'n_registre' => $this->n_registre,
            'user_id' => $this->user_id,
            'nom_complet'=> $this->nom_complet,
            'document'=>  $image,
            'qtecmde' => $this->quantite,
            'commune_id' => $this->commune_id ?? 1,
            'modelivraison_id' => $this->deliveryMode,
            'codecommande' =>$codeextrait,
            'montanttva' => 0,
            'prixservice' => 1500,
            'status' => 1,
            'datelivreprevu' => now(),
            'adresse' =>  $this->adresse,
            'montanttc' => $this->totalPrice + $this->prixserviceinlivraison,
        ]);

        session()->flash('success', 'Demande d\'extrait de naissance enregistrée avec succès.');
        $this->dispatch('navigateToConfirmation');

    }

    public function render()
    {
        $listecommune  = TCommune::all();

        return view('livewire.login-component', compact('listecommune'));
    }
}
