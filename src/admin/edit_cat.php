<?php

include('includes/db.php');

if(isset($_GET['edit_cat'])){
	$category_id = $_GET['edit_cat'];

	$get_cat = "select * from category where category_id = '$category_id'";

	$run_cat = mysqli_query($con, $get_cat);

	$row_cat = mysqli_fetch_array($run_cat);
	$category_id = $row_cat['category_id'];
	$category_name = $row_cat['category_name'];
	$category_status = $row_cat['category_status'];


}

?>

<form action="" method="post" style="padding: 50px">

	<strong>Update Category:</strong>
	<input type="text" name='new_cat' value="<?php echo $category_name; ?>">
	<br><br>
	<strong>Category Status</strong>
	<input type="text" name='category_status' value="<?php echo $category_status; ?>">
	<br><br>
	<input type="submit" name="update_cat" value="Update Category">
</form>	

<?php


	if(isset($_POST['update_cat'])){

		$update_id = $category_id;

		$new_cat = $_POST['new_cat'];
		$category_status = $_POST['category_status'];

		$update_cat = "update category set category_name= '$new_cat', category_status = '$category_status' where category_id = '$update_id'";

		$run_cat = mysqli_query($con, $update_cat);

		if($run_cat){
			echo "<script>alert('Category has been updated')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>

