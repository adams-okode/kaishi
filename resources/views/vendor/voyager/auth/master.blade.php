<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <!-- CSRF token -->
   
    <title>@yield('title', 'Admin - '.Voyager::setting("admin.title"))</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

    <style>
        body {

            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }
        body.login .login-sidebar {
            border-top:5px solid {{ config('voyager.primary_color','#22A7F0') }};
        }
        body.login .right-bar {
            background-image: url('{{ asset("kaishi-logo/vector/default.svg") }}');
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100vh;
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid {{ config('voyager.primary_color','#22A7F0') }};
            }
        }
        body.login .form-group-default.focused{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .remember-me-text{
            padding:0 5px;
        }
    </style>
    @yield('pre_css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <!-- <div class="faded-bg animated"></div> -->
        <div class="col-sm-7 col-md-6 right-bar">
        </div>

        <div style="box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                    transition: all 0.3s cubic-bezier(.25,.8,.25,1);" class="col-xs-12 col-sm-5 col-md-4 login-sidebar">
            <!-- <div class="container">
                <img style="height: auto;
                        max-width: 250px;
                        margin: auto;
                        margin-left: 25%;
                        padding-top: 155px;
                        padding-bottom: 0px;" class="img-responsive pull-left flip hidden-xs animated fadeIn" src="{{ asset('kaishi-logo/vector/default-monochrome.svg') }}" alt="Logo Icon">
            </div> -->
            @yield('content')
        </div> <!-- .login-sidebar -->
        <div class="col-md-2 right-bar">
        </div>
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@yield('post_js')
</body>
</html>
