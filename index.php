<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finish It! - Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body id="animation">
    <div class="login-box">
        <div class="title">
            <img src="img/title-logo.svg" alt="hanged title">
        </div>
        <form action="post">
            <label class="input-underlined">
                <input id="user" name="user" type="text" required>
                <span class="input-placeholder">Username</span>
                <span class="input-helper"></span>
            </label>
            <label class="input-underlined">
                <input id="pass" name="pass" type="password" required>
                <span class="input-placeholder">Password</span>
                <span class="input-helper"></span>
            </label>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>