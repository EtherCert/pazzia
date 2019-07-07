@extends('layout.admin')
@section('title','Admin Dashboard -Add')
@section('content')
<section class="wrapper">
        @if(count($errors)>0)
        <div class="alert alert-danger">
                <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                                {{$error}}
                        </li>
                        @endforeach
                </ul>
        </div>
        @endif
        <div class="row mt">
                <div class="col-lg-12">
                        <h4><i class="fa fa-angle-right"></i> Add Post</h4>
                        <div class="form-panel">
                                <div class=" form">

                                        <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                        <label class="control-lable">Title</label>
                                                        <div>
                                                                <input type="text" name="title" value="{{old('title')}}" class="form-control  @error('title') is-invalid @enderror">
                                                                @error('title')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-lable">Content</label>
                                                        <div>
                                                                <textarea type="text" name="content" value="" class="form-control @error('content') is-invalid @enderror"> {{old('content')}}</textarea>
                                                                @error('content')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <label for="Category">Category</label>
                                                        <select class="form-control @error('category') is-invalid @enderror" name="category">
                                                                <option value="" selected></option>
                                                                @foreach ($Categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-lable">Image</label>
                                                        <div>
                                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                                @error('image')
                                                                <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                        <br>
                                                        <div class="form-check">
                                                                <label class="control-table" style="margin-right:20px;">Status </label>
                                                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="published" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                        Published
                                                                </label>
                                                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="draft">
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                        Draft
                                                                </label>
                                                        </div>

                                                </div>
                                                <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                                <label class="control-table" style="margin-right:20px;">Tags</label>
                                                                @foreach (App\Tag::all() as $tag)
                                                                <input class="form-check-input" type="checkbox" name="tag[]" value="{{$tag->id}}">
                                                                <label class="form-check-label">{{$tag->name}}</label>
                                                                @endforeach
                                                        </div>

                                                </div>
                                                <div class="form-group">
                                                        <button class="btn btn-theme" type="submit">Save</button>
                                                </div>
                                </div>
                                </form>
                        </div>
                        <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
        </div>
        </div>
</section>
@endsection