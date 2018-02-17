<?php 
	include('header.php');
	include('db.php'); 
?>
<h2 align="center">Available Customer</h2>
<table width="100%" class="list" cellspacing="0" cellpadding="5" border="0">
	<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
			<th align="left">Phone</th>
			<th align="left">Address</th>
			<th align="left">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$query = mysql_query("SELECT * FROM `customer` ORDER BY name ASC ");
	
	$i = 1;
	while($row2 = mysql_fetch_object($query)){
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
            
		echo '<tr bgcolor="'.$bgcolor.'">
				<td>'.$row2->cid.'</td>
				<td>'.$row2->name.'</td>
				<td>'.$row2->phone.'</td>
				<td>'.$row2->address.'</td>
				<td><a href="customer_edit.php?cid='.$row2->cid.'">Edit</a> | <a href="customer_delete.php?cid='.$row2->cid.'">Delete</a></td>
			</tr>';
		$i++;
	}
	?>
	</tbody>
</table>
<?php include('footer.php'); ?>