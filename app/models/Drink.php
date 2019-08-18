<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drinks';

    public function drinkType()
    {
        return $this->belongsTo('App\models\DrinkType');
    }

    //$drink->drinkType->name
}
