<?php
// The password is hanged123
$salt = '*w_52$0%Hk';
$stored_hash = '7a95b199144677cc04302a11c0e3132f84f8ef2b536c2043689a8fa3f6c750db';

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['user']) && isset($_POST['pass']) ) {
    $check = hash('sha256', $_POST['pass'].$salt);
    if ( $check == $stored_hash ) {
        // Redirect the browser to game.php
        header("Location: game.php?user=".urlencode($_POST['user']));
        return;
    } else {
        $failure = "Incorrect password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanged! - Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body id="animation">
    <div class="login-box">
        <div class="title">
            <img src="img/title-logo.svg" alt="hanged title">
        </div>
        <span class="input-helper"> <?=htmlentities($failure)?> </span>
        <form method="POST">
            <label class="input-underlined">
                <input id="user" name="user" type="text" required>
                <span class="input-placeholder">Username</span>
            </label>
            <label class="input-underlined">
                <input id="pass" name="pass" type="password" required>
                <span class="input-placeholder">Password</span>
            </label>
            <input class="button" type="submit" value="Log In">
        </form>
    </div>
</body>
</html>