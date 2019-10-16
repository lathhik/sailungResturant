<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public function foodFoodType()
    {
        return $this->hasMany('App\models\backend\FoodDetails');
    }
}
