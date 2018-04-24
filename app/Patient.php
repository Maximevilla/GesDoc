<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
       'nom', 'prenom', 'naissance','addresse', 'telfixe','telmobile',
       'mail','sexe','medecintraitant','metier','users_id','notes',
       ];
}
