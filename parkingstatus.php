<?php
require_once dirname(__FILE__). "/views/navi.php";
require_once dirname(__FILE__). "/views/parkingstatus.html";
          
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
            <td>";
                if($spot['FreeOrTaken'] != false) {
                    echo "<form method='POST' action='reservation.php'>
                        <button type='submit' name='reserve' value='".$spot['id']."'>Reserve</button>
                    </form>";
                } else {
                    echo "<form method='POST' action='reservation.php'>
                        <button type='submit' name='release' value='".$spot['id']."'>Release</button>
                    </form>";
                }
    echo "
            </td>
        </tr>
    ";
}
echo "</table>
    </body>
    </html>";