<?php
session_start();
require_once "auth.php";
if (!empty($_POST) &&
    isset($_PSOT(["logout"])) &&
    !empty($_POST["logout"]) &&
    $_POST["logout"] == "logout")     {
    $auth = new Authentication();
    $auth->logout()
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Home pahe</title>
</head>
<body>
    <div>
        <h1>Welcome to our project</h1>
    </div>
    <form method="POST" action="homepage.php">
        <button type="submit" >Logout</button>
    </form>
</body>
</html>