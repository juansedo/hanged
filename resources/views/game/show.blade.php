@extends('layout')

@section('title', 'Hanged! - Game')

@section('content')
<!--Generates an id via GET, that allows to play an specific word (like a seed)-->    
    <header>
        <h2 class="title">
            Hello, {{auth()->user()->name}}. Are you ready?
        </h2>
        <h2 id="logout">
            <a href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            Logout
            </a>
        </h2>
        <div class="clear-both"></div>
        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        
        <form method="POST" action="{{ route('game.play', rand(1,12)) }}">
            @csrf
            <input class="button" type="submit" name="play" value="Play">
        </form>
    </header>
    
    
    <div class="game-grid {{valueIfsessionHas('display.game', "disabled")}}">
        <div class= "hangman">
            <img id="hang" src="img/hangman/hang.svg" alt="hang">
            <img class="{{valueIfsessionHas('display.head', "disabled")}}" id="head" src="img/hangman/head.svg" alt="head">
            <img class="{{valueIfsessionHas('display.body', "disabled")}}" id="body" src="img/hangman/body.svg" alt="body">
            <img class="{{valueIfsessionHas('display.arms', "disabled")}}" id="arms" src="img/hangman/arms.svg" alt="arms">
            <img class="{{valueIfsessionHas('display.lleg', "disabled")}}" id="lleg" src="img/hangman/lleg.svg" alt="lleg">
            <img class="{{valueIfsessionHas('display.rleg', "disabled")}}" id="rleg" src="img/hangman/rleg.svg" alt="rleg">
        </div>

        <div class="game-section">
            <p id="word">
            {{$word_in_page}}
            </p>
            <form class="hanged-input" method="POST">
                @csrf
                <label class="input-underlined">
                    <input id="ch" name="ch" type="text" maxlength="1" required autofocus>
                    <span class="input-placeholder">Type a letter</span>
                </label>
                <input class="button" type="submit" value="Go!">
            </form>
        </div>
    </div>
@endsection