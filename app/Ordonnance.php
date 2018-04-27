<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    //
    protected $fillable = ['ordo_presente','ord_patient_id','ord_user_id','ord_consult_id','titre','details_ordonnance'];
}
