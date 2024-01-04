<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'code_transaction',
        'candidature_id',
        'qrcode'
    ];

    public function candidature() {
        return $this->belongsTo(Candidature::class, 'candidature_id');
    }

}
