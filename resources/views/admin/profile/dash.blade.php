@extends('layout.admin')
@section('title','Admin Dashboard -Users')
@section('content')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-9 main-chart">
            <!-- /row -->
            <div class="row">
                <!-- WEATHER PANEL -->
                <!-- /col-md-4-->
                <!-- DIRECT MESSAGE PANEL -->
                <div class="col-md-8 mb">
                    <!-- /Message Panel-->
                </div>
                <!-- /col-md-8  -->
            </div>
            <div class="row" style="margin-left:150px;">
                <!-- TWITTER PANEL -->

                <!-- /col-md-4 -->
                <div class="col-md-4 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>USERS</h5>
                        </div>
                        <p><i class='fa fa-users fa-4x'></i>
                            <p><b>{{count(App\User::get())}}</b></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small mt">ADMINS</p>
                                    <p>{{count(App\User::where('admin',1)->get())}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small mt">NORMAL USER</p>
                                    <p>{{count(App\User::where('admin',0)->get())}}</p>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-4 mb">
                    <!-- INSTAGRAM PANEL -->
                    <div class="instagram-panel pn">
                        <i class="fa fa-newspaper fa-4x"></i>
                        <p>Toptal Posts<br />
                            {{count(App\Post::where('status','published')->get())}}
                        </p>
                        <p><i class="fa fa-comment"></i> {{count(App\Comment::get())}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                            <br><br><br>
                            <i class="fa fa-tags fa-4x"></i>
                            <h5>Total Tags</h5>
                            <h5>{{count(App\Tag::get())}}</h5>
                        </div>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->

            <!-- /row -->
        </div>

    </div>
    <!-- /row -->
</section>
@endsection