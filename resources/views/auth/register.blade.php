@extends('layout')

@section('title', 'Hanged! - Register')

@section('content')
    <div id ="particles-js"></div>
    <div class="login-box">
        <div class="title">
            <img src="img/title-logo.svg" alt="hanged title">
        </div>
        @error('no-auth')
        <span class="input-invalid">
            {!! $errors->first('no-auth','This user is not registered') !!}
        </span>
        @enderror

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div id="input-name" class="input-underlined">
                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                <span class="input-placeholder">Name</span>
                @error('name')
                    <span class="input-invalid">
                        {!! $errors->first('name','Name field required') !!}
                    </span>
                @enderror
            </div>

            <div id="input-email" class="input-underlined">
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                <span class="input-placeholder">Email</span>
                @error('email')
                    <span class="input-invalid">
                        {!! $errors->first('no-auth','This user is not registered') !!}
                    </span>
                @enderror
            </div>
            <div id="input-password" class="input-underlined">
                <input id="password" type="password" name="password" autocomplete="new-password">
                <span class="input-placeholder">Password</span>
                @error('password')
                    <span class="input-helper">
                        {!! $errors->first('pass','Password field required') !!}
                    </span>
                @enderror
            </div>

            <div id="input-password-confirm" class="input-underlined">
                <input id="password-confirm" type="password" name="password-confirm" autocomplete="new-password">
                <span class="input-placeholder">Password confirm</span>
                @error('password')
                    <span class="input-helper">
                        {!! $message !!}
                    </span>
                @enderror
            </div>
            
            <input class="button clear-both" type="submit" value="Register">
        </form>
    </div>
@endsection
