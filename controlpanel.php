<?php
require_once dirname(__FILE__). "/views/navi.php";
require_once dirname(__FILE__). "/repositories/UserRepository.php";
$mainAdmin = 6;
$userRepository = new UserRepository();
$user = $userRepository->showUser($_SESSION['uid']);
    if($user['id'] != $mainAdmin && $user['access'] != false) {
        header("Location: homepage.php");
    }


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
            if($user['id'] != $mainAdmin) {
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

require_once dirname(__FILE__). "/repositories/ParkingRepository.php";
$parkingRepository = new ParkingRepository();
$spots = $parkingRepository->showAllSpots();

require_once dirname(__FILE__). "/views/update.html";


echo "<table style = 'text-align=center'>
        <tr>
            <th>Spot Status</th>
            <th>Spot Number</th>
            <th>Spot Describtion</th>
            <th>Actions</th>
        </tr>";

foreach($spots as $spot) {
    if($spot['FreeOrTaken'] == false) {
        $decryptedBool = "Taken";
    } else {  
        $decryptedBool = "Free";
    }
    echo "
        <tr>
            <td>".$decryptedBool."</td> 
            <td>".$spot['SpotNumber']."</td>
            <td>".$spot['SpotDescribtion']."</td>
            <td>
                <form method='POST' action='./controllers/Update.php'>
                    <button type='submit' name='spot_id' value='".$spot['id']."'>Upddate</button>
                </form>
                <form method='POST' action='./controllers/Delete.php'>    
                    <button type='submit' name='delete' value='".$spot['id']."'>Delete</button>
                </form>
            </td>
        </tr>
    ";
}
echo "</table>";

require_once dirname(__FILE__). "/views/createnew.html";

echo "<form method='POST' action='./controllers/AddNewSpot.php'>
            <label>Spot Number</label>
            <input type='text' name='SpotNumber'><br>
            <label>Spot Describtion</label>
            <textarea type='text' name='SpotDescription'></textarea><br>
            <button type='submit' name='create'>Create</button>
        </form>";




echo"</body>
</html>";
?>