@extends('layout.admin')
@section('title','Admin Dashboard -Edit')
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
          <form method="post" action="{{route('admin.posts.update' , ['id'=>$post->id ] )}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="control-lable">Title</label>
              <div>
                <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{$post->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label class="control-lable">Content</label>
              <div>
                <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror" rows="6"> {{$post->content}} </textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="Category">Category</label>
              <select class="form-control" id="category" name="category">
                @foreach ($Categories as $category)

                <option value="{{$category->id}}" @if ($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                @endforeach

              </select>
            </div>


            <div>
              <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" width=" 100" height="100">
            </div>
            <div class="form-group">
              <label class="control-label">Change Image</label>
              <div>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div>
              <div class="form-check">
                <label class="control-table" style="margin-right:20px;">Status </label>
                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="published" @if ($post->status == 'published') checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                  Published
                </label>
                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="draft" @if ($post->status == 'draft') checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                  Draft
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-check form-check-inline">
                <label class="control-table" style="margin-right:20px;">Tags</label>
                @foreach (App\Tag::all() as $tag)
                <input class="form-check-input" type="checkbox" name="tag[]" value="{{$tag->id}}" {{in_array($tag->id, $tags) ? 'checked' :''}}>
                <label class="form-check-label">{{$tag->name}}</label>
                @endforeach
              </div>

            </div>
            <button type="submit" class="btn btn-theme">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection