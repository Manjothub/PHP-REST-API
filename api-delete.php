<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true); // this format will read all the formats (json, etc.)
$id = $data['sid'];
include "config.php";

$sql = "DELETE FROM `student` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record Deleted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Deletion Failed. Try Again!', 'status' => false));
}

?>
