<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class FoodDetails extends Model
{
    protected $table = 'foods_foods_types';

    public function food()
    {
        return $this->belongsTo('App\models\backend\Food');
    }
    public function foodType()
    {
        return $this->belongsTo('App\models\backend\FoodType');
    }
}
