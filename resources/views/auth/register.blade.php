@extends('layouts.app')

@section('title')
    Tambah Admin | AVHERINDO
@endsection

@section('header')
@endsection

@section('content')
        <div class="container">
            <div class="row"></div>
            <h4 style="color: #448aff;">Tambah Admin</h4>
            <div class="line">
            </div><br>
            <div class="container">
                <form class="col s12" action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" class="validate" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        <label for="name">Nama</label>
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
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
                        <i class="material-icons prefix">lock</i>
                        <input id="password-confirm" class="validate" type="password" name="password_confirmation" required>
                        <label for="password-confirm">Confirm Password</label>
                      </div>
                    </div>
                        <div align="center" class="col s12">
                            <a class="btn-flat waves-effect waves-light red" href="/admin" style="color: white;"><i class="material-icons left">cancel</i>Batal</a>
                            <button class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" type="submit"><i class="material-icons right">send</i>Submit</button>
                        </div>
                </form>
            </div>   
        </div>
     

@endsection

@section('footer')
  <script type="text/javascript">
    document.getElementById("admins").hidden = "true";
  </script>
@endsection
