<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    //
    protected $fillable = [
       'cons_patient_id', 'cons_user_id', 'details_consultation','titre',
       ];
}
