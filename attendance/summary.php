<?php 
	@session_start();
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
	$title = 'Attendance Summary'; 
	include('db.php'); 
	include('header.php'); 
?>
<h2 align="center">Attendance Summary</h2>
<table class="list" cellspacing="0" cellpadding="5" border="1">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Date</th>
			<th>Punch IN</th>
			<th>IN Comment</th>
			<th>Punch OUT</th>
			<th>OUT Comment</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$month = date('m');
	$year = date('Y');
	$start = '09:05:00';
	$end = '17:00:00';
	
	$sql="SELECT * FROM `office_date` WHERE year='$year' AND month = '$month' ORDER BY odate DESC ";
	$query = mysql_query($sql);
	
	$i = 1;
	while($row2 = mysql_fetch_object($query)){
		
		$sql=mysql_query("SELECT * FROM  `punchio` WHERE empID='$empID' AND date = '$row2->odate'");
		$row = mysql_fetch_object($sql);
		
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
		
		if(isset($row->date)){
			$status =  '';
			$start_time = strtotime($row->date .' '.$start);
			$end_time = strtotime($row->date .' '.$end);
			
			$in_time = strtotime($row->date .' '.$row->in);
			$out_time = strtotime($row->date .' '.$row->out);

			
			if($row->in == ''){
			
				$status = '<font color="red">Absent</font>';
				
			}else if($in_time >= $start_time){
				
				$status = '<font color="orange">Late</font>';
				
			}else if($out_time <= $end_time){
				
				$status = '<font color="gray">Before Time</font>';
				
			}else if($in_time <= $start_time && $out_time >= $end_time){
				$status = '<font color="green">Timely</font>';
			}else{
				$status = '<font color="green">Timely</font>';
			}
			echo '<tr bgcolor="'.$bgcolor.'">
					<td>&nbsp;'.$i.'</td>
					<td>&nbsp;'.$row2->odate.'</td>
					<td>&nbsp;'.$row->in.'</td>
					<td>&nbsp;'.$row->incomment.'</td>
					<td>&nbsp;'.$row->out.'</td>
					<td>&nbsp;'.$row->outcomment.'</td>
					<td>&nbsp;'.$status.'</td>
				</tr>';
		}else{
			echo '<tr bgcolor="'.$bgcolor.'">
						<td>&nbsp;'.$i.'</td>
						<td>&nbsp;'.$row2->odate.'</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><font color="red">Absent</font></td>
					</tr>';
		}
			
		$i++;
	}
	?>
	</tbody>
</table>
<br/>
<br/>
<?php include('footer.php'); ?>