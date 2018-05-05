<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factureline extends Model
{
    //
    protected $fillable = ['item_name','item_description','quantity','price','notes','due_date','tax','facture_id'];

}
