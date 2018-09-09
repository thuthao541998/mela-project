<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin-login.css')}}">
    <title>Admin - Login</title>
</head>
<body>

    <div id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div m-t-100">
                <div class="panel">
                    <h2>Admin Login</h2>
                    <p>Please enter your email and password</p>
                </div>
                <form id="Login" method="POST" action="{{ url('/admin-login') }} ">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input  placeholder="Email Address" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        <div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                        <div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>
                    <div class="forgot">
                        <a href="reset.html">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>

                </form>
            </div>
        </div></div></div>
    </div>
</body>

</html>
