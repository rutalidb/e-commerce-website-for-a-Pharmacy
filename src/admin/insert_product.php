<!DOCTYPE html>

<?php
include("includes/db.php");
?>


<html>
<head>
	<title>Inserting Product</title>
</head>
<body>
<div class="col-md-12">
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" border="2px solid black" bgcolor = "#187EAE">
			<tr align="center">
				<th colspan="7"><h2>Insert New Product Here!</h2></th>
			</tr>
			
			<tr>
				<td><b>Product Name:</b></td>
				<td><input class="form-control border-0" type="text" name="product_name" required></td>
			</tr>

			<tr>
				<td><b>Product Price:</b></td>
				<td><input class="form-control border-0" type="text" name="product_cost" required></td>
			</tr>

			<tr>
				<td><b>Product Description:</b></td>
				<td><textarea class="form-control border-0" name="product_description" cols="20" rows="10"></textarea></td>
			</tr>

			<tr>
				<td><b>Product Image:</b></td>
				<td><input class="form-control border-0" type="file" name="product_image" required></td>
			</tr>

			<tr>
				<td><b>Product Count:</b></td>
				<td><input class="form-control border-0" type="int" name="product_count" required></td>
			</tr>

			<tr>
				<td><b>Product Characteristics:</b></td>
				<td><input class="form-control border-0" type="text" name="product_characteristic" required></td>
			</tr>


			<tr>
				<td><b>Product Category:</b></td>
				<td>
					<select name="product_category" required>
						<option>Select a category</option>
						<?php
							$get_cats = "select * from category";
							$run_cats = mysqli_query($con,$get_cats);

							while($row_cats = mysqli_fetch_array($run_cats)){
								$category_id = $row_cats['category_id'];
								$category_name = $row_cats['category_name'];

								echo "<option value = '$category_id'>$category_name</option>";
							}
						?>
					</select>

				</td>
			</tr>

			<tr>
				<td><b>Product Status:</b></td>
				<td><input class="form-control border-0" type="text" name="product_status" required></td>
			</tr>

			<tr>
				<td align="center" colspan="8"><input class="btn btn-sm btn-primary" type="submit" name="insert_post" value="Insert Product"></td>
			</tr>

		</table>
	</form>
	</div>
</body>
</html>



<?php 

	if(isset($_POST['insert_post'])){
	
		//getting the text data from the fields
		$product_name = $_POST['product_name'];
		$product_cost = $_POST['product_cost'];
		$product_description = $_POST['product_description'];
		
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"product_images/$product_image");

		$product_count = $_POST['product_count'];
		$product_category= $_POST['product_category'];
		$product_characteristic = $_POST['product_characteristic'];
		$product_status = $_POST['product_status'];
	
		
		 $insert_product = "insert into product (product_name, product_cost, product_description, product_image, product_count, product_category, product_characteristic, product_status) values ('$product_name','$product_cost','$product_description','$product_image','$product_count','$product_category','$product_characteristic', '$product_status')";
		 
		 $insert_pro = mysqli_query($con, $insert_product);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_pro','_self')</script>";
		 
		 }
	}


?>
