<?php

namespace App\models\frontend;

use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    public function blogs()
    {
        return $this->hasMany(BlogComment::class);
    }
}
