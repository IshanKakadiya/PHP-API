<?php

class Config
{
    public $Host = "localhost";
    public $USERNAME = "root";
    public $PASS = "";
    public $DB_NAME = "mutli_level_parking";
    public $PARKING_TABLE = "parking";

    public $conn;

    public function Connect()
    {
        $this->conn = mysqli_connect($this->Host, $this->USERNAME, $this->PASS, $this->DB_NAME);
    }

    public function insert($vehicle_name, $vehicle_no_plate, $parking_charge)
    {
        $this->Connect();

        $query = "INSERT INTO $this->PARKING_TABLE(vehicle_name , vehicle_no_plate , parking_charge) VALUES('$vehicle_name','$vehicle_no_plate' , $parking_charge);";

        $res = mysqli_query($this->conn, $query);

        return $res; // bool return 
    }

    public function fetchAllRecord()
    {
        $this->Connect();

        $query = "SELECT * FROM $this->PARKING_TABLE";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_record($id)
    {
        $this->Connect();

        $query = "SELECT * FROM $this->PARKING_TABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function delete($id)
    {
        $this->Connect();

        $query = "DELETE FROM $this->PARKING_TABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function update($vehicle_name, $vehicle_no_plate, $parking_charge, $id)
    {
        $this->Connect();

        $fetch_res = $this->fetch_single_record($id);

        $record = mysqli_fetch_array($fetch_res);

        if ($record) {
            $query = "UPDATE $this->PARKING_TABLE SET vehicle_name='$vehicle_name',vehicle_no_plate='$vehicle_no_plate',parking_charge='$parking_charge' WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res; // bool return 
        } else {
            return false;
        }

    }

}

?>