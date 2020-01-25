<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Orders</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Total</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from orders";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	$total = 0;
	
	while ($row_c= mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['customer_id'];
		$c_fname = $row_c['fname'];
		$c_lname = $row_c['lname'];
		$c_email = $row_c['email'];
		$c_total = $row_c['total'];
		$total += substr($c_total, 1);
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_fname;?></td>
		<td><?php echo $c_lname;?></td>
		<td><?php echo $c_email;?></td>
		<td><?php echo $c_total;?></td>	
	</tr>
	<?php } ?>
	<tr align="center" bgcolor="skyblue">
		<th colspan="4">Total</th>
		<th>$<?php echo $total; ?></th>
	</tr>
</table>

