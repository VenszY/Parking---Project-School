<?php 
require_once "UserRepository.php";

if (!empty($_POST) && 
    isset($_POST["username"]) && 
    !empty($_POST["username"]) &&
    isset($_POST["password"]) && 
    !empty($_POST["password"])) 
{
    $userRepository = new UserRepository();
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($userRepository->addNewUser($username, $password)) {
        header("Location: index.html");
    }
    
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
    <form method="POST" action="registration.php">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit">Create User</button>
    </form>
</body>
</html>
