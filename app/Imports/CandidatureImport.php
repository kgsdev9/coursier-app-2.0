<?php

namespace App\Imports;

use App\Models\Candidature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatureImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return Candidature::create([
            'nom' => $row[1] ?? 'rien',
            'prenom' => $row[2] ?? 'rien',
            'email' => Str::random(10),
            'matricule' => Str::random(10),
            'identifiant_permanent' => $row[5] ?? 'ss',
            'telephone' => $row[6] ?? 'ss',
            'serie' =>$row[7] ?? 'ss',
            'centre_composition' => $row[9] ?? 'rien',
            'ville_composition' => $row[10] ?? 'rien',
            'numero_bts' => $row[11] ?? 'rien',
            'mention' => $row[12] ?? 'rien',
            'point_bac' => $row[13] ?? 'rien',
            'ecole_origine' => $row[14] ?? 'rien',
            'numero_table' => $row[15] ?? 'rien',
            'photo' => $row[16] ?? 'rien',
            'sexe' => $row[7] ?? 'es',
            'user_id'=> Auth::user()->id
        ]);

    }
}
