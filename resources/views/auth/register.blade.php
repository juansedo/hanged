@extends('layouts.intro')

@section('title', 'Hanged! - Register')

@section('login-box')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div id="input-name" class="input-underlined">
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
            <span class="input-placeholder">Name</span>
            @error('email')
                <span class="input-helper">
                    {!! 'The name field is required' !!}
                </span>
            @enderror
        </div>

        <div id="input-email" class="input-underlined">
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email">
            <span class="input-placeholder">Email</span>
            @error('email')
                <span class="input-helper">
                    {!! $message !!}
                </span>
            @enderror
        </div>
        <div id="input-password" class="input-underlined">
            <input id="password" type="password" name="password" autocomplete="new-password">
            <span class="input-placeholder">Password</span>
            @error('password')
                <span class="input-helper">
                    {!! $message !!}
                </span>
            @enderror
        </div>

        <div id="input-password-confirm" class="input-underlined">
            <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            <span class="input-placeholder">Password confirm</span>
            @error('password-confirm')
                <span class="input-helper">
                    {!! $message !!}
                </span>
            @enderror
        </div>
        
        <input class="button clear-both" type="submit" value="Register">
    </form>
@endsection
