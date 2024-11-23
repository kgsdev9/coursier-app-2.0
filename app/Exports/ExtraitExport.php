<?php

namespace App\Exports;

use App\Models\TExtrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExtraitExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $commune_id;
    protected $statut;
    protected $created_at;

    // Constructeur pour passer les paramètres
    public function __construct($search, $commune_id, $statut, $created_at)
    {
        $this->search = $search;
        $this->commune_id = $commune_id;
        $this->statut = $statut;
        $this->created_at = $created_at;
    }

    // Méthode pour récupérer les données à exporter
    public function collection()
    {
        $query = TExtrait::query();

        if (!empty($this->search)) {
            $query->where('codecommande', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->commune_id)) {
            $query->where('commune_id', $this->commune_id);
        }

        if (!empty($this->statut)) {
            $query->where('statut', $this->statut);
        }

        if (!empty($this->created_at)) {
            $query->whereDate('created_at', $this->created_at);
        }

        // Récupérer les résultats filtrés
        return $query->get();
    }

    // Méthode pour définir les en-têtes de colonnes Excel
    public function headings(): array
    {
        return [
            'ID',            // ID
            'Code Commande', // Code Commande
            'Commune ID',    // ID de la commune
            'Statut',        // Statut
            'Created At',    // Date de création
        ];
    }
}
