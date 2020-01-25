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
                <a href="index.php" class="js-logo-clone">DRUGSDIRECT</a>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li class="active"><a href="shop.php">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.php">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
			
			<?php
				session_start();
				if(isset($_SESSION["email_login"])){
					$email_login = $_SESSION["email_login"];
			?>
	          <form id="order_details">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname">
				  <span id="fnamespan"></span><br />
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname">
				  <span id="lnamespan"></span><br />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Full Apartment address">
				  <span id="addressspan"></span><br />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country">
				  <span id="state_countryspan"></span><br />
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Postal Code / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
				  <span id="postal_zipspan"></span><br />
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address">
				  <span id="email_span"></span><br />
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
				  <span id="phone_span"></span><br />
                </div>
				
              </div>
			  </form>
            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
				<form id="coupon">
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" name = "c_code" id="c_code" placeholder="Coupon Code">
                    <button class="btn btn-primary btn-sm" id = "apply_button" type="button" onclick="validate_coupon()">Apply</button> &nbsp;
					<button class="btn btn-primary btn-sm" id = "remove_button" type="button" onclick="remove_coupon()">Remove</button>
                  </div>
					<span id="coupon_span"></span>
				 </form>
                </div>
              </div>
            </div>        
			
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
					
					<?php
						$servername = 'localhost';
						$username = 'root';
						$password = '';
							

						// Create connection
						$con = mysqli_connect($servername, $username, $password, "pharmacy_db");

						// Check connection
						if (mysqli_connect_error()) {
							die("Connection failed: " . $con->connect_error);
						}
				
						$sql=mysqli_query($con, "SELECT * FROM cart inner join product on product.product_id = cart.product_id where user_email = '$email_login'");
						$total_cost = 0;
						if(mysqli_num_rows($sql)){
								while($product_array=mysqli_fetch_array($sql)){
					?>
			
                      <tr>
                        <td><?php echo $product_array['product_name']; ?> <strong class="mx-2">x</strong> <?php echo $product_array['quantity']; ?></td>
						
						<?php
							$total_cost += $product_array['product_cost'] * $product_array['quantity'];
						?>
                        
						<td>$<?php echo $product_array['product_cost'] * $product_array['quantity']; ?>.00</td>
                      </tr>
				<?php
						}
				}
				?>
				
					  </tbody>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">$<?php echo $total_cost; ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
						<?php
							if(isset($_SESSION["coupon_cost"])){
						?>
						
                        <td id="discount" class="text-black font-weight-bold"><strong>$<?php echo $total_cost - $_SESSION["coupon_cost"] ?></strong></td>
						<?php
							}
							else{
						?>
						<td id="discount" class="text-black font-weight-bold"><strong>$<?php echo $total_cost ?></strong></td>
						<?php
							}
						?>
                      </tr>
                  </table>
                  <div class="border p-3 mb-3">
					<button class="accordion">Direct Bank Transfer</button>
                      <div class="panel">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <button class="accordion">Cheque Payment</button>
                      <div class="panel">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <button class="accordion">Paypal</button>
                      <div class="panel">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                  </div>

                  <div class="form-group">
                    <button onclick="place_order()" class="btn btn-primary btn-lg py-3 btn-block">Place Order</button>
					
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

<?php
}
?>
	<footer class="site-footer border-top">       
          <div class="col-md-12 text-center">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            </p>
          </div>
    </footer>
	
  </div>
  <script>
	function place_order(){
		var fname = $('#c_fname').val();
		var lname = $('#c_lname').val();
		var address = $('#c_address').val();
		var state_country = $('#c_state_country').val();
		var postal = $('#c_postal_zip').val();
		var email = $('#c_email_address').val();
		var phone = $('#c_phone').val();
		
		event.preventDefault();
	
		$('#fnamespan').hide();
		$('#lnamespan').hide();
		$('#addressspan').hide();
		$('#state_countryspan').hide();
		$('#postal_zipspan').hide();
		$('#emailspan').hide();
		$('#phonespan').hide();
		
		var name_pattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
		var postal_pattern = /^\d{6}$/;
		var phone_pattern = /^\d{10}$/;
		var email_pattern = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var fname_flag = false;
		var lname_flag = false;
		var address_flag = false;
		var postal_flag = false;
		var email_flag = false;
		var phone_flag = false;
		var state_flag = false;
		
		//fname validation
		if(fname == ''){
		$('#fnamespan').text("This field is required");
		$('#fnamespan').addClass("error");
		$('#fnamespan').show();
			fname_flag = false;
		}
		
		else if(name_pattern.test(fname) && fname != ''){
			$('#fnamespan').removeClass("error");
			$('#fnamespan').hide();
			fname_flag = true;
		}
		else if(!name_pattern.test(fname) && fname != ''){
			$('#fnamespan').text("Only characters allowed.");
			$('#fnamespan').addClass("error");
			$('#fnamespan').show();
			fname_flag = false;
		}
		
		//lname validation
		if(lname == ''){
		$('#lnamespan').text("This field is required");
		$('#lnamespan').addClass("error");
		$('#lnamespan').show();
			lname_flag = false;
		}
		
		else if(name_pattern.test(lname) && lname != ''){
			$('#lnamespan').removeClass("error");
			$('#lnamespan').hide();
			lname_flag = true;
		}
		else if(!name_pattern.test(lname) && lname != ''){
			$('#lnamespan').text("Only characters allowed.");
			$('#lnamespan').addClass("error");
			$('#lnamespan').show();
			lname_flag = false;
		}
		
		//address validation
		if(address == ''){
		$('#addressspan').text("This field is required");
		$('#addressspan').addClass("error");
		$('#addressspan').show();
			address_flag = false;
		}
		else{
			$('#addressspan').removeClass("error");
			$('#addressspan').hide();
			address_flag = true;
		}
		
		//state_country validation
		if(state_country == ''){
		$('#state_countryspan').text("This field is required");
		$('#state_countryspan').addClass("error");
		$('#state_countryspan').show();
			state_flag = false;
		}
		
		else if(name_pattern.test(state_country) && state_country != ''){
			$('#state_countryspan').removeClass("error");
			$('#state_countryspan').hide();
			state_flag = true;
		}
		else if(!name_pattern.test(state_country) && state_country != ''){
			$('#state_countryspan').text("Only characters allowed.");
			$('#state_countryspan').addClass("error");
			$('#state_countryspan').show();
			state_flag = false;
		}
		
		
		//postal code validation
		if(postal == ''){
		$('#postal_zipspan').text("This field is required.");
		$('#postal_zipspan').addClass("error");
		$('#postal_zipspan').show();
		postal_flag = false;
		}
		
		else if(postal_pattern.test(postal) && postal.length==6 && postal != ''){
			$('#postal_zipspan').removeClass("error");
			$('#postal_zipspan').hide();
			postal_flag = true;
		}
		else if(!postal_pattern.test(postal) && postal.length==6 && postal != ''){
			$('#postal_zipspan').text("Only digits allowed.");
			$('#postal_zipspan').addClass("error");
			$('#postal_zipspan').show();
			postal_flag = false;
		}
		else if(postal_pattern.test(postal) && postal.length>=6 && postal != ''){
			$('#postal_zipspan').text("Should have exact 6 digits.");
			$('#postal_zipspan').addClass("error");
			$('#postal_zipspan').show();
			postal_flag = false;
		}
		else if(!postal_pattern.test(postal) && postal.length>=6 && postal != ''){
			$('#postal_zipspan').text("Format is not correct.");
			$('#postal_zipspan').addClass("error");
			$('#postal_zipspan').show();
			postal_flag = false;
		}
		else if(!postal_pattern.test(postal) && postal.length<=6 && postal != ''){
			$('#postal_zipspan').text("Format is not correct.");
			$('#postal_zipspan').addClass("error");
			$('#postal_zipspan').show();
			postal_flag = false;
		}
			
		//email address validation
		if(email == ''){
		$('#email_span').text("This field is required");
		$('#email_span').addClass("error");
		$('#email_span').show();
		email_flag = false;
		}
		
		else if(email_pattern.test(email) && email != ''){
			$('#email_span').removeClass("error");
			$('#email_span').hide();
			email_flag = true;
		}
		else if(!email_pattern.test(email) && email != ''){
			$('#email_span').text("Email format: admin@domain.com");
			$('#email_span').addClass("error");
			$('#email_span').show();
			email_flag = false;
		}
		
		//phone validation
		if(phone == ''){
		$('#phone_span').text("This field is required.");
		$('#phone_span').addClass("error");
		$('#phone_span').show();
		phone_flag = false;
		}
		
		else if(phone_pattern.test(phone) && phone.length==10 && phone != ''){
			$('#phone_span').removeClass("error");
			$('#phone_span').hide();
			phone_flag = true;
		}
		else if(!phone_pattern.test(phone) && phone.length==10 && phone != ''){
			$('#phone_span').text("Only digits are allowed.");
			$('#phone_span').addClass("error");
			$('#phone_span').show();
			phone_flag = false;
		}
		else if(phone_pattern.test(phone) && phone.length<=10 && phone != ''){
			$('#phone_span').text("Should have exact 10 digits.");
			$('#phone_span').addClass("error");
			$('#phone_span').show();
			phone_flag = false;
		}
		else if(!phone_pattern.test(phone) && phone.length<=10 && phone != ''){
			$('#phone_span').text("Phone Number format is not correct.");
			$('#phone_span').addClass("error");
			$('#phone_span').show();
			phone_flag = false;
		}
		
		if(fname_flag && lname_flag && postal_flag && address_flag && phone_flag && email_flag && state_flag){
			$.ajax({
				url:"place_order.php",
				method:"POST",
				data: $('#order_details, #coupon').serialize() + "&discount=" + $('#discount').text(),
				success:function(data){
					//alert(data);
				   if(data==="success"){
					location.href = "thankyou.php";
					}
				}
			});
		}
	}
	
	function validate_coupon(){
		event.preventDefault();
		$.ajax({
			url:"validate_coupon.php",
			method:"POST",
			data: $('#coupon').serialize(),
			success:function(data){
					//alert(data);
					if(data==="Your coupon is valid."){
					$('#coupon_span').removeClass("error");
					$('#coupon_span').text("Your coupon is valid.");
					$('#coupon_span').addClass("success");
					$('#coupon_span').show(); 
					$("#apply_button").attr("disabled","disabled");
					}
				
				else{
					$('#coupon_span').removeClass("success");
					$('#coupon_span').text("Your coupon is not valid.");
					$('#coupon_span').addClass("error");
					$('#coupon_span').show();
				}
				
				$("#discount").load(window.location.href + " #discount");
				
			}
		});
	}
	
	function remove_coupon(){
		$.ajax({
			url:"remove_coupon.php",
			method:"POST",
			data: $('#coupon').serialize(),
			success:function(data){
				if(data==="Coupon is removed."){
					$('#coupon_span').removeClass("error");
					$('#coupon_span').text("Coupon is removed.");
					$('#coupon_span').addClass("success");
					$('#coupon_span').show();
					$("#remove_button").attr("disabled","disabled");	
					$("#apply_button").attr("disabled",false);
					$("#c_code").val("");
			}
			$("#discount").load(window.location.href + " #discount");
			}
		});
	}
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/index.js"></script>
    
  </body>
</html>