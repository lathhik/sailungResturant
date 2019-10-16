<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $date = ['event_date', 'start_time', 'end_time'];


}
