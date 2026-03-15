<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$order_code = $data["order_code"];
$user_id = $data["user_id"];
$total = $data["total"];
$payment = $data["payment_method"];
$items = $data["items"];

$sql = "INSERT INTO orders (order_code,user_id,payment_method,total,status)
VALUES ('$order_code','$user_id','$payment','$total','Preparing')";

$conn->query($sql);

$order_id = $conn->insert_id;

foreach($items as $item){

$name = $item["name"];
$price = $item["price"];
$qty = $item["qty"];

$conn->query("INSERT INTO order_items
(order_id,item_name,price,quantity)
VALUES
('$order_id','$name','$price','$qty')");

}

echo json_encode([
"status"=>"success",
"order_id"=>$order_id
]);

?>
