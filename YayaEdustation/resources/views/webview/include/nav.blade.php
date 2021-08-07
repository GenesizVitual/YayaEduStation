{{--<h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1>--}}
<a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('webview') }}/assets/img/logo.png" alt=""
                                                   class="img-fluid" style="width: 100%; height: 100%"></a>

<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li @if(Session::get('menu')=='home') class="active" @endif><a href="{{ url('/') }}">Home</a></li>
        <li @if(Session::get('menu')=='about') class="active" @endif><a href="{{ url('about') }}">About</a></li>
        <li @if(Session::get('menu')=='course') class="active" @endif><a href="{{ url('course') }}">Courses</a></li>

        {{--        <li @if(Session::get('menu')=='trainers') class="active" @endif><a href="{{ url('trainers') }}">Trainers</a></li>--}}
        {{--        <li @if(Session::get('menu')=='events') class="active" @endif><a href="{{ url('events') }}">Events</a></li>--}}
        {{--        <li @if(Session::get('menu')=='pricing') class="active" @endif><a href="{{ url('pricing') }}">Pricing</a></li>--}}
                <li class="drop-down"><a href="#" style="color:deepskyblue">Registrasi</a>
                    <ul>
                        <li><a href="{{ url('signup') }}">Customer</a></li>
                        <li><a href="{{ url('become-tutor') }}">Become Tutor</a></li>
                </li>
                <li><a href="{{ url('log-in') }}" class="btn btn-info ml-3 mr-3" style="color: whitesmoke">Login</a></li>

    </ul>
</nav><!-- .nav-menu -->

{{--Todo form started--}}
@if(!empty(Session::get('id_customer')))
    <a href="{{ url('dashboard-customer') }}" class="get-started-btn" style="background-color: deepskyblue">Customer Area</a>
@endif
