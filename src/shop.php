<?Php
session_start();
$search_query = '';
if(isset($_GET["query"])){
  $search_query = $_GET["query"];
}

$categories = [];

if(isset($_GET['category'])){
  $category_name = $_GET['category'];
  $categories = explode(',',$category_name);
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
            <li><a href="about.php">About us</a></li>
            <li class="active"><a href="shop.php">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
			<!-- append filter_data -->
			
			<!-- side bar -->
          <div class="col-md-3 order-1 mb-4 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
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

          $sql=mysqli_query($con, "SELECT * FROM category where category_status='1'");

					if(mysqli_num_rows($sql)){
					while($product_array=mysqli_fetch_array($sql)){
                    
                 
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" <?php if(in_array(trim($product_array['category_name']),$categories)) echo 'checked'; else echo 'test'; ?> class="common_selector category" value="<?php echo $product_array['category_name']; ?>" > <?php echo $product_array['category_name']; ?> </label>
                    </div>
                    <?php    
                    }
					}
                    ?>            
				</ul>
                </div> 
            </div>
			<!-- side bar end -->
			
			
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
  </div>
   
  <script src="js/bootstrap.min.js"></script> 
	<script src="js/index.js"></script>
	<script>
$(document).ready(function(){

    filter_data();

    $('.common_selector').click(function(){
        filter_data();
    });

});
function filter_data()
{
    
    var action = 'fetch_data';
    
    var category = get_filter('category');

    $(".results").remove();
	$(".pagination").html("");

    $.ajax({
        url:"fetch_data.php",
        method:"POST",
        data:{
          action:action,
          category:category, 
          query: '<?php echo $search_query; ?>', 
          pageno: '<?php echo $page_no;?>'
        },
        success:function(data){
            $('.mb-5').append(data);
    //event.preventDefault();
        }
    });

}

function get_filter(class_name)
{
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
  
    });
    return filter;
}
</script>
    
  </body>
</html>