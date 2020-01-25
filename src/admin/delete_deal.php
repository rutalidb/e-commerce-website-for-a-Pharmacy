<?php

include('includes/db.php');

if(isset($_GET['delete_deal'])){
	$delete_id = $_GET['delete_deal'];

	$delete_deal = "delete from deal where deal_name = '$delete_id'";

	$run_delete = mysqli_query($con, $delete_deal);

	if($run_delete){
		echo "<script>alert('Deal has been deleted')</script>";
		echo "<script>window.open('index.php?view_deal','_self')</script>";
	}
}

?>