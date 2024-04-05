@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Blog View</h3>
                </div>
                <div class="card-body">
                    @if (session('update'))
                        <div class="alert alert-success mb-3">{{session('update')}}</div>
                    @endif
                    <form action="{{route('blog.update' , $blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">Author Name</label>
                                <input type="text" name="author" class="form-control" value="{{$blog->author}}" id="">

                                @error('author')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control" value="">
                                    <option value="{{$blog->category_id}}">{{$blog->rel_to_cat->name}}</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">Blog Title</label>
                                <input type="text" name="title" class="form-control" id="" value="{{$blog->title}}">

                                @error('title')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>



                            {{-- <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">Tag</label>
                                <select id="select-gear2" name="tags[]" class="demo-default" multiple
                                    placeholder="Select Tags...">
                                    <option  value="">{{$blog->tags}}</option>
                                    <optgroup>
                                        @foreach ($tags as $tag )
                                        <option class="text-capitalize text-white" value="{{$tag->id}}">{{$tag->name}}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                </select>

                                @error('tags')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div> --}}

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">Blog Description</label>
                                <textarea class="form-control" id="summernote3" name="description" id="" cols="30"
                                    rows="10">{!!$blog->description!!}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">Author Description</label>
                                <textarea class="form-control" id="summernote4" name="auth_desp" id="" cols="30"
                                    rows="10">{!!$blog->auth_desp!!}</textarea>
                                @error('auth_desp')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">Blog Thumbnail</label>
                                <input type="file" class="form-control" name="photo"
                                    onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])">
                                <img src="{{asset('uploads/blogs')}}/{{$blog->photo}}" id="profile" width="300" alt="">

                                {{-- @error('photo')
                                <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror --}}
                            </div>

                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-50">Update Blog</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
<script>
    $('#select-gear2').selectize({
        sortField: 'text'
    })

</script>
<script>
    $(document).ready(function () {
        $('#summernote3').summernote();
        $('#summernote4').summernote();
    });

</script>
@endsection
