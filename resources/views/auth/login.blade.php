@extends('layouts.intro')

@section('title', 'Hanged! - Login')

@section('login-box')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div id="input-user" class="input-underlined">
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            <span class="input-placeholder">Email</span>
            <span class="input-helper">
                {!! $errors->first('email','Email field required') !!}
            </span>
        </div>
        <div id="input-password" class="input-underlined">
            <input id="password" type="password" name="password" autocomplete="current-password">
            <span class="input-placeholder">Password</span>
            <span class="input-helper">
                {!! $errors->first('password','Password field required') !!}
            </span>
        </div>

        <div id="check">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                Remember me
            </label>
        </div>
        
        <input class="button clear-both" type="submit" value="Log In">
    </form>
@endsection