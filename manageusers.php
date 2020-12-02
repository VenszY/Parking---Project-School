<?php
session_start();
require_once dirname(__FILE__). "/repositories/UserRepository.php";
$userRepository = new UserRepository();
$user = $userRepository->showUser($_SESSION['uid']);
    if($user['id'] != 6 && $user['access'] != false) {
        header("Location: homepage.php");
    }


require_once dirname(__FILE__). "/views/navi.php";
require_once dirname(__FILE__). "/views/manageusers.html";

$users = $userRepository->showAllUsers();


echo "<table style = 'text-align=center'>
        <tr>
            <th>Username</th>
            <th>User Status</th>
        </tr>";

foreach($users as $user) {
    if($user['access'] == false) {
        $decryptedBool = "Admin";
    } else {  
        $decryptedBool = "User";
    }
    echo "
        <tr>
            <td>".$user['username']."</td>
            <td>".$decryptedBool."</td>
            <td>";
            if($user['id'] != 6) {
                if($user['access'] != false) {
                    echo "<form method='POST' action='controllers/UserManager.php'>
                        <button type='submit' name='promote' value='".$user['id']."'>Promote</button>
                    </form>";
                } else {
                    echo "<form method='POST' action='controllers/UserManager.php'>
                        <button type='submit' name='demote' value='".$user['id']."'>Demote</button>
                    </form>";
                }
            }
    echo "
            </td>
        </tr>
    ";
}
echo "</table>";
?>