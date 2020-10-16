@extends('layout')

@section('title', 'Hanged! - Login')

@section('content')
    <div id ="particles-js">
    </div>
    <div class="login-box">
        <div class="title">
            <img src="img/title-logo.svg" alt="hanged title">
        </div>
        <span class="input-invalid">
            {!! $errors->first('no-auth','This user is not registered') !!}
        </span>
        <form method="POST">
        @csrf
            <label id="input-user" class="input-underlined">
                <input id="user" name="user" type="text" value="{{ old('user') }}">
                <span class="input-placeholder">Username</span>
                <span class="input-helper">
                    {!! $errors->first('user','Username field required') !!}
                </span>
            </label>
            <label id="input-password" class="input-underlined">
                <input id="pass" name="pass" type="password" value="{{ old('pass') }}">
                <span class="input-placeholder">Password</span>
                <span class="input-helper">
                    {!! $errors->first('pass','Password field required') !!}
                </span>
            </label>
            <input class="button" type="submit" value="Log In">
        </form>
    </div>
@endsection