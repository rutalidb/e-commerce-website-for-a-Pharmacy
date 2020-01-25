<div class="col-md-9 order-2 results">
	<div class="row mb-5">

<?php

//fetch_data.php

			$search_query = '';
			if(isset($_POST["query"])){
				$search_query = $_POST["query"];
			}

			$servername = 'localhost';
			$username = 'root';
			$password = '';
			 
       
			// Create connection
			$con = new mysqli($servername, $username, $password, "pharmacy_db");

			// Check connection
			if ($con->connect_error) {
				die("Connection failed: " . $con->connect_error);
			}
			
	if(isset($_POST["action"]))
 {
	 if (isset($_POST['pageno'])) {
            $pageno = $_POST['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page;

			
			$total_pages_sql = "SELECT COUNT(*) FROM product ";
			
			if(isset($_POST['category'])){
				$category_name = implode("','", $_POST["category"]);
				$total_pages_sql .= "inner join category on product.product_category = category.category_id AND category.category_name IN ('".$category_name."') and product_status = '1' ";
			}

			if($search_query!="")
				$total_pages_sql.=" where (product_name like '%".$search_query."%' or product_description like '%".$search_query."%') and  product_status = '1' ";

			$result = mysqli_query($con,$total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);

		
			$query = "SELECT * FROM product ";
			
			//if(mysqli_num_rows($sql)){
			//while($product_array=mysqli_fetch_array($sql)){
				
	$category_names = '';
	if(isset($_POST['category'])){
	$category_name = implode("','", $_POST["category"]);
	$category_names = implode(",", $_POST["category"]);
	//echo $category_name;
	$query .= "inner join category on product.product_category = category.category_id AND category.category_name IN ('".$category_name."') AND product_status = '1' ";
			
	}

	if($search_query!=''){
		$query.=" where (product_name like '%".$search_query."%' or product_description like '%".$search_query."%') and product_status = '1' ";
	}
	else{
		$query.=" where product_status = '1' ";
	}

	$query .= "LIMIT $offset, $no_of_records_per_page";
	
	$sql=mysqli_query($con, $query);
	// if(gettype($sql) == boolean)
	// {
	// $sql = (object)$sql;
	// }
	// echo gettype($sql);
	$output = '';
	if(mysqli_num_rows($sql)){
	while($product_array=mysqli_fetch_array($sql)){
		
	?>
   <div class="col-sm-6 col-lg-4 mb-4" >
   
                <div class="block-4 text-center border">
                  <figure class="block-4-image"> 
				 
                   <a href="shop-single.php?product_id=<?php echo $product_array["product_id"]; ?>"><img src="admin/product_images/<?php echo $product_array["product_image"]; ?>"  width = "200" height ="200" ></a> 
                  </figure>
				  <div class="block-4-text p-4">
				  <h3><a href="shop-single.php?product_id=<?php echo $product_array["product_id"]; ?>"><?php echo $product_array["product_name"]; ?></a></h3>
                    <p class="text-primary font-weight-bold"><?php echo "$".$product_array["product_cost"]; ?></p>
                  </div>
                </div>
              </div>

   <?php
		
	}
	}
		
		
			}
			
	
	
   




?>
</div>
<div class = "row"> 
			<div class="col-md-12 text-center pagination">
			<ul class="pagination">
				<li><a href="?pageno=1<?php echo "&query=".$search_query."&category=".urlencode($category_names) ?>">First</a></li>
				<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
					<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1)."&query=".$search_query."&category=".urlencode($category_names); } ?>">Prev</a>
				</li>
				<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
					<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1)."&query=".$search_query."&category=".urlencode($category_names); } ?>">Next</a>
				</li>
				<li><a href="?pageno=<?php echo $total_pages."&query=".$search_query."&category=".urlencode($category_names); ?>">Last</a></li>
			</ul>
			</div>
			</div>
</div>
			
			
