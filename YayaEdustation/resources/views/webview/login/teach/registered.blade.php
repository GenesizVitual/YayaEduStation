<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Become a Tutor</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">
    <style>
        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px
        }
    </style>
</head>
<body>

<div class="main">
    <div class="container">
        <form method="POST" class="appointment-form" action="{{ url('tutor') }}" id="appointment-form">
            <h2>
                <label>Register to get a Theach Account</label>
            </h2>
            <div align="center">
                @if(!empty(session('message_success')))
                    <p style="color: green">{{ session('message_success')}}</p>
                @elseif(!empty(session('message_fail')))
                    <p style="color: red">{{ session('message_fail') }}</p>
                @endif
            </div>
            <div class="form-group-1">
                <input type="email" name="email" id="email" placeholder="Your email" required />
                <input type="password" name="password" id="name" placeholder="Your password" required />
            </div>
            <div class="form-submit" >
                {{ csrf_field() }}
                <input type="submit" name="submit"  class="btn btn-primary btn-lg"  style="margin: 1px; background-color: #0f6674" />
            </div>
            <div align="center">
                <hr>
                <h5 style="color: #0f6674; font-size: 12px">Or Continue with</h5>
            </div>
            <div align="center">
                <a href="#" class="btn btn-primary" style=""><i class="fa fa-google "></i> Google</a>
                <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
            <div align="center">
                <hr>
                <a href="{{ url('log-in') }}" id="submit"  style="width: 80%; text-decoration:none">Already have account</a>
            </div>
        </form>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('login/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('login/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>