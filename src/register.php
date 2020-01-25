<?php
include_once("db_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_email = htmlspecialchars($_POST['email']);
	$user_name = htmlspecialchars($_POST['name']);
	$user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$user_phone = htmlspecialchars($_POST['phone']);
	$sql = "SELECT email FROM login WHERE email='$user_email'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);
	if(!$row['email']){
	$sql = "INSERT INTO login(`email`, `password`, `full_name`, `phone_number`) VALUES ('$user_email', '$user_password', '$user_name', $user_phone)";
	if (mysqli_query($conn, $sql))
		echo "User is registered successfully. Please log in to your account.";
	else 
		die("database error:". mysqli_error($conn)."qqq".$sql);
	
	} else {
	echo "User is already registered. Please try again with other email id.";
	}
}
?>