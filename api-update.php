<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true); // this format will read all the formats(json etc)
$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$scity = $data['scity'];
include "config.php";

$sql = "UPDATE `student` SET name ='$name', age ='$age', city = '$scity' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record Updated', 'status' => true));
} else {
    echo json_encode(array('message' => 'Updation Failed. Try Again!', 'status' => false));
}

?>
