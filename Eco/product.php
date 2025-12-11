<?php
require "php/functions.php";

// Fetch product by title or ID
if (isset($_GET['title'])) {
    $title = urldecode($_GET['title']);
    $product_2 = getProductByTitle($title);

    if (!$product_2 || count($product_2) === 0) {
        die("Product not found.");
    }
    $product = $product_2[0]; // simplify variable
} elseif (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
    if (!$product) die("Product not found.");
} else {
    die("No product specified.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $product['meta_description'] ?>">
    <meta name="keywords" content="<?php echo $product['meta_keywords'] ?>">
    <link rel="stylesheet" href="styles.css">       
    <title><?php echo $product['title']?></title>     
    <style>
        .checkout-form input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .checkout-btn {
            background: #27ae60;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 15px;
        }
        footer { 
            bottom: 0;      
            position: fixed;
        }
    </style>  
</head>
<body>   
    <?php include 'nav.php'; ?> 
    <?php include 'header.php'; ?>

<main> 
    <div class="left">
        <div class="section-title">Product Categories</div>
        <?php $categories = getCategories(); ?> 
        <?php foreach($categories as $category): ?>
            <a href="category.php?category=<?php echo urlencode($category['category']); ?>">
                <?php echo ucfirst($category['category']); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="right">
        <div class="section-title">Product Details</div>
        <div class="product">
            <div class="product-left">
                <img src="<?php echo "products/{$product['image']}" ?>" alt="">
            </div>

            <div class="product-right">
                <p class="title"><?php echo $product['title']; ?></p>
                <p class="description"><?php echo $product['description']; ?></p>
                <p class="price">$<?php echo $product['price']; ?></p>

                <!-- Add to Cart -->
                <button onclick="addToCart(
                    <?php echo $product['id']; ?>,
                    '<?php echo $product['title']; ?>',
                    <?php echo $product['price']; ?>
                )">Add to Cart</button>

                <!-- Checkout Form -->
                <h3>Checkout</h3>
                <div class="checkout-form">
                    <input type="text" id="name" placeholder="Full Name">
                    <input type="email" id="email" placeholder="Email">
                    <input type="text" id="phone" placeholder="Phone Number">
                    <button class="checkout-btn" id="place-order">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script>
// Cart array stored in localStorage
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Add product to cart
function addToCart(id, title, price) {
    let existing = cart.find(item => item.id == id);
    if (existing) {
        existing.quantity += 1;
    } else {
        cart.push({id: id, title: title, price: price, quantity: 1});
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(title + " added to cart!");
}

// Place order
document.getElementById("place-order").addEventListener("click", function () {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;

    if (!name || !email || !phone) {
        alert("Please fill all fields.");
        return;
    }
    if (cart.length === 0) {
        alert("Your cart is empty.");
        return;
    }

    fetch("place_order.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: new URLSearchParams({
            name: name,
            email: email,
            phone: phone,
            cart: JSON.stringify(cart)
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            localStorage.removeItem("cart");
            alert("Order placed! Order ID: " + data.order_id);
            window.location.href = "order_success.php?id=" + data.order_id;
        } else {
            alert("Order failed: " + data.msg);
        }
    }).catch(err => console.error(err));
});
</script>
</body>
</html>
