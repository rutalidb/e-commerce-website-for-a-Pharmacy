<form action="" method="post" style="padding: 50px">

	<strong>Insert New Category:</strong>
	<input type="text" name='new_cat' required><br><br>
	<strong>Category Status:</strong>
	<input type="text" name="cat_status"><br><br>
	<input type="submit" name="add_cat" value="Add Category">
	
</form>	

<?php

	include('includes/db.php');

	if(isset($_POST['add_cat'])){

		$new_cat = $_POST['new_cat'];
		$cat_status = $_POST['cat_status'];

		$insert_cat = "insert into category(category_name, category_status) values('$new_cat', '$cat_status')";

		$run_cat = mysqli_query($con, $insert_cat);

		if($run_cat){
			echo "<script>alert('New Category has been inserted')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>

