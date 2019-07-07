@extends('layout.admin')
@section('title','Edit category')
@section('content')
<section class="wrapper">
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($user = Auth::user())
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row content-panel">
                <div class="col-md-4 profile-text mt mb centered">
                    <div class="right-divider hidden-sm hidden-xs">
                        <h4>{{count(App\User::get())}}</h4>
                        <h6>Users</h6>
                        <h4> {{count(App\User::where('admin',0)->get())}}</h4>
                        <h6>Normal Users</h6>
                        <h4>{{count(App\User::where('admin',1)->get())}}</h4>
                        <h6>Admins</h6>
                    </div>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-4 profile-text">
                    <h3>{{$user->name}} {{$user->lastname}} @if($user->admin == 1)
                        (Admin)
                        @else
                        (User)
                        @endif</h3>
                    <h6>{{$user->email}}</h6>
                    <p>This user live in {{$user->country}} and his/her birthday {{$user->birthday}}</p>
                    <br>
                    <p><button class="btn btn-theme"><i class="fa fa-key"></i> Reset Password</button></p>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-4 centered">
                    <div class="profile-pic">
                        <p><img src="{{'/storage/'.$user->avatar}}" class="img-circle"></p>
                    </div>
                </div>
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active">
                            <h4 class="mb">Edit Personal Information</h4>
                        </li>
                    </ul>
                </div>
                <!-- /panel-heading -->
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="edit" class="tab-pane active">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 detailed">
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"> Avatar</label>
                                            <div class="col-lg-6">
                                                <input type="file" id="exampleInputFile" class="file-pos">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Company</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="c-name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Lives In</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="lives-in" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Country</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="country" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-10">
                                                <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-theme" type="submit">Save</button>
                                                <button class="btn btn-theme04" type="button">Cancel</button>
                                            </div>
                                    </form>
                                </div>
                                <!-- /col-lg-8 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /tab-pane -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
    </div>
    @endif
</section>
@endsection