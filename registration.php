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
    $hashedPassword = hash("sha512", $password); 

    if ($userRepository->addNewUser($username, $hashedPassword)) {
        header("Location: index.php");
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
