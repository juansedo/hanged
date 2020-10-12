<?php
// The password is hanged123
/*
$salt = '*w_52$0%Hk';
$stored_hash = '7a95b199144677cc04302a11c0e3132f84f8ef2b536c2043689a8fa3f6c750db';

$message = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['user']) && isset($_POST['pass']) ) {
    $check = hash('sha256', $_POST['pass'].$salt);
    if ($check == $stored_hash) {   //Redirect to game.php
        header("Location: game.php?user=".urlencode($_POST['user']));
        return;
    }
    else {
        $message = "Incorrect password";
    }
}*/
?>

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
            <label class="input-underlined">
                <input id="user" name="user" type="text" value="{{ old('user') }}">
                <span class="input-placeholder">Username</span>
                <span class="input-helper">
                    {!! $errors->first('user','Username field required') !!}
                </span>
            </label>
            <label class="input-underlined">
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