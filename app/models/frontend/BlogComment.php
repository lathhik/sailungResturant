<?php

namespace App\models\frontend;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{

    public function blogUser()
    {
        return $this->belongsTo(BlogUser::class,'user_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
