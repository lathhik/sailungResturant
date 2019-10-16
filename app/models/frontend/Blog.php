<?php

namespace App\models\frontend;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $table = 'blogs';

//    protected $fillable = ['title', 'slug', 'image', 'description', 'created_at', 'updated_at'];


    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }


}


