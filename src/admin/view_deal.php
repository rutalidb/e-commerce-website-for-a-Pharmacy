<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Deals Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Deal Name</th>
		<th>Deal Cost</th>
		<th>Deal Count</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not Admin','_self')</script>";
}
else {

	$get_deal = "select * from deal";
	
	$run_deal = mysqli_query($con, $get_deal); 
	
	$i = 0;
	
	while ($row_deal=mysqli_fetch_array($run_deal)){
		
		$deal_name = $row_deal['deal_name'];
		$deal_cost = $row_deal['deal_cost'];
		$deal_count = $row_deal['deal_count'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $deal_name;?></td>
		<td><?php echo $deal_cost;?></td>
		<td><?php echo $deal_count;?></td>
		<td><a href="index.php?edit_deal=<?php echo $deal_name; ?>">Edit</a></td>
		<td><a href="delete_deal.php?delete_deal=<?php echo $deal_name;?>">Delete</a></td>
	
	</tr>
	<?php }} ?>
</table>

