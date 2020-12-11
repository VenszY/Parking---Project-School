<?php
require_once dirname(__FILE__). "/views/navi.php";
if(empty($_SESSION["uid"])) {
    header("Location: index.php");
}
require_once dirname(__FILE__). "/core/Authentication.php";

if (!empty($_POST) && 
    isset($_POST["logout"]) && 
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}
require_once dirname(__FILE__). "/views/homepage.html";

require_once dirname(__FILE__). "/repositories/ParkingRepository.php";
$parkingRepository = new ParkingRepository();
$spots = $parkingRepository->showAllSpots();


echo "<table style = 'text-align=center'>
        <tr>
            <th>Spot Status</th>
            <th>Spot Number</th>
            <th>Spot Describtion</th>
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
        </tr>
    ";
}
echo "</table>";
?>

