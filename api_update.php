<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT , PATCH');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

    parse_str(file_get_contents("php://input"), $_PUT_PATCH);

    $vehicle_name     = $_PUT_PATCH['vehicle_name'];
    $vehicle_no_plate = $_PUT_PATCH['vehicle_no_plate'];
    $parking_charge   = $_PUT_PATCH['parking_charge'];
    $id               = $_PUT_PATCH['id'];

    $update_res = $config->update($vehicle_name, $vehicle_no_plate, $parking_charge, $id);

    if ($update_res) {
        $res['msg'] = "Record update Successfully ...";
    } else {
        $res['msg'] = "Record Updation failed ...";
    }


} else {
    $res['msg'] = "Only PUT/PATCH request is allowed . . .";
}

echo json_encode($res);
?>