@extends('layout.admin')
@section('title','Admin Dashboard -trashed')
@section('content')
<section class="wrapper">
    <!-- row -->
    <div class="row mt">
        @if(session('message_flash'))
        <div class="alert alert-success">
            {{session('message_flash')}}
        </div>
        @endif
        <div class="col-md-12">
            <br>
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Trashed Posts</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts)>0)
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->deleted_at}}</td>
                            <td>
                                <form method="post" action="{{route('admin.posts.restore', ['id'=>$post->id ])}}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-xs"><i class="fa fa-mail-reply-all" title="restore"></i></button>
                                </form>

                                <form method="post" action="{{route('admin.posts.forceDelete', ['id'=>$post->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 28px; margin-top: -40px" class="btn btn-danger btn-xs"><i class="fa fa-trash-o " title="delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        No Trashed Posts
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
        <!-- /row -->
        {{$posts->links()}}
</section>
</section>
@endsection