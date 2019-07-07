@extends('layout.admin')
@section('title','Admin Dashboard -categories')
@section('content')
<section class="wrapper">
    <!-- row -->
    <div class="row mt">
        @if(session('message_flash'))
        <div class="alert alert-success">
            {{session('message_flash')}}
        </div>
        @endif
        <div style="direction: rtl; margin-right: 15px">
            <a href="{{route('admin.categories.create')}}" class="btn btn-success">New Category <i class="fa fa-plus"></i></a>
        </div>
        <div class="col-md-12">
            <br>
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i>Categories</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> Category Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Posts</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories)>0)
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td> <a href=" {{ route('admin.categories.posts',['id' => $category->id ] )}}">posts</a> </td>
                            <td>
                                <a href="{{ route('admin.categories.edit',['id' => $category->id ] )}}" class="btn btn-success btn-xs"><i class="fa fa-pencil" title="edit"></i></a>


                                <form method="post" action="{{route('admin.categories.delete', ['id'=>$category->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 28px; margin-top: -40px" class="btn btn-danger btn-xs"><i class="fa fa-trash-o " title="delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        @endforeach
                        @else
                        No Categories
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
        <!-- /row -->
        {{$categories->links()}}
</section>
@endsection