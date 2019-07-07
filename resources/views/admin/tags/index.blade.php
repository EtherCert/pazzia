@extends('layout.admin')
@section('title','Admin Dashboard -Tag')
@section('content')
<section class="wrapper">
    <div class="row mt">
        @if(session('message_flash'))
        <div class="alert alert-success">
            {{session('message_flash')}}
        </div>
        @endif
        <div style="direction: rtl; margin-right: 15px">
            <a class="btn btn-success" href="{{route('admin.tags.create')}}"> Add New Tag</a>
        </div>
        <div class="col-md-12">
            <br>
            <div class="content-panel">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tags)>0)
                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>
                                <a href="{{ route('admin.tags.edit',['id' => $tag->id ] )}}" class="btn btn-success btn-xs"><i class="fa fa-pencil" title="edit"></i></a>
                                <form method="post" action="{{route('admin.tags.delete', ['id'=>$tag->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="margin-left: 28px; margin-top: -40px" class="btn btn-danger btn-xs"><i class="fa fa-trash-o " title="delete"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                        @else
                        <td colspan="5" class="text-center">
                            <h5>No tags</h5> <br> <a href="{{route('admin.tags.create')}}">Add New Tag</a>
                        </td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$tags->links()}}
</section>
@endsection