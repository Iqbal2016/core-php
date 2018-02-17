<?php 
	include('header.php');
	include('db.php'); 
?>
<h2 align="center">Available Food Items</h2>
<table width="100%" class="list" cellspacing="0" cellpadding="5" border="0">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Code</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$query = mysql_query("SELECT * FROM `food` ORDER BY food_name ASC ");
	
	$i = 1;
	while($row2 = mysql_fetch_object($query)){
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
            
		echo '<tr bgcolor="'.$bgcolor.'">
				<td>'.$i.'</td>
				<td>'.$row2->food_name.'</td>
				<td>'.$row2->food_code.'</td>
				<td>'.$row2->price.'</td>
				<td><a href="food_edit.php?food_id='.$row2->food_id.'">Edit</a> | <a href="food_delete.php?food_id='.$row2->food_id.'">Delete</a></td>
			</tr>';
		$i++;
	}
	?>
	</tbody>
</table>
<?php include('footer.php'); ?>