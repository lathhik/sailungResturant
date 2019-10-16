<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     *  view add blog category page
     */
    public function addBlogCategory()
    {
        return view('backend/pages/blog/add-blog-category');
    }

    /** view blog categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewBlogCategory()
    {
        $categories = BlogCategory::all();
        return view('backend/pages/blog/view-blog-category')->with('categories', $categories);
    }


    /**
     *  add blog categories
     * @param Request $request
     */
    public function addBlogCategoryAction(Request $request)
    {
        $this->validate($request, [
            'category' => [
                'required',
                'regex:/^[A-Za-z\s]{3,30}$/'
            ]
        ]);

        $blog_category = new BlogCategory();
        $blog_category->categories = $request->category;

        if ($blog_category->save()) {
            return redirect()->route('view-blog-category')->with('success', 'Blog Category was successfully updated');
        }

        return redirect()->back()->with('fail', 'There was some Problem');
    }


    /** view blog category edit page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBlogCategory($id)
    {
        $category = BlogCategory::find($id);

        return view('backend/pages/blog/edit-blog-category')->with('category', $category);
    }


    public function editBlogCategoryAction(Request $request, $id)
    {
        $this->validate($request, [
            'category' => [
                'required',
                'regex:/^[A-Za-z\s]{3,30}$/'
            ]
        ]);

        $category = BlogCategory::find($id);
        $category->categories = $request->category;

        if ($category->save()) {
            return redirect()->route('view-blog-category')->with('success', 'Blog Category was successfully updated');
        }
    }


    /** delete selected blog category
     * @param $id
     */
    public function deleteBlogCategory($id)
    {
        $category = BlogCategory::find($id);

        if ($category->delete()) {
            return redirect()->back()->with('success', 'Blog Category was successfully deleted');
        }
    }

}
