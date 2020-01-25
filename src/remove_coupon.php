<?php
	session_start();
	if(isset($_SESSION["coupon_cost"])){
		$code = $_POST["c_code"];
		
		$sql = "select * from deal where deal_name='$code'";
		
        $servername = 'localhost';
        $username = 'root';
        $password = '';
            

        // Create connection
        $con = mysqli_connect($servername, $username, $password, "pharmacy_db");

        // Check connection
        if (mysqli_connect_error()) {
            die("Connection failed: " . $con->connect_error);
        }
		
		$result = mysqli_query($con, "UPDATE deal SET deal_count = deal_count + 1 where deal_name='$code'");
		if($result){				
			unset($_SESSION["coupon_cost"]);
			echo "Coupon is removed.";
		}
	}
	else{
		echo $_SESSION["coupon_cost"];
	}
?>