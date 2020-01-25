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
            <li class="active"><a href="about.php">About us</a></li>
            <li><a href="shop.php">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Learn more about our pharmacists</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-12 col-lg-5 pl-md-5">
		  <p>DrugsDirect pharmacists do much more than dispense prescriptions. Your pharmacist can help you and your family stay healthy by:</p>
            <button class="accordion">Answering your questions:</button>
			<div class="panel">
			  <p>If you have any questions regarding your medications or about one of the many services we offer, your pharmacist can help. They are always ready and willing to assist you.</p>
			</div>
			
			<button class="accordion">Provide Immunizations: </button>
			<div class="panel">
			  <p>Our specially trained and certified pharmacists can provide a wide range of immunizations. You don’t need an appointment and we accept most insurance plans. Take your FREE Immunization Evaluation and talk to your pharmacist today.</p>
			</div>
			
			<button class="accordion">Helping you save money: </button>
			<div class="panel">
			  <p>Your pharmacist can help guide you through questions you may have about your prescription insurance coverage, including Medicare Part D.</p>
			</div>
			
			<button class="accordion">Work with your doctor: </button>
			<div class="panel">
			  <p>Your pharmacist will work directly with your doctor when they have questions or possible concerns about the medications you are taking. They ensure you are at the lowest possible risk for overdoses and adverse drug reactions by keeping a detailed history of the medications you take.</p>
			</div>
			
			
		  <h4>So be sure to talk to your DrugsDirect pharmacist today. The better they know you, the better they can help serve you and your needs.</h4>
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
  </div>
    
	<script src="js/bootstrap.min.js"></script> 
	<script src="js/index.js"></script>
	
  </body>
</html>