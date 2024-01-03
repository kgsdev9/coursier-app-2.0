<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_candidature',
        'etat',
        'justificatif',
        'qrcode',
        'candidature_id'
    ];




}
