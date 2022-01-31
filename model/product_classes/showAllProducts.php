<?php 
    require_once "model\connection.php";
    class showAllProducts extends Connection{

        public function show(){
            $selectall = $this->pdo->query("SELECT `product_id` FROM products");
            $selectall->execute();

            while($count = $selectall->fetch(PDO::FETCH_ASSOC)){
                $countposition = $count['product_id'];

                $cmd = $this->pdo->prepare("SELECT `product_image`, `product_name`,
                `product_author`, `product_rating`, `product_price`, `product_seller`
                FROM `products` WHERE `product_id` = :id");
                
                $cmd->bindValue(":id", $countposition);
                $cmd->execute();
                $result = $cmd->fetch(PDO::FETCH_ASSOC);
    
                $product_image_url = $result['product_image'];
                $product_name = $result['product_name'];
                $product_author = $result['product_author'];
                $product_rating = $result['product_rating'];
                $product_price = $result['product_price'];
                $product_seller = $result['product_seller'];
                
    
                echo "<div class='product'>
                <img src='view/product_images/{$product_image_url}' alt='Product image'>
        
                <div class='info'>
                    <span id='title'>{$product_name}</span><br>
                    <span id='author'>by {$product_author}</span>
                    <p id='rating'>{$product_rating} ratings</p>
                    <p id='price'> $ {$product_price}</p>
                    <p id='seller'>Announced by {$product_seller}</p>
                </div>
        
                <button>Add to Cart</button>
            </div>";
            }
        }
    }
?>