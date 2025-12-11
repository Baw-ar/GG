<?php require "php/functions.php"; ?>
<?php
if(isset($_GET['category'])){
    $cat = urldecode($_GET['category']);
    }
?>
<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="wadwdawdadwad">
        <meta name="keywords" content="phones, books, games, electronics">
        <link rel="stylesheet" href="styles.css">       
        <title>Grand Games</title>      
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
        <div class="section-title">Products in the <?php echo ucfirst($cat) ?> category</div>

        <?php $products = getProductsByCategory($cat) ?>

        <div class="product">
        <?php 
            foreach($products as $product_2){
                ?>

            <div class="product-left">
                <img src="<?php echo "products/{$product_2['image']}" ?>" alt="">
            </div>

            <div class="product-right">
                <p class="title">
                    <a href="product.php?title=<?php echo urlencode ($product_2['title']) ?>">
                        <?php echo $product_2['title']; ?>
                    </a>
                </p>
 
                <p class="description">
                    <?php echo $product_2['description']; ?>
                </p>

                <p class="price">
                    $<?php echo $product_2['price']; ?>
                </p>
            </div>
             <?php
            }
        ?>
        </div>
    </div>
</main>


         <?php include 'footer.php'; ?>
        <script src="script.js"></script> 
    </body> 
    </html>
</DOCTYPE>