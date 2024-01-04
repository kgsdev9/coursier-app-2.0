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
        'centre_composition',
        'ville_composition',
        'numero_bts',
        'mention',
        'point_bac',
        'ecole_origine',
        'sexe',
        'user_id',
        'numero_table',
    ];

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
