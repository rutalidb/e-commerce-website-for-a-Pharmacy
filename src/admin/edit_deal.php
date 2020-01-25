<?php

include('includes/db.php');

if(isset($_GET['edit_deal'])){
	$deal_name = $_GET['edit_deal'];

	$get_deal = "select * from deal where deal_name = '$deal_name'";

	$run_deal = mysqli_query($con, $get_deal);

	$row_deal = mysqli_fetch_array($run_deal);
	
	$deal_name = $row_deal['deal_name'];
	$deal_cost = $row_deal['deal_cost'];
	$deal_count = $row_deal['deal_count'];
	

}

?>

<form action="" method="post" style="padding: 50px">

	<strong>Update Deal:</strong>
	<input type="text" name='new_deal' value="<?php echo $deal_name; ?>">
	<br><br>
	<strong>Deal Cost:</strong>
	<input type="text" name='deal_cost' value="<?php echo $deal_cost; ?>">
	<br><br>
	<strong>Deal Count:</strong>
	<input type="text" name='deal_count' value="<?php echo $deal_count; ?>">
	<br><br>
	<input type="submit" name="update_deal" value="Update Deal">
</form>	

<?php


	if(isset($_POST['update_deal'])){

		$update_deal_name = $deal_name;

		$new_deal = $_POST['new_deal'];
		$deal_cost = $_POST['deal_cost'];
		$deal_count = $_POST['deal_count'];
		
		$update_deal = "update deal set deal_name= '$new_deal', deal_cost = '$deal_cost', deal_count = '$deal_count' where deal_name = '$update_deal_name'";

		$run_deal = mysqli_query($con, $update_deal);

		if($run_deal){
			echo "<script>alert('Deal has been updated')</script>";
			echo "<script>window.open('index.php?view_deal','_self')</script>";
		}
	}
?>

