<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';

    public function role(){
        return $this->belongsTo('App\models\backend\Role','role_id','id');
    }


}
