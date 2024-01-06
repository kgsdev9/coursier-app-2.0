<?php

namespace App\Imports;

use App\Models\Candidature;
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
            'nom' => $row[1],
            'prenom' => $row[1],
            'email' => rand(10, 1299898988),
            'matricule' => rand(100,2002233),
            'identifiant_permanent' => $row[1],
            'telephone' => $row[1],
            'serie' =>$row[1],
            'centre_composition' => $row[1],
            'ville_composition' => $row[1],
            'numero_bts' => $row[1],
            'mention' => $row[1],
            'point_bac' => $row[1],
            'ecole_origine' => $row[1],
            'numero_table' => $row[1],
            'photo' => $row[1],
            'sexe' => $row[1],
            'user_id'=> Auth::user()->id
        ]);

        dump('created');

    }
}
