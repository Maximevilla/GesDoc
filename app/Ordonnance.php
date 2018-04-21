<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    //
    protected $fillable = ['ord_patient_id','ord_user_id','titre','details_ordonnance'];
}
