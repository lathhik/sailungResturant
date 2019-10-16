@extends('backend.master')
@section('title', 'AddBlog')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Blog
                                <small>You can add new Blog here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('add-blog-action')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_title">Blog Title
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="blog_title" class="form-control col-md-7 col-xs-12"
                                               name="blog_title" value="{{old('blog_tile')}}">
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
                                               name="slug">
                                        @if($errors->has('slug'))
                                            <p class="text-danger">{{$errors->first('slug')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="category[]" id="" class=" form-control col-md-7 col-xs-12" multiple>
                                            <option value="" selected disabled>Select Category/es</option>
                                            @foreach($categories as $category)
                                                <option value={{$category->id}}>{{$category->categories}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <p class="text-danger">{{$errors->first('category')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="file"
                                               name="image" value="{{old('image')}}">
                                        @if($errors->has('image'))
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" name="description"
                                                  placeholder="Description...."
                                                  id="blog">{{old('description')}}</textarea>
                                        @if($errors->has('description'))
                                            <p class="text-danger">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">
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

    <script src="{{asset('custom/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script>
        $("#blog_title").keyup(function () {
            var str = $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase())
        })

    </script>
@endsection
