<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';

    public function role(){
        return $this->belongsTo('App\models\Role','role_id','id');
    }


}
