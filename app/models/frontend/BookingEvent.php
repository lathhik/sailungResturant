<?php

namespace App\models\frontend;

use App\models\backend\Event;
use App\models\backend\Table;
use Illuminate\Database\Eloquent\Model;

class BookingEvent extends Model
{
    protected $table = 'event_bookings';

//    protected $fillable = ['full_name', 'address', 'no_of_persons', 'email', 'contact', 'event_id', 'created_at', 'updated_at'];


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
