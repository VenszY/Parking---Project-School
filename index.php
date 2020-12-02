<?php
session_start();
if(!empty($_SESSION["uid"])) {
    header("Location: homepage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <title>Project Parking</title>
            <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <form method="POST" action="login.php">
            <label>Username</label>
            <input type="text" name="username">
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit">Login</button>
        </form>
    </div>
    <a href="registration.php">Sign in now!</a>
</body>
</html>