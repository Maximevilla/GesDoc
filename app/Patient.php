<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = ['mutuelle','numero_ss',
       'nom', 'prenom', 'naissance','addresse', 'telfixe','telmobile',
       'mail','sexe','medecintraitant','metier','users_id','notes','allergies',
       ];
}
