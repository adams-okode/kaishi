<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <a class="logo mr-auto navbar-brand" href="#">
        <img src="{{ asset('kaishi-logo/vector/default-monochrome.svg') }}" alt="" width="120">
    </a>
  
    @if(auth()->check())
        <a href="{{ route('voyager.login') }}">
            <livewire:admin.default-avatar>
        </a>
    @else
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ url('') }}">Home</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        <a href="{{ route('voyager.register') }}" class="get-started-btn scrollto">Start For Free</a>
        <a href="{{ route('voyager.login') }}" class="login-btn btn-primary scrollto">Sign In</a>
    @endif

    </div>
</header><!-- End Header -->



