<?php
require "php/functions.php";

if (!isset($_GET['id'])) { die("Invalid order."); }

$order_id = $_GET['id'];
$db = dbConnect();

$order = $db->query("SELECT * FROM orders WHERE id = $order_id")->fetch_assoc();
$items = $db->query("SELECT * FROM order_items WHERE order_id = $order_id");
?>
<!DOCTYPE html>
<html>
<head><title>Order Success</title>
    <style>


body{
    font-family: sans-serif;
    color: #555;
    min-width: 100%;
}   
        nav{
    display: grid;
    grid-template-columns: auto 1fr;
    align-items: center;
    grid-column-gap: 30px;
    grid-template-rows: 70px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.15);
    position: sticky;
    top: 0;
    background-color: white;
    padding-left: 20px;
    padding-right: 20px;
}
nav .brand{
    font-size: 20px;
    font-weight: bold;
    color: #245990;
}
nav a{
    text-decoration: none;
    display: inline-block;
    padding: 10px 35px;
    transition: background-color 0.3s, color 0.3s;
    color: #245990;
}
nav a:hover, 
nav a.active{
    background: #4d9176;
    color: #fff;
    border-radius: 3px;
}

    </style>
</head>
<body>
        <?php include 'nav.php'; ?> 

<h1>Order Successful!</h1>
<p>Order ID: <?php echo $order_id; ?></p>
<p>Name: <?php echo $order['customer_name']; ?></p>
<p>Total: $<?php echo $order['total_amount']; ?></p>

<h3>Items:</h3>
<ul>
<?php while($row = $items->fetch_assoc()): ?>
    <li><?php echo $row['product_title']; ?> (x<?php echo $row['quantity']; ?>)</li>
<?php endwhile; ?>
</ul>


</body>
</html>
