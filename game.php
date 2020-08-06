<?php

// Check to see if we have some POST data, if we do process it
if ( !isset($_GET['user']) || strlen($_GET['user']) < 1) {
    header("Location: index.php");
    return;
}
else if (isset($_POST['play'])) {
    header("Location: game.php?user=".urlencode($_GET['user'])."&seed=".rand(1,15));
}
else {
    $user = $_GET['user'];
}

$play = false;


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
    <h2>
        Hello, <?= htmlentities($user) ?>. Are you ready?
    </h2>
    <?= htmlentities($play) ?>
    <p>
        <a href="index.php">Logout</a>
    </p>

    <form method="POST">
        <input class="button" type="submit" name="play" value="Play">
    </form>

    <form action="post">
        <input type="text" maxlength="1">
        <input class="button" type="submit" value="Go!">
    </form>

</body>
</html>