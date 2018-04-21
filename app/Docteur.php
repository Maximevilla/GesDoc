<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    //
    protected $fillable = ['nom','prenom','addresse','codepostal','ville','telfixe','telmobile',
    'mail','web','specialite','users_id',];
}
