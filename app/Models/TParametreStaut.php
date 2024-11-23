<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TParametreStaut extends Model
{
    use HasFactory;

    protected $fillable = [
        'typestatut',
        'codeintparametre',
        'libellestatut',
    ];
}
