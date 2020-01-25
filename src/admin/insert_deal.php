<form action="" method="post" style="padding: 50px">

	<strong>Insert New Deal:</strong>
	<input type="text" name='new_deal' required><br><br>
	<strong>Deal Cost:</strong>
	<input type="text" name="deal_cost"><br><br>
	<strong>Deal Count:</strong>
	<input type="text" name="deal_count"><br><br>
	<input type="submit" name="add_deal" value="Add Deal">
	
</form>	

<?php

	include('includes/db.php');
	if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not Admin','_self')</script>";
}
else {


	if(isset($_POST['add_deal'])){

		$new_deal = $_POST['new_deal'];
		$deal_cost = $_POST['deal_cost'];
		$deal_count = $_POST['deal_count'];

		$insert_deal = "insert into deal(deal_name, deal_cost, deal_count) values('$new_deal', '$deal_cost', '$deal_count')";

		$run_deal = mysqli_query($con, $insert_deal);

		if($run_deal){
			echo "<script>alert('New Deal has been inserted')</script>";
			echo "<script>window.open('index.php?insert_deal','_self')</script>";
		}
	}
}
?>

