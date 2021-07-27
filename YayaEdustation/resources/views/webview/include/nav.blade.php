{{--<h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1>--}}
<a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('webview') }}/assets/img/logo.png" alt="" class="img-fluid" style="width: 50%; height: 100%"></a>

<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li @if(Session::get('menu')=='home') class="active" @endif><a href="{{ url('/') }}">Home</a></li>
        <li @if(Session::get('menu')=='about') class="active" @endif><a href="{{ url('about') }}">About</a></li>
        <li @if(Session::get('menu')=='course') class="active" @endif><a href="{{ url('course') }}">Courses</a></li>
        <li @if(Session::get('menu')=='trainers') class="active" @endif><a href="{{ url('trainers') }}">Trainers</a></li>
        <li @if(Session::get('menu')=='events') class="active" @endif><a href="{{ url('events') }}">Events</a></li>
        <li @if(Session::get('menu')=='pricing') class="active" @endif><a href="{{ url('pricing') }}">Pricing</a></li>
        <li class="drop-down"><a href="">Drop Down</a>
            <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Deep Drop Down</a>
                    <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
            </ul>
        </li>
        <li @if(Session::get('menu')=='contact') class="active" @endif><a href="{{ url('contact') }}">Contact</a></li>

    </ul>
</nav><!-- .nav-menu -->

{{--Todo form started--}}
<a href="{{ url('become-tutor') }}" class="get-started-btn" style="background-color: #0f6674">Become a tutor</a>
<a href="{{ url('log-in') }}" class="get-started-btn">Log in</a>
