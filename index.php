<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg 
    xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22>
    <text y=%22.9em%22 font-size=%2290%22>🏠</text></svg>">
    <link rel="stylesheet" href="view/CSS/header.css">
    <link rel="stylesheet" href="view/CSS/product.css">
    <title>Home</title>
</head>
<body>
    <?php 
        require_once "model\product_classes\showAllProducts.php";
        require_once "model\cart.php";
        $products = new showAllProducts;
        $cart = new Cart;
    ?>

    <header>
            <nav>
                <div class="logozipcode">
                    <a href="index.php" id="logo">LOGO</a>
                    <p id="zipcode"> 
                        <?php 
                            if(isset($_SESSION['user_name'])){
                                echo "Delievery to "."<strong>".$_SESSION['user_name']."</strong>";
                            }
                        ?>

                        <br> 

                        <?php 
                            if(isset($_SESSION['user_zipcode'])){
                                echo "Zipcode: "."<strong>".$_SESSION['user_zipcode']."</strong>";
                            }
                        ?>
                    </p>
                </div>
                <input type="text" id="txtBusca" placeholder="Search products..."/>

                <ul>
                    <a href="view/register_product.php"><li>Add a new product</li></a>
                    <a href="<?php if(isset($_SESSION['Logged'])){ echo "view/user_profile.php";}else{ echo "view/login_user.php";}?>"><li>Your account</li></a>
                    <a href="view/cart.php"><li>Cart (<?php if(isset($_SESSION['items'])){echo array_sum($_SESSION['items']);}else{echo 0;}?>)</li></a>
                </ul>
            </nav>
    </header>

    <div class="allproducts">
        <?php
            $products->show();
        ?>   
    </div>

</body>
</html>