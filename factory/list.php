<?php 
	@session_start();
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
	include('header.php'); 
?>
<h2 align="center">List of Applicant</h2>
<table class="list" cellspacing="0" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
			<th align="left">Gender</th>
			<th align="left">Position</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$sql="SELECT * FROM `employee` ORDER BY name ASC";
	$query = mysql_query($sql);
	
	while($row = mysql_fetch_object($query)){
		
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
		
		echo '<tr bgcolor="'.$bgcolor.'">
				<td>'.$row->empID.'</td>
				<td>'.$row->name.'</td>
				<td>'.$row->gender.'</td>
				<td>'.$row->position.'</td>
				<td><a href="update.php?empID='.$row->empID .'">Update</a> | <a href="delete.php?empID='.$row->empID .'">Delete</a> </td>
			</tr>';
			
		$i++;
	}
	
	?>
	</tbody>
</table>
<?php include('footer.php'); ?>