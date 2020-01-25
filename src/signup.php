<?Php
session_start();
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
	<script src="js/validation_login.js"></script>
	<script src="js/validation_signup.js"></script>

	
    
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="shop.php">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>
	
	
	
	<div class="site-section">
      <div class="container">
        <div class="row">
			
		<?php
			if(isset($_SESSION["email_login"])){
		 ?>
		 
			<div class="col-md-7">
				<div class="p-lg-5 border">
					<h2 class="h3 mb-3 text-black">You're already logged in!</h2>
					<a href="shop.php" class="btn btn-sm btn-primary">Shop Now</a>
				</div>
			</div>
		<?php
			}
			if(!isset($_SESSION["email_login"])){
		 ?>
          <div class="col-md-7">

            <form id="login" class="form-container" method="post">
              
              <div class="p-lg-5 border">
				  <div class="text-center">
					<h2 class="h3 mb-3 text-black">Log in!</h2>
				  </div>
		  
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="text" id = "email_login" name="email_login" placeholder="Enter email">
					<span id="emailspan"></span><br />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="password" class="text-black">Password <span class="text-danger">*</span></label>
                    <input type="password" id="pwd_login" name="pwd_login" placeholder="Enter password">
					<span id="passwordspan"></span><br />
                  </div>
                </div>	
				  <div class="form-group row"> 
					<div class="col-md-12">
					  <button type="submit" class="btn">Submit</button>
					</div>
				  </div>
				  
              </div>
            </form>
          </div>
		  <?php
			}
		?>
		  <div class="col-md-5 ml-auto">
				<div class="p-4 border mb-3">
					<div class="text-center">
						<h2 class="h3 mb-3 text-black">Sign Up!</h2>
					</div>
				  <form id = "signup" class="form-container" method="post">
					<p>Password requirement : at least 1 digit, 1 Uppercase, 1 lower case, 1 special character. It should have 8 characters.</p>
					<div>
						<label for="name" class="text-black">Name <span class="text-danger">*</span></label>
						<input type="text" placeholder="Enter Name" id = "name" name="name">
						<span id="username_span"></span><br />
					</div>
					<div>
						<label for="email" class="text-black">Email <span class="text-danger">*</span></label>
						<input type="text" placeholder="Enter Email" id = "email" name="email">
						<span id="email_span"></span><br />
					</div>
					<div>
						<label for="password" class="text-black">Password <span class="text-danger">*</span></label>
						<input type="password" placeholder="Enter Password" id="password" name="password">
						<span id="password_span"></span><br />
					</div>
					<div>
						<label for="phone" class="text-black">Phone Number <span class="text-danger">*</span></label>
						<input type="text" placeholder="Enter Phone Number" id="phone" name="phone">
						<span id="phone_span"></span><br />
					</div>
					<button type="submit" class="btn">Submit</button>	
				  </form>
				  </div>
          </div>
			
          </div>
        </div>
      </div>
    </div>			
						
      <footer class="site-footer border-top">       
          <div class="col-md-12 text-center">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            </p>
          </div>
    </footer>
</html>