<?php
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not Admin','_self')</script>";
}
else {

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
              
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">DrugsDirect</a>
              </div>
            </div>

            <div class="text-right col-6 col-md-4 order-3 order-md-3">
              <div class="site-top-icons">
                <ul>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>                   
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-md-center" role="navigation">
          <ul class="site-menu">
			<li><a href="index.php?insert_product">Insert New Product</a></li>
			<li><a href="index.php?view_products">View Products</a></li>
			<li><a href="index.php?insert_cat">Insert New Category</a></li>
			<li><a href="index.php?view_cats">View All Categories</a></li>
			<li><a href="index.php?view_customers">View Customers</a></li>
			<li><a href="index.php?view_orders">View Orders</a></li>
			<li><a href="index.php?view_deal">View Deals</a></li>
			<li><a href="index.php?insert_deal">Insert Deals</a></li>
          </ul>
      </nav>
    </header>
	
	<div class="site-section">
      <div class="container">
			
			<?php

				if(isset($_GET['insert_product'])){
					include("insert_product.php");
				}


				else if(isset($_GET['view_products'])){
					include("view_products.php");
				}

				else if(isset($_GET['edit_pro'])){
					include("edit_pro.php");
				}

				else if(isset($_GET['insert_cat'])){
					include("insert_cat.php");
				}

				else if(isset($_GET['view_cats'])){
					include("view_cats.php");
				}

				else if(isset($_GET['edit_cat'])){
					include("edit_cat.php");
				}

			
				else if(isset($_GET['view_customers'])){
					include("view_customers.php");
				}
				
				else if(isset($_GET['insert_deal'])){
					include("insert_deal.php");
				}

				else if(isset($_GET['view_deal'])){
					include("view_deal.php");
				}

				else if(isset($_GET['edit_deal'])){
					include("edit_deal.php");
				}


				else if(isset($_GET['view_orders'])){
					include("view_orders.php");
				}
				
				else{
					?>
	<div class="site-blocks-cover" style="background-image: url(product_images/doctor.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="mb-2"> Welcome to Admin Area </h1>
          </div>
        </div>
      </div>
    </div>
					<?php
				}
}

			?>
		</div>
		</div>
	
	</div>


    
	
	<script src="js/bootstrap.min.js"></script> 
	<script src="js/index.js"></script>
</body>
</html>