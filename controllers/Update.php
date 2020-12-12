<?php
require_once dirname(dirname(__FILE__)). "/views/navi.php";
require_once dirname(dirname(__FILE__)). "/views/update.html";

require_once dirname(dirname(__FILE__)). "/repositories/ParkingRepository.php";

$parkingRepository = new ParkingRepository();

if (!empty($_POST['spot_id'])) {

    $spotID = $_POST['spot_id'];
    $spot = $parkingRepository->showSpot($spotID);

    if(!empty($spot)) {
        echo "<form method='POST' action='../controllers/Update.php?update_id=".$spot['id']."'>
            <label>Spot Number</label>
            <input type='text' name='SpotNumber' value='".$spot['SpotNumber']."'><br>
            <label>Spot Describtion</label>
            <textarea type='text' name='describtion'>".$spot['SpotDescribtion']."</textarea><br>
            <button type='submit' name='update'>Update</button>
        </form>";
    } else {
        header("Location: ../controlpanel.php");
    }
} else if(!empty($_GET['update_id'])) {
    $spotId = $_GET['update_id'];
    $spotNumber = $_POST["SpotNumber"];
    $describtion = $_POST["describtion"];
    $update_data = [
        "spot_id" => $spotId,
        "spot_number" => $spotNumber,
        "describtion" => $describtion,
    ];
    $parkingRepository->updateSpotById($update_data);
    header("Location: ../controlpanel.php");
} else {
    header("Location: ../controlpanel.php");
}


