@extends('backend.master')
@section('title', 'EditBlog')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Blog
                                <small>You can edit Blog here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('update-blog-action',$blog->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_title">Blog Title
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="blog_title" class="form-control col-md-7 col-xs-12"
                                               name="blog_title" value="{{$blog->title}}">
                                        @if($errors->has('blog_title'))
                                            <p class="text-danger">{{$errors->first('blog_title')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Slug
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input id="slug"
                                               class=" form-control col-md-7 col-xs-12" type="text"
                                               name="slug" value="{{$blog->slug}}">
                                        @if($errors->has('slug'))
                                            <p class="text-danger">{{$errors->first('slug')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label
                                        class="control-label col-md-3 col-sm-3 col-xs-12">Category
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkbox">
                                            <label>
                                                @foreach($blog_categories as $category)
                                                    <input type="checkbox" value="{{$category->id}}"
                                                           name="categories[]"
                                                           @foreach ($blog->blogCategory as $cat)
                                                           @if($cat->blog_category_id == $category->id)
                                                           checked
                                                        @endif
                                                        @endforeach>{{$category->categories}}
                                                    <br>
                                                @endforeach
                                            </label>
                                        </div>
                                        @if($errors->has('categories[]'))
                                            <p class="text-danger">{{$errors->first('categories[]')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" name="description"
                                                  placeholder="Description...."
                                                  id="blog">{{$blog->description}}</textarea>
                                        @if($errors->has('description'))
                                            <p class="text-danger">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="file"
                                               name="image" value="" onchange="readURL(this);">
                                        <br><br>
                                        <img id="pro-blog" class="pro"
                                             src="{{asset('custom/backend/images/blog/'.$blog->image)}}" alt="img"
                                             height="100px">
                                        @if($errors->has('image'))
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
