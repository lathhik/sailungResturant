<?php

namespace App\models\backend;

use Illuminate\Database\Eloquent\Model;

class BlogBlogCategory extends Model
{
    protected $table = 'blogs_blogs_categories';

    public function blog()
    {
        return $this->belongsTo('App\models\backend\Blog', 'blog_id', 'id');
    }

    public function blogCat()
    {
        return $this->belongsTo('App\models\backend\BlogCategory', 'blog_category_id', 'id');
    }

}
