<?php

namespace App\models\frontend;

use App\models\backend\Table;
use Illuminate\Database\Eloquent\Model;
use App\models\frontend\Customer;

class BookingTable extends Model
{
    protected $table = 'booking_tables';

    public function customer()
    {
        return $this->belongsTo('App\models\frontend\Customer', 'user_id');
    }

    public function table()
    {
        return $this->belongsTo('App\models\backend\Table', 'table_id');
    }
}
