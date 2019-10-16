<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drinks';

    public function drinkType()
    {
        return $this->belongsTo('App\models\backend\DrinkType');
    }

    //$drink->drinkType->name
}
