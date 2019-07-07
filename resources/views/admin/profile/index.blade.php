@extends('layout.admin')
@section('title','Admin Dashboard -Users')
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
            <a href="" class="btn btn-success">New User <i class="fa fa-plus"></i></a>
        </div>
        <div class="col-md-12">
            <br>
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i>Users</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> FullName </th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Country</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Atcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users)>0)
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}} {{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->country}}</td>
                            <td>
                                @if($user->admin == 1)
                                Admin
                                @else
                                Normal User
                                @endif
                            </td>
                            <td>
                                @if($user->avatar)
                                <img style="width: 50px; height: 50px;" src="{{'/storage/'.$user->avatar}}">
                                @else
                                <img style="width: 50px; height: 50px;" src="{{'/storage/avatar/default.png'}}">
                                @endif

                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil" title="edit"></i></a>
                                @if($user->id != Auth::user()->id)
                                <form method="post" action="{{route('admin.profiles.delete', ['id'=>$user->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 26px; margin-top: -40px" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash" title="delete"></i></button>
                                </form>
                                @endif
                            </td>

                        </tr>
                        <tr>
                        </tr>
                        @endforeach
                        @else
                        No Users
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
        <!-- /row -->
        {{$users->links()}}
</section>
@endsection