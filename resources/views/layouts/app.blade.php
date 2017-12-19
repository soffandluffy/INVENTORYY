<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="/images/logo.png">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../../css/sweetalert.css"/>
      <style type="text/css">
        .line{
          height: 2px;
          overflow: hidden;
          background-color: #448aff;
          margin-bottom: 5px;
          margin-top: 5px;
        }
      </style>
      @yield('header')

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
            <a href="/home" class="brand-logo" style="margin-left: 20px; font-size: 23px;"><img class="left" style="width: 62px; height: 62px;" src="/images/logo.png">AVHERINDO JAYA SPORT</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li id="stoks">
                  <a href="/stok"><i class="material-icons left">view_list</i>Stok Barang</a>
                </li>
                <li id="barangs">
                  <a href="/barang"><i class="material-icons left">view_comfy</i>Barang</a>
                </li>
                <li id="bmasuks">
                  <a href="/barangmasuk"><i class="material-icons left">subdirectory_arrow_right</i>Barang Masuk</a>
                </li>
                <li id="penjualans">
                  <a href="/penjualan"><i class="material-icons left">shopping_cart</i>Penjualan</a>
                </li>
                <li id="admins"><a href="/admin"><i class="material-icons left">person</i>Admin</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="material-icons left">exit_to_app</i>Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
              </ul>
          </div>
        </nav>
      </div>
      <!-- end navbar -->

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../../js/materialize.min.js"></script>
      <script type="text/javascript" src="../../js/sweetalert.min.js"></script>
      <script type="text/javascript">
        $('select').material_select();
      </script>

      @yield('footer')
</body>
</html>
