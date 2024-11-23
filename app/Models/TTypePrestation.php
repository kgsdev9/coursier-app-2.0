<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTypePrestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelleprestation',
    ];
}
