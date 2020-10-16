@extends('layout')

@section('title', 'Hanged! - Congratulations')

@section('content')
    <div id="particles-js-congratulations">
    </div>
    <div class="simple-box">
        <div>
            <p id="win">Congratulations!</p>
        </div>
        <form method="POST" action="{{ route('game') }}">
        @csrf
            <input class="button" type="submit" value="Play again">
        </form>
    </div>
@endsection