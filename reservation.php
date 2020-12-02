
<?php

require_once dirname(__FILE__). "/repositories/ParkingRepository.php";

if(!empty($_POST['reserve'])){
    $spotid = $_POST['reserve'];
} else {
    $spotid = $_POST['release'];
}

$parkingRepository = new ParkingRepository();
$spot = $parkingRepository->showSpot($spotid);


if($spot['FreeOrTaken'] != false) {
    $reserveSpot = $parkingRepository->reserveSpot($spotid);
} else {
    $reserveSpot = $parkingRepository->releaseSpot($spotid);
    header("Location: parkingstatus.php");
}
 require_once dirname(__FILE__). "/views/navi.html";
 
 ?>
        <h1>Your reserved spot is <?php print_r($spot['SpotNumber']) ?>.<br><br> We are waiting you :)</h1>
    </body>
</html>