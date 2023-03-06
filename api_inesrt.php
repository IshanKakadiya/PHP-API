<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // fetch input values
    $vehicle_name     = $_POST['vehicle_name'];
    $vehicle_no_plate = $_POST['vehicle_no_plate'];
    $parking_charge   = $_POST['parking_charge'];

    // call insert logic
    $insert_res = $config->insert($vehicle_name, $vehicle_no_plate, $parking_charge);

    if ($insert_res) {
        $res['msg'] = "Recored Insert Succesfully ...";
    } else {
        $res['msg'] = "Recored Inserted Failed ...";
    }
} else {
    $res['msg'] = "Only POST request is allowed . . .";
}

echo json_encode($res);
?>