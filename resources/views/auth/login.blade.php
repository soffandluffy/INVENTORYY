<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    <link rel="icon" href="/images/logo.png">

    <!-- Styles -->
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/sweetalert.css"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <!-- narbar -->
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="/home" class="brand-logo" style="margin-left: 20px; font-size: 23px;"><img class="left" style="height: 62px; width: 62px;" src="/images/logo.png">AVHERINDO JAYA SPORT</a>
          </div>
        </nav>
      </div>
      <!-- end navbar -->
      
    <!-- FORM LOGIN -->
    <div class="container" style="width: 25%;">
        <div id="login-page" class="row">
            <div class="col s12 z-depth-6 card-panel">
              <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

                  <div class="input-field col s12 center">
                    <img src="/images/logo.png" style="width: 250px; height: 250px;" alt="" class="responsive-img valign profile-image-login">
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="email" class="validate" type="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                      <span class="help-block" style="color: red;">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" class="validate" type="password" name="password" required>
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                      <span class="help-block" style="color: red;">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light blue accent-2 col s12" type="submit">Login</button>
                  </div>
                <div class="row">
                  <div class="input-field col s12 m12 l12">
                      <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Forgot password?</a></p>
                  </div>          
                </div>
              </form>
            </div>
          </div>
    </div>
    <!-- END FORM -->

    <!-- Scripts -->
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/sweetalert.min.js"></script>
</body>
</html>