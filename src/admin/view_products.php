
	<div class="row mb-5">
	<div class="col-md-9 order-2">
	<div class="row mb-5">
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from product where product_status='1'";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_name = $row_pro['product_name'];
		$pro_image = $row_pro['product_image'];
		$pro_cost = $row_pro['product_cost'];
		$i++;
	
	?>
	<div class="col-sm-6 col-lg-4 mb-4" >
   
                <div class="block-4 text-center border">
                  <figure class="block-4-image"> 
				 
                   <a><img src="product_images/<?php echo $pro_image;?>"  width = "200" height ="200" ></a> 
                  </figure>
				  <div class="block-4-text p-4">
				  <h3><?php echo $pro_name;?></h3>
                    <p class="text-primary font-weight-bold">$<?php echo $pro_cost;?></p>
					<a class="btn btn-sm btn-primary" href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a>
					<a class="btn btn-sm btn-primary" href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a>
                  </div>
                </div>
              </div>
	
	<?php } ?>
	
	</div>
	</div>
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

					$sql=mysqli_query($con, "SELECT * FROM category");

					if(mysqli_num_rows($sql)){
					while($product_array=mysqli_fetch_array($sql)){
                    
                 
                    ?>
                    <div class="list-group-item text">
                        <h3> <?php echo $product_array['category_name']; ?> </h3>
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

