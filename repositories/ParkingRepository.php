<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";

class ParkingRepository extends Db {
    // public $id;

    function __constructor() {
        //TODO
    }
    
    public function reserveSpot ($id) {
        $sql = "
            UPDATE 
                parking_spots
            SET 
                FreeOrTaken=0
            WHERE id=".$id;
        $this->connection->exec($sql);
    }

    public function releaseSpot ($id) {
        $sql = "
            UPDATE 
                parking_spots
            SET 
                FreeOrTaken=1
            WHERE id=".$id;
        $this->connection->exec($sql);
    }

    public function showSpot ($id) {
        $sql = "SELECT * FROM parking_spots WHERE id=$id";
        $result = $this->connection->query($sql);
        $Spot = $result->fetch();

        if(!empty($Spot)) {
            return $Spot;
        } else {
            return [];
        }
    }

    public function showAllSpots () {
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