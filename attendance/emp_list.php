<?php 
	include('header.php');
	include('db.php'); 
?>
<h2 align="center">Teacher List</h2>
<table width="100%" class="list" cellspacing="0" cellpadding="5" border="0">
	<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
			<th align="left">Designation</th>
			<th align="left">Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php 
	$query = mysql_query("SELECT * FROM `information` ORDER BY name ASC ");
	
	$i = 1;
	while($row2 = mysql_fetch_object($query)){
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
            
		echo '<tr bgcolor="'.$bgcolor.'">
				<td>'.$row2->empID.'</td>
				<td>'.$row2->name.'</td>
				<td>'.$row2->designation.'</td>
				<td><a href="emp_edit.php?empID='.$row2->empID.'">Edit</a> | <a href="emp_delete.php?empID='.$row2->empID.'">Delete</a></td>
			</tr>';
		$i++;
	}
	?>
	
	</tbody>
</table>
<?php include('footer.php'); ?>