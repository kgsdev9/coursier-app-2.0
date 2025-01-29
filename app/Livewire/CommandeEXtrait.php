<?php

namespace App\Livewire;

use App\Exports\ExtraitExport;
use App\Models\TCommune;
use App\Models\TExtrait;
use App\Models\TParametreStaut;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class CommandeEXtrait extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $commune_id = null;
    public $statut = null;

    public $created_at ;

    protected $queryString = ['search', 'commune_id', 'statut', 'created_at'];



    public function handlePrint()
    {
        // Récupération des critères
        $search = $this->search;
        $commune_id = $this->commune_id;
        $statut = $this->statut;
        $created_at = $this->created_at;

        // Filtrage basé sur les critères
        $query = TExtrait::query();

        if (!empty($search)) {
            $query->where('codecommande', 'like', '%' . $search . '%');
        }

        if (!empty($commune_id)) {
            $query->where('commune_id', $commune_id);
        }

        if (!empty($statut)) {
            $query->where('status', $statut);
        }

        if (!empty($created_at)) {
            $query->whereDate('created_at', $created_at);
        }

        $extraits = $query->orderByDesc('created_at')->get();

        // Génération du PDF avec DomPDF
        $pdf = Pdf::loadView('pdf.candidatures.liste', [
            'listeextraits' => $extraits
        ])->setPaper('a4', 'landscape');

        // Retourne le PDF en téléchargement
        return response()->stream(function () use ($pdf) {
            echo $pdf->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="extraits.pdf"',
        ]);
    }




    public function printFacture($id)
    {
    // Récupération de l'extrait par ID
        $extrait = TExtrait::find($id);

        // Vérifier si l'extrait existe
        if (!$extrait)
        {
            return response()->json(['message' => 'Extrait non trouvé'], 404);
        }

        // Génération du PDF avec DomPDF
        $pdf = Pdf::loadView('pdf.extrait.print', [
            'extrait' => $extrait
        ])->setPaper('a4', 'portrait'); // ou 'landscape' si vous préférez l'orientation paysage

        // Retourne le PDF en téléchargement
        return response()->stream(function () use ($pdf) {
            echo $pdf->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="extrait.pdf"',
        ]);
    }



    public function valider($id)
    {

        // Récupérer l'enregistrement par son ID
        $extrait = TExtrait::find($id);

        if ($extrait) {

            $extrait->status = 2;
            $extrait->save();

            // Vous pouvez également émettre un événement Livewire pour notifier l'interface utilisateur
            $this->dispatch('extraitUpdated', 'Le statut a été mis à jour avec succès');
        } else {
            // Si l'enregistrement n'est pas trouvé
            $this->dispatch('extraitError', 'Enregistrement non trouvé');
        }
    }

    public function invalider($id)
    {

        // Récupérer l'enregistrement par son ID
        $extrait = TExtrait::find($id);

        if ($extrait) {

            $extrait->status = 1;
            $extrait->save();

            // Vous pouvez également émettre un événement Livewire pour notifier l'interface utilisateur
            $this->dispatch('extraitUpdated', 'Le statut a été mis à jour avec succès');
        } else {
            // Si l'enregistrement n'est pas trouvé
            $this->dispatch('extraitError', 'Enregistrement non trouvé');
        }
    }





    public function exportExcel()
    {
        // Filtrage basé sur les critères
        $search = $this->search;
        $commune_id = $this->commune_id;
        $statut = $this->statut;
        $created_at = $this->created_at;

        // Exporte les données vers Excel avec les critères
        return Excel::download(new ExtraitExport($search, $commune_id, $statut, $created_at), 'extraits.xlsx');
    }


    public function delete($id) {
        $candidature = TExtrait::find($id);
        $candidature->delete();
        // $this->alert('success', 'Demande supprimée avec succès');
        $this->reset();
    }

    public function render()
    {
        // Initialisation de la requête
        $query = TExtrait::query();

        // Application du filtre de recherche
        if ($this->search)
        {
            $query->where('codecommande', 'like', '%' . $this->search . '%');
        }

        if ($this->created_at)
        {
            $query->where('created_at', 'like', '%' . $this->created_at . '%');
        }

        // Application du filtre de commune
        if ($this->commune_id)
        {
            $query->where('commune_id', $this->commune_id);
        }

        if ($this->statut)
        {
            $query->where('status', $this->statut);
        }



        // Récupération des données avec les filtres
        $allextraits = $query->orderByDesc('created_at')->paginate(10);

        // dd(TParametreStaut::where('typestatut', 'documents')->get());
        return view('livewire.commande-e-xtrait', [
            'allextraits' => $allextraits,
            'listestatusparametre' => TParametreStaut::where('typestatut', 'documents')->get(),
            'listecommunes' => TCommune::orderBy('libellecommune')->get(),
        ])->extends('layouts.appdashboard')->section('dashboard');
    }
}
