<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="{{('assets2/img/favicon.png')}}" rel="icon">
    <link href="{{('assets2/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{('assets2/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{('assets2/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{('assets2/css/style.css')}}" rel="stylesheet">
    <link href="{{('assets2/css/style-responsive.css')}}" rel="stylesheet">

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button class="btn btn-theme btn-block" type="submit">
                        <i class="fa fa-lock"></i>
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif

                    <hr>
                    <div class="registration">
                        Don't have an account yet?<br />
                        <a class="" href="{{route('register')}}">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{('assets2/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{('assets2/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{('assets2/lib/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{('assets2/img/login-bg.jpg')}}", {
            speed: 500
        });
    </script>
</body>

</html>