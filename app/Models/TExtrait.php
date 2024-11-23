<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TExtrait extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_registre',
        'document',
        'qtecmde',
        'user_id',
        'modelivraison_id',
        'commune_id',
        'ttypeprestation_id',
        'codecommande',
        'montanttva',
        'montanttc',
        'nom_complet',
        'prixservice_id',
        'prixservice',
        'datelivreprevu',
        'adresse',
        'status',
    ];

    public function commune()
    {
        return $this->belongsTo(TCommune::class, 'commune_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    /**
     * Génère un code d'extrait unique pour une commande
     *
     * @return string
     */
    public static  function generateExtraitCode()
    {

        $prefix = 'EX';
        $year = Carbon::now()->format('y');
        $lastCode = self::where('codecommande', 'like', "EX$year-%")
                         ->orderBy('codecommande', 'desc')
                         ->first();
        if ($lastCode)
        {
            $lastNumber = intval(substr($lastCode->codecommande, 5));
            $newNumber = $lastNumber + 1;
        } else
        {
            $newNumber = 1;
        }
        $newNumberFormatted = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        $newCode = "{$prefix}{$year}-{$newNumberFormatted}";

        return $newCode;
    }
}
