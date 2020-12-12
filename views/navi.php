<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/Parking/homepage.php">Home</a></li>
            <li><a href="/Parking/views/myreservation.php">My Reservations</a></li> 
            <li><a href="/Parking/parkingstatus.php">Make Reservation</a></li>
            <?php
                session_start();
                require_once dirname(dirname(__FILE__)). "/repositories/UserRepository.php";
                $userRepository = new UserRepository();
                $user = $userRepository->showUser($_SESSION['uid']);
                if($user['id'] == 6 || $user['access'] == false) {
                    echo '<li><a href="/Parking/controlpanel.php">Control Panel</a></li>';
                }
            ?>
            <li>
                <form method="POST" action="homepage.php">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </li>
        </ul>
    </nav>
