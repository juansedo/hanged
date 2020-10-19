<?php

function setActive($routename) {
    return request()->routeIs($routename) ? 'active' : '';
}

function valueIfSessionHas($var, $otherwise = "") {
    return session()->has($var) ? session()->get($var) : $otherwise;
}

function checkAttempt($word, $ch) {
    foreach(str_split($word) as $c) {
        if ($c == $ch) return true;
    }
    return false;
}

/**
 * function fillDisplayedWord($magic_word, $attempts)
 * 
 * It checks every attempt (in $attempts) 
 * with secret word ($word) to create the
 * output of discovered characters.
 * 
 * Example outputs:
 * _ _ _ _ _ _ _ _
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