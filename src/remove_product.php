<?php
session_start();
if(isset($_POST["product_id"]) && isset($_SESSION["email_login"])){
    $product_id = $_POST["product_id"];
    $email_login = $_SESSION["email_login"];
    $cart_delete = "DELETE FROM cart where user_email='$email_login' and product_id=$product_id and checkedout=0";
    $product_update = "UPDATE product INNER JOIN cart ON cart.product_id = product.product_id and cart.user_email='$email_login' and cart.checkedout=0 SET product.product_count = product.product_count + cart.quantity where product.product_id = $product_id";

    $servername = 'localhost';
    $username = 'root';
    $password = '';
        

    // Create connection
    $con = new mysqli($servername, $username, $password, "pharmacy_db");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if($con -> query($product_update) === FALSE){
        die("Failed to remove");
    }

    if($con -> query($cart_delete) === TRUE){
        echo "Successfully removed";
    }
    else echo "Failed to remove";
}
else echo "Failed to remove";

?>