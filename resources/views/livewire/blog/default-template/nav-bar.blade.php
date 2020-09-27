<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
    <a class="logo mr-auto navbar-brand" href="#">
        <img src="{{ asset('kaishi-logo/vector/default-monochrome.svg') }}" alt="" width="120">
    </a>
    <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="{{ url('') }}">Home</a></li>
        </ul>
    </nav><!-- .nav-menu -->

    @if(auth()->check()) {
        <a href="{{ route('voyager.login') }}" class="login-btn btn-primary scrollto">
            <livewire:admin.default-avatar>
        </a>
    @else
        <a href="{{ route('voyager.register') }}" class="get-started-btn scrollto">Start For Free</a>
        <a href="{{ route('voyager.login') }}" class="login-btn btn-primary scrollto">Sign In</a>
    @endif

    </div>
</header><!-- End Header -->

<script>
    var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({});

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
    };

    fetch("{{ route('voyager.check.session.auth') }}", requestOptions)
    .then(response => response.text())
    .then(result => {
        alert(result)
    })
    .catch(error => console.log('error', error));
</script>
