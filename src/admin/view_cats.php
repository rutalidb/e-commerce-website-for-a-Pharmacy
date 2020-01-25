<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Category ID</th>
		<th>Category Name</th>
		<th>Category Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from category where category_status = '1'";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat =mysqli_fetch_array($run_cat)){
		
		$category_id = $row_cat['category_id'];
		$category_name = $row_cat['category_name'];
		$category_status = $row_cat['category_status'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $category_name;?></td>
		<td><?php echo $category_status;?></td>
		<td><a href="index.php?edit_cat=<?php echo $category_id; ?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $category_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>

