<?php
session_start();
if(empty($_SESSION["uid"])) {
    header("Location: index.php");
}
require_once "Authentication.php";

if (!empty($_POST) && 
    isset($_POST["logout"]) && 
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<body>
    <div>
        <h1>Welcome to our project</h1>
    </div>
    <form method="POST" action="homepage.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>