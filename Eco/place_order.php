<?php
require "php/functions.php";
header('Content-Type: application/json');

$db = dbConnect();

$name  = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$cart  = json_decode($_POST['cart'] ?? '[]', true);

if(!$name || !$email || !$phone || count($cart)===0){
    echo json_encode(["status"=>"error","msg"=>"Missing info or empty cart"]); exit;
}

// Calculate total
$total = 0;
foreach($cart as $item) $total += $item['price'] * $item['quantity'];

// Insert order
$stmt = $db->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, total_amount) VALUES (?,?,?,?)");
$stmt->bind_param("sssd",$name,$email,$phone,$total);
$stmt->execute();
$order_id = $stmt->insert_id;

// Insert order items
$stmt_item = $db->prepare("INSERT INTO order_items (order_id, product_id, product_title, quantity, price, subtotal) VALUES (?,?,?,?,?,?)");
foreach($cart as $item){
    $subtotal = $item['price'] * $item['quantity'];
    $stmt_item->bind_param("iisidd",$order_id,$item['id'],$item['title'],$item['quantity'],$item['price'],$subtotal);
    $stmt_item->execute();
}

echo json_encode(["status"=>"success","order_id"=>$order_id]);
?>
