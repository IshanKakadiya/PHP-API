<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $result = $config->fetchAllRecord();

    $records = [];

    while ($record = mysqli_fetch_assoc($result)) {
        foreach ($record as $k => $v) {
            $new_record[$k] = $v;
        }

        array_push($records, $new_record);
    }

    http_response_code(200);
    $res['data'] = $records;
} else {
    $res['msg'] = "Only GET request is allowed . . .";
}

echo json_encode($res);
?>