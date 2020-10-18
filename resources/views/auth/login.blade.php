@extends('layouts.intro')

@section('title', 'Hanged! - Login')

@section('login-box')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div id="input-user" class="input-underlined">
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            <span class="input-placeholder">Email</span>
            @error('email')
                <span class="input-invalid">
                    {!! $errors->first('no-auth','This user is not registered') !!}
                </span>
            @enderror
        </div>
        <div id="input-password" class="input-underlined">
            <input id="password" type="password" name="password" autocomplete="current-password">
            <span class="input-placeholder">Password</span>
            @error('password')
                <span class="input-helper">
                    {!! $errors->first('pass','Password field required') !!}
                </span>
            @enderror
        </div>

        <div id="check">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                Remember me
            </label>
        </div>

        @if (Route::has('password.request'))
            <a id="forgot" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
        @endif
        
        <input class="button clear-both" type="submit" value="Log In">
    </form>
@endsection