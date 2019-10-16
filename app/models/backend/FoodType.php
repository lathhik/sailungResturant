<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = 'foods_types';

    public function foodFoodType()
    {
        return $this->hasMany('App\models\backend\FoodDetails');
    }
}
