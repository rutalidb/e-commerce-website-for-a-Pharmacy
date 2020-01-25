<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone No</th>
		
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from login";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c= mysqli_fetch_array($run_c)){
		
		$c_name = $row_c['full_name'];
		$c_email = $row_c['email'];
		$phone_no = $row_c['phone_number'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_name;?></td>
		<td><?php echo $c_email;?></td>
		<td><?php echo $phone_no;?></td>
	</tr>
	<?php } ?>
</table>

