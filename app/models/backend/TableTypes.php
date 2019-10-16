<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class TableTypes extends Model
{
    public function tables()
    {
        return $this->hasMany('App\models\backend\Table');
    }
}
