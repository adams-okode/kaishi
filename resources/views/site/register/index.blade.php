@extends('voyager::auth.master')

@section('content')
<div class="signup-container">
    <h3>Free Sign Up</h3>
    <form method="POST" action="{{ route('voyager.do.front.register') }}">
        {{ csrf_field() }}
        <div class="form-group form-group-default" id="nameGroup">
            <label>Name</label>
            <div class="controls">
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name"
                    class="form-control" required>
            </div>
        </div>
        <div class="form-group form-group-default" id="emailGroup">
            <label>Email</label>
            <div class="controls">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
            </div>
        </div>
        <div class="form-group form-group-default" id="passwordGroup">
            <label>Password</label>
            <div class="controls">
                <input type="password" onkeyup="passwordStrength(this)" name="password" placeholder="Password"
                    class="form-control" required>
                <div id="passwordDescription"></div>
                <div id="passwordStrength"></div>
            </div>
        </div>
        <div class="form-group form-group-default" id="passwordCheckGroup">
            <label>Confirm Password</label>
            <div class="controls">
                <input type="password" onkeyup="passwordMatch(this)" name="confirm_password"
                    placeholder="Confirm Password" class="form-control" required>
                <div id="passwordCheckDescription"></div>

            </div>
        </div>

        <livewire:admin.site-register>
            
        <a href="{{ route('voyager.login') }}" class="btn btn-success pull-right">
            <span class="signin">Sign In</span>
        </a>

    </form>

    <div style="clear:both"></div>

    @if(!$errors->isEmpty())
    <div class="alert alert-red">
        <ul class="list-unstyled">
            @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div> <!-- .login-container -->
@endsection

@section('post_js')
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    var name = document.querySelector('[name="name"]');
    var passwordCheck = document.querySelector('[name="confirm_password"]');

    btn.addEventListener('click', function (ev) {
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    

    function passwordStrength(e) {
        password = e.value;
        var rating = [
            0, "<font color='black'> Weak </font>",
            25, "<font color='red'> Good </font>",
            50, "<font color='yellow'> Medium </font>",
            75, "<font color='blue'> Strong </font>",
            100, "<font color='green'> Very Strong </font>"];

        var score = 0;
        var pass = "";

        if (password.length > 8) {
            score += 25;
        }
        if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) {
            score += 25
        }
        if (password.match(/.[,!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) {
            score += 25;
        }
        if (password.match(/[0-9]/)) {
            score += 25
        }
        if (password.match(/d+/)) {
            score += 10;
        }

        for (var i = rating.length - 1; i >= 0; i -= 1) {
            if (score >= rating[i]) {
                pass = rating[i + 1];
                break;
            }
        }
        document.getElementById("passwordDescription").innerHTML = "<b>" + pass + score + "</font></b>"
        document.getElementById("passwordStrength").className = "strength" + score;
    }

    function passwordMatch(e) {
        passwordCheck = e.value;
        if (passwordCheck === password) {
            document.getElementById("passwordCheckDescription").innerHTML = "<b><font color='green'> Passwords Match</font></font></b>"
        } else {
            document.getElementById("passwordCheckDescription").innerHTML = "<b><font color='red'> Passwords do Not Match</font></font></b>"
        }
    }

</script>
@endsection