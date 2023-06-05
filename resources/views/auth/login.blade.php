<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
    <a href="/"><b>Login</b></a>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{route('login.post')}}" id="login-form" method="post">
            <div class="input-group mb-3">
                <input type="email"  name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @csrf
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <p class="mb-1">
            <a href="{{ route('reset') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="{{ route('register.form') }}" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#login-form').submit(function(event) {
            event.preventDefault();
            var email = $('input[name=email]').val();
            var password = $('input[name=password]').val();
            $.ajax({
                url: '{{route('login.post')}}',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email,
                    password: password,
                    _token: $('input[name=_token]').val()
                },
                success: function(data) {
                    if (data.status === 200) {
                        window.location.href = '/';
                    } else {
                        alert('Invalid credentials.');
                    }
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>
</body>
</html>
