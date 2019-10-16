<?php

namespace App\Http\Controllers\frontend;

use App\models\backend\Blog;
use App\models\backend\BlogBlogCategory;
use App\models\frontend\BlogUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * shows blog page
     */
    public function index()
    {

        return view('frontend/pages/blog/blog');
    }

    /** view blog details page
     * @param $id
     */
    public function viewBlogDetails($slug)
    {
//        $blog = Blog::with('comments', 'comments.blogUser')->find(6);
//        return $blog;

        $blogs = Blog::with('comments', 'comments.blogUser')->where('slug', '=', $slug)->get();
//        return $blog;
        foreach ($blogs as $blog) {

            return view('frontend/details/blog-details', compact(['blog', 'users']));
        }


    }


    /** select blogs by related category
     * @return string
     */
    public function blogByCategory($id)
    {
        $blogs_by_cat = BlogBlogCategory::with('blog')
            ->where('blog_category_id', '=', $id)
            ->paginate(2);

        return view('frontend/pages/blog/blog-by-category')->with('blogs_by_cat', $blogs_by_cat);
    }


    /** select most popular blog
     * @param $slug
     */
    public function popBlog($slug)
    {
        $pop_blog = Blog::with('comments', 'comments.blogUser')
            ->where('slug', '=', $slug)->get();

        foreach ($pop_blog as $blog) {
            return view('frontend/details/pop-blog-details', compact(['blog', 'users']));
        }
    }

    public function blogArchive($month)
    {
        $monthNumber = date('n', strtotime($month));
        $blogs = Blog::whereMonth('created_at', '=', $monthNumber)->paginate(2);

        return view('frontend/pages/blog/blog-archive')->with('blogs', $blogs);
    }

    public function searchBlog(Request $request)
    {
        $search = $request->search;

        if (empty($search)) {
            return redirect()->back();
        }

        $searchedBlogs = Blog::query()
            ->where('title', 'LIKE', '%' . $search . '%')
            ->where('slug', 'LIKE', '%' . $search . '%')
            ->paginate(1);

        if (count($searchedBlogs) == 0) {
            return redirect()->back()->with('fail', 'Sorry There Were No Post For ' . "\"$search\"");
        }
        return view('frontend/pages/blog/search-results')->with('searchedBlogs', $searchedBlogs);
    }
}
