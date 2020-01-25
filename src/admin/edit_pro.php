<!DOCTYPE>

<?php 

include("includes/db.php");

if(isset($_GET['edit_pro'])){

	$get_id = $_GET['edit_pro']; 
	
	$get_pro = "select * from product where product_id='$get_id'";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	$row_pro=mysqli_fetch_array($run_pro);
		
		$product_id = $row_pro['product_id'];
		$product_name = $row_pro['product_name'];
		$product_cost = $row_pro['product_cost'];
		$product_description = $row_pro['product_description'];
		$product_image = $row_pro['product_image'];
		$product_count = $row_pro['product_count'];
		$product_characteristic = $row_pro['product_characteristic']; 
		$product_category = $row_pro['product_category'];
		$product_status = $row_pro['product_status'];
		
		$get_cat = "select * from category where category_id='$product_category'";
		
		$run_cat=mysqli_query($con, $get_cat); 
		
		$row_cat=mysqli_fetch_array($run_cat); 
		
		$category_name = $row_cat['category_name'];
		
		// $get_brand = "select * from brands where brand_id='$pro_brand'";
		
		// $run_brand=mysqli_query($con, $get_brand); 
		
		// $row_brand=mysqli_fetch_array($run_brand); 
		
		// $brand_title = $row_brand['brand_title'];
}
?>
<html>
	<head>
		<title>Update Product</title> 
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="skyblue">


	<form action="" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Edit & Update Product</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Name:</b></td>
				<td><input type="text" name="product_name" size="60" value="<?php echo $product_name;?>"/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Cost:</b></td>
				<td><input type="text" name="product_cost" value="<?php echo $product_cost;?>"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_description" cols="20" rows="10"><?php echo $product_description;?></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" /><img src="product_images/<?php echo $product_image; ?>" width="60" height="60"/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Count:</b></td>
				<td><input type="text" name="product_count" value="<?php echo $product_count;?>"/></td>
			</tr>

			<tr>
				<td align="right"><b>Product Characteristics:</b></td>
				<td><input type="text" name="product_characteristic" size="50" value="<?php echo $product_characteristic;?>"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_category" >
					<option><?php echo $category_name; ?></option>
					<?php $get_cats = "select * from category";
						$run_cats = mysqli_query($con, $get_cats);
					
						while ($row_cats=mysqli_fetch_array($run_cats)){
					
						$category_id = $row_cats['category_id']; 
						$category_name = $row_cats['category_name'];
					
						echo "<option value='$category_id'>$category_name</option>";
					
	
	}
					
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Status:</b></td>
				<td><input type="text" name="product_status" value="<?php echo $product_status;?>"/></td>
			</tr>

			
			<tr align="center">
				<td colspan="8"><input type="submit" name="update_product" value="Update Product"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['update_product'])){
	
		//getting the text data from the fields
		
		$update_id = $product_id;
		
		$product_name = $_POST['product_name'];
		$product_cost = $_POST['product_cost'];
		$product_description = $_POST['product_description'];
		
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$product_count = $_POST['product_count'];
		$product_characteristic = $_POST['product_characteristic'];
		$product_category= $_POST['product_category'];
		$product_status = $_POST['product_status'];

		$update_product = "update product set product_name='$product_name', product_cost='$product_cost',  product_description='$product_description', product_image='$product_image', product_count='$product_count',  product_characteristic='$product_characteristic', product_category='$product_category',  product_status='$product_status' where product_id='$update_id'";
		 
		 $run_product = mysqli_query($con, $update_product);
		 
		 if($run_product){
		 
		 echo "<script>alert('Product has been updated!')</script>";
		 
		 echo "<script>window.open('index.php?view_products','_self')</script>";
		 
		 }
	}








?>












