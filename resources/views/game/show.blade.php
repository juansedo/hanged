<?php
/*
$word = "";
$seed = "";
$attempts = isset($_GET['ch'])? $_GET['ch']: "";
$lifes = isset($_GET['lifes'])? $_GET['lifes']: -1;

$words = array(
    "JAZZ", "LUCKY", "UNZIP", "SCRATCH",
    "RHYTHM", "PHP HYPERTEXT PREPROCESSOR", "PYTHON", 
    "JELLY", "HANGED", "HORSE", "CHAIR",
    "BANJO", "INJURY"
);
$total_words = count($words);

//When Play button triggers
if (isset($_POST['play'])) {
    header("Location: game.php?user=".urlencode($user).
                                "&lifes=5".
                                "&seed=".rand(0, $total_words - 1));
    return;
}

//For setting the word
if (isset($_GET['seed'])) {
    $seed = $_GET['seed'];
    $display['game'] = "";
    $word = $words[$seed];
}

//When user types a letter (checkLife() is used here)
if (isset($_POST['ch'])) {
    $upperch = strtoupper($_POST['ch']); // This converts a -> A, b -> B, and so on
    checkLife($upperch, $word);
    header("Location: game.php?user=".urlencode($user).
                                "&lifes=".$lifes.
                                "&seed=".urlencode($seed).
                                "&ch=".$attempts.urlencode($upperch));
    return;
}

if(isset($_GET['ch'])) {
    $word_in_page = checkAttempt($_GET['ch'], $word);
} else {
    $word_in_page = checkAttempt("", $word);
}
// End of POST and GET checks

/**
 * function changeDisplay()
 * 
 * It changes the hangman display state
 * according to lifes left.
 *//*
function changeDisplay() {
    global $display;
    global $word;
    global $lifes;
    switch($lifes) {
        case 0:
            $display["stateText"]="¡You failed! Word was ".$word;
            $display["state"]="lose";
            $display["rleg"]="";
        case 1:
            $display["lleg"]="";
        case 2:
            $display["arms"]="";
        case 3:
            $display["body"]="";
        case 4:
            $display["head"]="";
        case 5:
        default:
            break;
    }
}

/**
 * function checkLife($ch, $word)
 * 
 * If the $ch character is not into word, the
 * player loses one life.
 *//*
function checkLife($ch, $word) {
    global $lifes;
    for ($i = 0; $i < strlen($word); $i++) {
        $test_word = str_split($word)[$i];
        if ($test_word == $ch) return;
    }
    if ($lifes > 0) $lifes--;
    return;
}

/**
 * function checkAttempt($attempts, $word)
 * 
 * It checks every attempt (in $attempts) 
 * with secret word ($word) to create the
 * output of discovered characters.
 * 
 * Example outputs:
 * _ _ _ _ _ _ _ _
 * _ _ A _ _
 * _ E _ B E
 *//*
function checkAttempt($attempts, $word) {
    $output = "";
    $finished = FALSE;  //Variable to avoid typing multiple times the underscore (_) in output
    for ($i = 0; $i < strlen($word); $i++) {
        $test_word = str_split($word)[$i];
        if ($test_word == " ") {
            $output .= "&nbsp; ";
            continue;
        }
        for($j = 0; $j < strlen($attempts); $j++) {
            $test_attempt = str_split($attempts)[$j];
            if ($test_attempt == $test_word) {
                $output .= $test_attempt." ";
                $finished = TRUE;
                break;
            }
        }
        if ($finished) $finished = FALSE;
        else $output .= "_ ";
    }
    return $output;
}

/**
 * function checkVictory()
 * 
 * If $word_in_page does not have underscores,
 * it means the player won.
 *//*
function checkVictory() {
    global $word_in_page;
    global $display;
    if(strpos($word_in_page, "_") === FALSE) {
        $display["state"] = "win";
        $display["stateText"] = "¡You won! Congratulations.";
    } else {
        $display["state"] = "state";
        $display["stateText"] = "";
    }
}
//END functions declarations

checkVictory();
changeDisplay($lifes);*/
?>

@extends('layout')

@section('title', 'Hanged! - Game')

@section('content')
<!--Generates an id via GET, that allows to play an specific word (like a seed)-->    
    <header>
        <h2 class="title">
            Hello, {{$user}}. Are you ready?
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
        
        <form method="POST" action="{{ route('game.play', 25) }}">
            @csrf
            <input class="button" type="submit" name="play" value="Play">
        </form>
    </header>
    
    
    <div class="game-grid {{$display['game']}}">
        <div class= "hangman">
            <img id="hang" src="img/hangman/hang.svg" alt="hang">
            <img class="{{$display["head"]}}" id="head" src="img/hangman/head.svg" alt="head">
            <img class="{{$display["body"]}}" id="body" src="img/hangman/body.svg" alt="body">
            <img class="{{$display["arms"]}}" id="arms" src="img/hangman/arms.svg" alt="arms">
            <img class="{{$display["lleg"]}}" id="lleg" src="img/hangman/lleg.svg" alt="lleg">
            <img class="{{$display["rleg"]}}" id="rleg" src="img/hangman/rleg.svg" alt="rleg">
        </div>

        <div class="game-section">
            <p id="{{$display["state"]}}">
                {{$display["stateText"]}}
            </p>
            <p id="word">
            {{$word_in_page}}
            </p>
            <form class="hanged-input" method="POST">
                <label class="input-underlined">
                    <input id="ch" name="ch" type="text" maxlength="1" required>
                    <span class="input-placeholder">Type a letter</span>
                </label>
                <input class="button" type="submit" value="Go!">
            </form>
        </div>
    </div>
@endsection