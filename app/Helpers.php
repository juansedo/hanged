<?php

/**
 * function setActive($routename)
 * 
 * This function returns 'active' class when
 * $routename is actual route.
 */
function setActive($routename) {
    return request()->routeIs($routename) ? 'active' : '';
}

/**
 * function valueIfSessionHas($var, $otherwise = "")
 * 
 * This function returns session()->get($var)
 * if exists. Otherwise, returns the $otherwise value.
 */
function valueIfSessionHas($var, $otherwise = "") {
    return session()->has($var) ? session()->get($var) : $otherwise;
}

/**
 * function checkAttempt($word, $ch)
 * 
 * This function returns true if any
 * $word's character is equal to $ch.
 */
function checkAttempt($word, $ch) {
    return !(strpos($word, $ch) === FALSE);
}

/**
 * function checkVictory()
 * 
 * If $word_in_page does not have underscores,
 * it means the player won.
 *
 */
function checkVictory($word_in_page) {
    return strpos($word_in_page, "_") === FALSE;
}

/**
 * function fillDisplayedWord($magic_word, $attempts)
 * 
 * It checks every attempt (in $attempts) 
 * with $magic_word to create the
 * output of discovered characters.
 * 
 * Example outputs:
 * _ _ _ _  _ _ _ _
 * _ _ A _ _
 * _ E _ B E
 */
function fillDisplayedWord($magic_word = "", $attempts = array()) {
    $output = "";
    $finished = FALSE;  //Variable to avoid typing multiple times the underscore (_) in output
    for ($i = 0; $i < strlen($magic_word); $i++) {
        $test_ch = str_split($magic_word)[$i];
        if ($test_ch == " ") {
            $output .= "&nbsp; ";
            continue;
        }
        for($j = 0; $j < count($attempts); $j++) {
            $test_attempt = $attempts[$j];
            if ($test_ch == $test_attempt) {
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
 * function changeDisplay()
 * 
 * It changes the hangman display state
 * according to lifes left.
 */
function changeDisplay() {
    $word = session()->get('word');
    $lifes = session()->get('lifes');
    switch($lifes) {
        case 0:
            session()->put('display.rleg', '');
        case 1:
            session()->put('display.lleg', '');
        case 2:
            session()->put('display.arms', '');
        case 3:
            session()->put('display.body', '');
        case 4:
            session()->put('display.head', '');
        case 5:
        default:
            break;
    }
}