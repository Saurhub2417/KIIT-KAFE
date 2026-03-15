<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$email = $data["email"];
$password = $data["password"];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

$row = $result->fetch_assoc();

echo json_encode([
"status" => "success",
"user" => $row
]);

} else {

echo json_encode([
"status" => "error"
]);

}

?>
