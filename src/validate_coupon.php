<?php
session_start();
if(isset($_SESSION["email_login"])){
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
		
		$res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res)>0){
			$row = mysqli_fetch_assoc($res);
			if($row["deal_count"] >= 1){
				$_SESSION["coupon_cost"] = $row["deal_cost"];
				$result = mysqli_query($con, "UPDATE deal SET deal_count = deal_count - 1 where deal_name='$code'");
				if($result){
					echo "Your coupon is valid." ;
				}
			}
			else
				echo "Sorry, deal got expired.";
        }
		else{
			echo "Your coupon is invalid.";
		}    
}
else echo "Invalid request";

?>