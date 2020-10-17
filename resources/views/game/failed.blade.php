@extends('layouts.ending')

@section('title', 'Hanged! - You failed')

@section('background-effect')
    <div id="particles-js-failed">
    </div>
@endsection

@section('content')
    <p id="lose">You failed!</p>
    <p>The word was {{'Hi'}}</p>
@endsection