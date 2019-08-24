<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function tableType()
    {
        return $this->belongsTo('App/models/backend/TableTypes');
    }
}
