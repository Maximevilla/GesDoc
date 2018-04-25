<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection, WithHeadings
{
  public function headings(): array
    {
        return [
            'id',
            'Nom',
            'Prenom',
            'Naissance',
            'Adresse',
            'TelFixe',
            'TelMobile',
            'Courriel',
            'Sexe',
            'Medecin Traitant',
            'Metier',
            'Allergies',
            'Notes',
            'Num du medecin',
            'Date creation',
            'Derniere modification'


        ];
    }


    public function collection()
    {
        return \App\Patient::all();
    }
}
