<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixServivce extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelleprixservice'
    ];
}
