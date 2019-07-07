@extends('layout.admin')
@section('title','Admin Dashboard -Posts')
@section('content')
<section class="wrapper">
    <!-- row -->
    <div class="row mt">
        <div class="col-md-12">
            @if(session('message_flash'))
            <div class="alert alert-success">
                {{session('message_flash')}}
            </div>
            @endif
            <div style="direction: rtl" style="margin: 120">
                <a href="{{route('admin.posts.trashed')}}" class="btn btn-danger">Trashed Posts <i class="fa fa-trash-o"></i></a>
                <a href="{{route('admin.posts.create')}}" class="btn btn-success">New Post <i class="fa fa-plus"></i></a>
            </div>
            <br>
            <form method="get" action="{{route('admin.posts')}}" class="form-inline mb5 mt-5">
                <input type="text" name="title" placeholder="Seartch tilte" class="form-control" value="{{$title}}">
                <select name="status" class="form-control m1-1">
                    <option value="">All Status</option>
                    <option value="published" {{$status == 'published'?'selected':''}}>Published</option>
                    <option value="draft" {{$status == 'draft'?'selected':''}}>Draft</option>
                </select>
                <select name="category_id" class="form-control m1-1">
                    <option value="">All categories</option>
                    @foreach (App\Category::all() as $category)
                    <option value="{{$category->id}}" {{$category->id == $category_id ?'selected':''}}>
                        {{$category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-info">Search</button>
            </form>
            <br>
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Posts Table</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Views</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($posts)>0)
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->ptitle}}</td>
                            <td>{{$post->pstatus}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                @if($post->tags->toArray())
                                {{ implode (',',$post->tags->pluck('name')->toArray())}}
                                @else
                                no tags
                                @endif
                            </td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                @if($post->stat->views>0)
                                {{$post->stat->views }}
                                @else
                                now view
                                @endif
                            </td>
                            <td>
                                <a href="{{route('posts.view',['id'=>$post->id])}}" class="btn btn-success btn-xs"><i class="fa fa-eye" title="view"></i></a>
                                <a href="{{route('admin.posts.edit' , ['id'=>$post->id ] )}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" title="edit"></i></a>
                                <form method="post" action="{{route('admin.posts.delete', ['id'=>$post->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 52px; margin-top: -40px" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash" title="delete"></i></button>
                                </form>
                            </td>
                            @endforeach
                            @else
                            <td colspan="5" class="text-center">
                                <h5>No Posts</h5> <br>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- /row -->
</section>
{{$posts->links()}}
@endsection