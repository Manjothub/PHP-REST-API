<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// $data = json_decode(file_get_contents("php://input"), true); // this format will read all the formats (json, etc.)

$search_value = isset($_GET['search']) ? $_GET['search']:die();
include "config.php";

$sql = "SELECT * FROM `student` WHERE name LIKE '$search_value'";

$result = mysqli_query($conn, $sql);

if ($result) {
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(array('message' => 'No matching records found', 'status' => false));
    }
} else {
    echo json_encode(array('message' => 'Query Failed. Try Again!', 'status' => false));
}

?>
