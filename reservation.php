<?php
require_once dirname(__FILE__). "/views/navi.html";
require_once dirname(__FILE__). "/views/reservation.html";
require_once dirname(__FILE__). "/repositories/ParkingRepository.php";
$parkingRepository = new ParkingRepository();
$spots = $parkingRepository->showFreeSpots();
$ForT = $parkingRepository->decryptBool();

echo "<table style = 'text-align=center'>
        <tr>
            <th>Spot Status</th>
            <th>Spot Number</th>
            <th>Spot Describtion</th>
        </tr>";

foreach($spots as $spot) {
    echo "
        <tr>
            <td>".$spot['FreeOrTaken']."</td>
            <td>".$spot['SpotNumber']."</td>
            <td>".$spot['SpotDescribtion']."</td>
        </tr>
    ";
}
echo "</table>";          
