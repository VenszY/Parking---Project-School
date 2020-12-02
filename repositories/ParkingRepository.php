<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";

class ParkingRepository extends Db {
    function __constructor() {
        //TODO
    }
    
    public function reserveSpot () {
        $sql = "
            UPDATE 
                parking_spots
            SET 
                FreeOrTaken=0,
            WHERE 1
        ";
        $this->connection->exec($sql);
    }

    public function releaseSpot () {
        $sql = "
            UPDATE 
                parking_spots
            SET 
                FreeOrTaken=1,
            WHERE 1
        ";
        $this->connection->exec($sql);
    }

    public function decryptBool () {
        $sql = "SELECT FreeOrTaken FROM parking_spots";
        $result = $this->connection->query($sql);

        if($result == 0) {
            $result = "Taken";
            return $result;
        } else {
            $result = "Free";
            return $result;
        }
    }

    public function showFreeSpots () {
        $sql = "SELECT * FROM parking_spots";
        $result = $this->connection->query($sql);
        $allSpots = $result->fetchAll();

        if(!empty($allSpots)) {
            return $allSpots;
        } else {
            return [];
        }
    }

}