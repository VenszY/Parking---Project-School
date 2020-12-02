<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="reservation.php">My Reservations</a></li> 
            <li><a href="parkingstatus.php">Parking Status</a></li>
            <?php
                require_once dirname(dirname(__FILE__)). "/repositories/UserRepository.php";
                $userRepository = new UserRepository();
                $user = $userRepository->showUser($_SESSION['uid']);
                if($user['id'] == 6 || $user['access'] == false) {
                    echo '<li><a href="manageusers.php">Manage User</a></li>';
                }
            ?>
            <li>
                <form method="POST" action="homepage.php">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </li>
        </ul>
    </nav>
