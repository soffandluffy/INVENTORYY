@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row"></div>
                    <h4 style="color: #448aff;">Reset Password</h4>
                <div class="line">
                </div>
                <div class="row"></div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="input-field col s12">
                          <i class="material-icons prefix">email</i>
                          <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                          <label for="last_name">E-Mail Address</label>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <div class="center-align">
                            <button class="btn-flat waves-effect waves-light blue accent-2" style="color: white;" type="submit"><i class="material-icons right">send</i>Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript">
        document.getElementById("nav-mobile").hidden = "true";
    </script>
@endsection