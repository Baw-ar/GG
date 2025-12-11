<?php 
    require "config.php";
    
    function dbConnect() {
       $mysqli = new mysqli("localhost", "root", PASSWORD, "eco");
       if ($mysqli->connect_errno != 0) {
        return FALSE;
    } else {
        return $mysqli;
    }  
}

function getCategories(){
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT DISTINCT category FROM products_2");
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    return $categories;
}

function getHomePageProducts($int){
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT * FROM products_2 ORDER BY rand () LIMIT $int");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function getProductsByCategory($category){
    $mysqli = dbConnect();
    $smtp = $mysqli->prepare("SELECT * FROM products_2 WHERE category = ?");
    $smtp->bind_param("s", $category);
    $smtp->execute();
    $result = $smtp->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}

function getProductByTitle($title){
    $mysqli = dbConnect();
    $stmt = $mysqli->prepare("SELECT * FROM products_2 WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}

function getProductById($id) {
    $conn = dbConnect(); // your database connection function
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $product;
}