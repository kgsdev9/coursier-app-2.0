<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'numero_table'
    ];

    public function getImageUrl(string $photo) {
        return asset('storage/photos/'.$photo);
    }



    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
