<?php
session_start();
if(isset($_POST["products"]) && isset($_SESSION["email_login"])){
    $products = json_decode($_POST["products"]);
    $email_login = $_SESSION["email_login"];


    foreach($products as $product){
        $product_id = $product->productId;
        $quantity = $product->quantity;

        $product_update = "UPDATE product INNER JOIN cart ON cart.product_id = product.product_id and cart.user_email='$email_login' and cart.checkedout=0 SET product.product_count = product.product_count + cart.quantity - $quantity where product.product_id = $product_id";
        $update_cart = "update cart set quantity = $quantity where product_id=$product_id and user_email = '$email_login' and checkedout=0";

        $servername = 'localhost';
        $username = 'root';
        $password = '';
            

        // Create connection
        $con = new mysqli($servername, $username, $password, "pharmacy_db");

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        //echo $update_cart;

        if($con -> query($product_update) === FALSE || $con -> query($update_cart) === FALSE){
            die("Failed to update");
        }
    }

    echo "Successfully updated";


    
}
else echo "Invalid request";

?>