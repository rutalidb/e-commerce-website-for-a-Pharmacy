<?Php
$search_query = '';
if(isset($_GET["query"])){
  $search_query = $_GET["query"];
}

$page_no = 1;
if(isset($_GET["pageno"])){
  $page_no = $_GET["pageno"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pharmacy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">

	
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1">
              <form action="shop.php" class="site-block-top-search">
                <input type="text" name="query" class="form-control border-0" placeholder="Search" value="<?php echo $search_query;?>">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">DrugsDirect</a>
              </div>
            </div>

            <div class="text-right col-6 col-md-4 order-3 order-md-3">
              <div class="site-top-icons">
                <ul>
                  <li><a href="signup.php"><span class="icon glyphicon glyphicon-user"></span></a></li>
                  <li><a href="cart.php" class="site-cart"><span class="icon glyphicon glyphicon-shopping-cart"></span>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
                    </a>
                  </li> 
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="shop.php">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
        <?php 
          session_start();
          if(isset($_SESSION["email_login"])){
        ?>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table id= "shopping" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
				<?php
		    $servername = 'localhost';
			$username = 'root';
			$password = '';
			 
       
			// Create connection
			$con = new mysqli($servername, $username, $password, "pharmacy_db");

			// Check connection
			if ($con->connect_error) {
				die("Connection failed: " . $con->connect_error);
			}
			
			//updata database table product --> product_count

      
        $email_login = $_SESSION["email_login"];

        if(isset($_POST["product_id"]) && isset($_POST["quantity"])){
          $product_id = $_POST['product_id'];
          $quantity = $_POST['quantity'];

          $sql=mysqli_query($con, "UPDATE product SET product_count = product_count-'$quantity' WHERE product_id = '$product_id'");
        

          $cart_select = "SELECT * FROM cart WHERE user_email='$email_login' and product_id=$product_id and checkedout=0";
          $cart_insert = "INSERT INTO cart (product_id, user_email, quantity) VALUES ($product_id, '$email_login', $quantity)";
          $cart_update = "UPDATE cart set quantity = quantity + $quantity where user_email='$email_login' and product_id=$product_id and checkedout=0";


          $cart_select_result = mysqli_query($con, $cart_select);

          if(mysqli_num_rows($cart_select_result)>0){
            $cart_update_result = mysqli_query($con, $cart_update);
          }
          else{
            $cart_insert_result = mysqli_query($con, $cart_insert);
          }

        }
      $cart_total = 0;
			
			$sql=mysqli_query($con, "SELECT p.product_image, p.product_name, p.product_cost, p.product_count, c.quantity, p.product_id FROM product p inner join cart c ON c.product_id = p.product_id where p.product_id in (SELECT product_id FROM cart WHERE user_email='$email_login' and checkedout=0)");
			if(mysqli_num_rows($sql)){
					while($product_array=mysqli_fetch_array($sql)){
			?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="admin/product_images/<?php echo $product_array['product_image']; ?>" alt="Image" class="img-fluid" width ="150" height ="150">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $product_array['product_name']; ?></h2>
                    </td>
					<td>$<?php echo $product_array['product_cost']; ?></td>
                    
                    <td>
                        <div class="product-thumbnail">
						  <div class="input-group mb-3" style="max-width: 120px;">
						  <div class="input-group-prepend">
							<button type="button" class="btn btn-outline-primary js-btn-minus" data-quantity="minus" data-field="<?php echo $product_array["product_id"];?>" >&minus;</button>
						  </div>
              <input class="form-control text-center" name="quantity-<?php echo $product_array["product_id"];?>" value=<?php echo $product_array["quantity"]; ?>  placeholder="" >
              <input type="hidden" name="product_count-<?php echo $product_array["product_id"];?>" value="<?php echo $product_array["product_count"];?>"/>
              <input type="hidden" name="product_id-<?php echo $product_array["product_id"];?>" value="<?php echo $product_array["product_id"];?>"/>
						  <div class="input-group-append">
							<button class="btn btn-outline-primary js-btn-plus" data-quantity="plus" type="button" data-field="<?php echo $product_array["product_id"];?>">&plus;</button>
						  </div>
						</div>

						</div>
                    </td>
                    <td><?php echo "$";echo $product_array["quantity"]*$product_array['product_cost']; $cart_total+=$product_array["quantity"]*$product_array['product_cost'] ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm" onClick="removeProduct(<?php echo $product_array["product_id"] ?>)">X</a></td>
                  </tr>
                      <?php
					}
			}
			?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" onClick="updateCart()">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='shop.php'">Continue Shopping</button>
              </div>
            </div>
          </div>
		  
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $cart_total;?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          function removeProduct(product_id){
            $.post({
              url: 'remove_product.php',
              method: "POST",
              data: {product_id: product_id},
              success: function(data){
                alert(data);
                window.location.href="cart.php";
              }
            });
          }

          function updateCart(){
            var products = [];
            $("input[name^=quantity-]").each(function(){
              var productId = $(this).attr("name").split("-")[1];
              var quantity = $(this).val();

              products.push({productId: productId, quantity: quantity});
            });

            $.post({
              url: 'update_cart.php',
              method: "POST",
              data: {products: JSON.stringify(products)},
              success: function(data){
                alert(data);
                window.location.href="cart.php";
              }
            });
            
          }
          jQuery(document).ready(function(){
            // This button will increment the value
          //alert(max_count);
            $('[data-quantity="plus"]').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name=quantity-'+fieldName+']').val());
                var max_count = currentVal + parseInt($('input[name=product_count-'+fieldName+']').val());

                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                  if(currentVal+1 <= max_count)
                  {
                    $('input[name=quantity-'+fieldName+']').val(currentVal + 1);
                    $('input[name=product_count-'+fieldName+']').val(max_count - currentVal-1);
                  }
                  else
                    $(this).attr('disabled','disabled');
                } 
                else {
                  // Otherwise put a 0 there
                  $('input[name='+fieldName+']').val(1);
                }
            });
            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
            $('[data-quantity="plus"]').attr('disabled',false);
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name=quantity-'+fieldName+']').val());
                var max_count = parseInt($('input[name=product_count-'+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 1) {
                    // Decrement one
                    $('input[name=quantity-'+fieldName+']').val(currentVal - 1);
                    $('input[name=product_count-'+fieldName+']').val(max_count + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=quantity-'+fieldName+']').val(1);
                }
            });
        });
        </script>
    <?php } else echo "Please login to add to cart." ?>
      </div>
    </div>
<footer class="site-footer border-top">       
          <div class="col-md-12 text-center">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            </p>
          </div>
    </footer>
  </div>


  
  <script src="js/bootstrap.min.js"></script>
 
   <script src="js/index.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>