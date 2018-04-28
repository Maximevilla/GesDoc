<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    //
    protected $fillable = ['fichier1url','fichier1titre','fichier2url', 'fichier2titre',
'fichier3url','fichier3titre','fichier4url','fichier4titre','consultation_id'
];

}
