<?php

namespace App\Http\Controllers\frontend;

use App\models\backend\Blog;
use App\models\frontend\BlogComment;
use App\models\frontend\BlogUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogCommentController extends Controller
{
    public function addBlogUserComment(Request $request, $id)
    {
        $blog = Blog::find($id);

        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'full_name' => 'required|regex:/^[A-Za-z\s]{3,30}$/',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('blog-comment-form-error', $id)->withErrors($validator)->withInput();
        }else{
            $user = new BlogUser();
            $user->name = $request->full_name;
            $user->email = $request->email;

            $user->save();

            $comment = new BlogComment();
            $comment->user_id = $user->id;
            $comment->blog_id = $id;
            $comment->comments = $request->comment;

            $comment->save();

            return redirect()->route('blog-comment-form-error', $blog->slug);

        }
    }

}
