@extends('layouts.ending')

@section('title', 'Hanged! - Congratulations')

@section('background-effect')
    <div id="particles-js-congratulations">
    </div>
@endsection

@section('content')
    <p id="win">Congratulations!</p>
    <p>The word was {{session()->get('word')}}</p>
@endsection