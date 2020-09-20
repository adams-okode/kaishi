<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <h1 class="logo mr-auto"><a href="{{ url('') }}">{{ ucwords(request()->account) ? ucwords(request()->account) : 'Kaishi' }}<span>.</span></a></h1>
    <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="{{ url('') }}">Home</a></li>
        </ul>
    </nav><!-- .nav-menu -->

    <a href="{{ url('register') }}" class="get-started-btn scrollto">Start For Free</a>
    <a href="{{ url('register') }}" class="get-started-btn btn-primary scrollto">Start For Free</a>
    </div>
</header><!-- End Header -->

