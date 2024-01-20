<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable  = [
        'nom',
        'prenom',
        'email',
        'photo',
        'matricule',
        'identifiant_permanent',
        'telephone',
        'serie',
        'contact',
        'point_bac',
        'centre_composition',
        'ville_composition',
        'numero_bts',
        'date_naissance',
        'lieu_naissance',
        'point_bac',
        'ecole_origine',
        'sexe',
        'user_id',
        'numero_table',
        'status',
        'typecandidature_id',
        'filiere_id',
        'nationalite_id',
        'etat'
    ];

    public function filiere()  {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function typecandidature()  {
        return $this->belongsTo(TypeCandidature::class, 'typecandidature_id');
    }

    public function nationalite() {
        return $this->belongsTo(Nationnalite::class, 'nationalite_id');
    }


     /**
     * Récuperation de l'utilisateur qui engagé les candidatures.
     */
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * rechercher les utilisateurs dans la table
     */
    public function scopeSearchCandidature($query, $string)
    {
           return $query->where('nom', 'like','%'.$string.'%')
                        ->orWhere('prenom', 'like', '%'.$string.'%')
                        ->orWhere('identifiant_permanent', 'like', '%'.$string.'%')
                        ->orWhere('matricule', 'like', '%'.$string.'%');

    }

    /**
     * filtrer les candidatures en fonction de l'tuilisateur
     * qui a effectué la candidature
     */
    public function scopeFilterUserCandidature($query) {
        return $query->where('user_id', Auth::user()->id);
    }

    /**
     * rechercher les utilisateurs dans la table
     */
    public function scopeActive($query, $value)
    {
        return $query->where('active', $value);
    }



}
