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
            <form style="margin-top:-10px" class="form-login col-lg-5" method="POST" action="{{ route('register') }}" enctype=multipart/form-data> @csrf <div class="form-group row">
                @csrf
                <h2 class="form-login-heading">Register now</h2>
                <div class="login-wrap">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" placeholder="User Name">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="LastName">

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" title="avatar">

                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" title="Birthday">

                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirm">
                    <br>
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required placeholder="country">
                    @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button class="btn btn-theme btn-block" type="submit">
                        {{ __('Register') }}
                    </button>
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