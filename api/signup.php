<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"];
$email = $data["email"];
$phone = $data["phone"];
$password = $data["password"];

$sql = "INSERT INTO users (name,email,phone,password)
VALUES ('$name','$email','$phone','$password')";

if($conn->query($sql)){

echo json_encode([
"status"=>"success"
]);

}else{

echo json_encode([
"status"=>"error"
]);

}

?>
