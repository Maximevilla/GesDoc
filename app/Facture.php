<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //
    protected $fillable = ['discount','total','users_id','patient_id','currency','status','notes','terms','patient_id'];
}
