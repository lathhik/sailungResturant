<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\Blog;
use App\models\backend\BlogBlogCategory;
use App\models\backend\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BlogController extends Controller
{

    /** saves data to blogs table
     * @param $data
     * @return mixed
     */
    public function createBlog($data)
    {
        return Blog::create($data);
    }


    /** saves data to blogs_blogs_categories table
     * @param $data
     * @return mixed
     */
    public function createBlogBlogCategory($data)
    {
        return BlogBlogCategory::create($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBlog()
    {
        $categories = BlogCategory::all();
        return view('backend/pages/blog/add-blog')->with('categories', $categories);
    }


    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addBlogAction(Request $request)
    {

        $this->validate($request, [
            'blog_title' => [
                'required',
                'regex:/^[A-Za-z0-9\s]{3,50}$/',
            ],
            'slug' => 'required',
            'image' => 'required|image',
            'category' => 'required',
            'description' => 'required|min:100',
        ]);

        $blog_data = new Blog();
        $blog_data->title = $request->blog_title;
        $blog_data->slug = $request->slug;
        $blog_data->description = $request->description;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/blog'))) {
                mkdir(public_path('custom/backend/images/blog'));
            }

            $image->resize(820, 461)->save(public_path('custom/backend/images/blog/' . $newName));

            $blog_data->image = $newName;
        }

        try {
            $blog_data->save();

            foreach ($request->category as $cat) {
                $blog_blog_data = new BlogBlogCategory();
                $blog_blog_data->blog_id = $blog_data->id;
                $blog_blog_data->blog_category_id = $cat;

                $blog_blog_data->save();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'There was some problem');
        }
        return redirect()->route('view-blog')->with('success', 'Blog was successfully created');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewBlog()
    {
        $blogs = Blog::all();
        return view('backend/pages/blog/view-blog')->with('blogs', $blogs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editBlog($id)
    {
        $blog = Blog::find($id);
        $blog_categories = BlogCategory::all();

        return view('backend/pages/blog/edit-blog')
            ->with('blog', $blog)
            ->with('blog_categories', $blog_categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateBlogAction(Request $request, $id)
    {
        $this->validate($request, [
            'blog_title' => [
                'required',
                'regex:/^[A-Za-z0-9\s]{3,50}$/',
            ],
            'slug' => 'required',
            'categories' => 'required',
            'description' => 'required|min:100'
        ]);

        $updated_blog_data = Blog::find($id);
        $updated_blog_data->title = $request->blog_title;
        $updated_blog_data->slug = $request->slug;
        $updated_blog_data->description = $request->description;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file);

            if (file_exists(public_path('custom/backend/images/blog/' . $updated_blog_data->image))) {
                unlink(public_path('custom/backend/images/blog/' . $updated_blog_data->image));
            }

            $image->resize(820, 461)->save(public_path('custom/backend/images/blog/' . $newName));

            $updated_blog_data->image = $newName;

            $updated_blog_blog_data = BlogBlogCategory::where('blog_id', '=', $id);
            $updated_blog_blog_data->delete();
            try {
                $updated_blog_data->save();
                foreach ($request->categories as $cat) {
                    $updated_blog_blog_data = new BlogBlogCategory();
                    $updated_blog_blog_data->blog_id = $id;
                    $updated_blog_blog_data->blog_category_id = $cat;
                    $updated_blog_blog_data->save();
                }

            } catch (Exception $e) {
                return redirect()->route('view-blog')->with('fail', 'There was some problem');
            }
            return redirect()->route('view-blog')->with('success', 'Blog was updated successfully');
        }

        $updated_blog_blog_data = BlogBlogCategory::where('blog_id', '=', $id);
        $updated_blog_blog_data->delete();

        try {
            $updated_blog_data->save();
            foreach ($request->categories as $cat) {
                $updated_blog_blog_data = new BlogBlogCategory();
                $updated_blog_blog_data->blog_id = $id;
                $updated_blog_blog_data->blog_category_id = $cat;
                $updated_blog_blog_data->save();
            }

        } catch (Exception $e) {
            return redirect()->route('view-blog')->with('fail', 'There was some problem');
        }
        return redirect()->route('view-blog')->with('success', 'Blog was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if (file_exists(public_path('custom/backend/pages/blog/' . $blog->image))) {
            unlink(public_path('custom/backend/pages/blog/' . $blog->image));
        }

        if ($blog->delete()) {
            return redirect()->back()->with('success', 'Blog was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');

    }
}
