<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <h1 class="logo mr-auto"><a href="{{ url('') }}">{{ ucwords(request()->account) ? ucwords(request()->account) : 'Kaishi' }}<span>.</span></a></h1>
    <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="{{ url('') }}">Home</a></li>
        </ul>
    </nav><!-- .nav-menu -->

    @if(auth()->user())
    <a href="{{ route('voyager.register') }}" class="get-started-btn scrollto">Start For Free</a>
    <a href="{{ route('voyager.login') }}" class="login-btn btn-primary scrollto">Sign In</a>
    @else
    <a href="{{ route('voyager.dashboard') }}" class="login-btn btn-primary scrollto">{{ auth()->user()->name }}</a>
    @endif
    </div>
</header><!-- End Header -->

