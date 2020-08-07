<?php

$playing = "disabled";
$word = "";
$seed = "";
$attempts = isset($_GET['ch'])? $_GET['ch']: "";

if ( !isset($_GET['user']) || strlen($_GET['user']) < 1) {
    header("Location: index.php");
    return;
}

if (isset($_GET['seed'])) {
    $seed = $_GET['seed'];
    $playing = "";
    $words = array(
        "Hola",
        "Camino",
        "Bebé",
        "Reloj",
        "Ancheta"
    );
    $word = $words[$_GET['seed']];
}

if (isset($_POST['play'])) {
    header("Location: game.php?user=".urlencode($_GET['user'])."&seed=".rand(0,4));
    return;
}

if (isset($_POST['ch'])) {
    header("Location: game.php?user=".urlencode($_GET['user']).
                                "&seed=".urlencode($_GET['seed']).
                                "&ch=".$attempts.urlencode($_POST['ch']));
    return;
}

$user = $_GET['user'];
$seed = $_GET['seed'];
$display = array(
    "head" => "disabled",
    "body" => "disabled",
    "arms" => "disabled",
    "lleg" => "disabled",
    "rleg" => "disabled"
);

function checkAttempt($attempts, $word) {
    $output = "";
    $finished = FALSE;
    for ($i = 0; $i < strlen($word); $i++) {
        $test_word = str_split($word)[$i];
        for($j = 0; $j < strlen($attempts); $j++) {
            $test_attempt = str_split($attempts)[$j];
            if ($test_attempt == $test_word) {
                $output .= $test_attempt." ";
                $finished = TRUE;
                break;
            }
        }
        if ($finished) {
            $finished = FALSE;
        } else {
            $output .= "_ ";
        }

    }
    return $output;
}

if(isset($_GET['ch'])) {
    //header("Location: game.php?user=".urlencode($_GET['user'])."&seed=".rand(0,4));
    $word_in_page = checkAttempt($_GET['ch'], $word);
}
else {
    $word_in_page = checkAttempt("", $word);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanged! - Game</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<!--Generates an id via GET, that allows to play an specific word (like a seed)-->    
    <header>
        <h2 class="title">
            Hello, <?= htmlentities($user) ?>. Are you ready?
        </h2>
        <h2 id="logout">
            <a href="index.php">Logout</a>
        </h2>
    </header>
    <div class="clear"></div>
    <form method="POST">
        <input class="button" type="submit" name="play" value="Play">
    </form>
    
    <div class="game-grid <?=htmlentities($playing)?>">
        <div class= "hangman">
            <img id="hang" src="img/hangman/hang.svg" alt="hang">
            <img class="<?=htmlentities($display["head"])?>" id="head" src="img/hangman/head.svg" alt="head">
            <img class="<?=htmlentities($display["body"])?>" id="body" src="img/hangman/body.svg" alt="body">
            <img class="<?=htmlentities($display["arms"])?>" id="arms" src="img/hangman/arms.svg" alt="arms">
            <img class="<?=htmlentities($display["lleg"])?>" id="lleg" src="img/hangman/lleg.svg" alt="lleg">
            <img class="<?=htmlentities($display["rleg"])?>" id="rleg" src="img/hangman/rleg.svg" alt="rleg">
        </div>

        <div class="game-section">
            <p id="word">
            <?=htmlentities($word_in_page)?>
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

</body>
</html>