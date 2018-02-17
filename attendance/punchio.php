<?php 
	include("db.php");
	include("header.php");
	$today = date("Y-m-d");
	$dateTime = date('Y-m-d g:i a');
	$time = date('H:i:s a');
	
	$query= mysql_query("SELECT * FROM `punchio` WHERE `empID` = '$empID' AND `date`='$today'");
	$row = mysql_fetch_object($query);
	
	if(isset($_POST['punchio'])){
		$comment = $_POST['comment'];
		
		if(isset($row->empID)){
			if($row->in && $row->out){
				
			
			}else if($row->in){
				
				mysql_query("UPDATE `punchio` SET `out`='$time' , `outcomment` = '$comment' WHERE `empID` = '$empID' AND `date`='$today'");
			
			}
			
		}else{
				
			mysql_query("INSERT INTO `punchio` (`empID`, `date`, `in`, `incomment`, `out`, `outcomment`) VALUES ('$empID', '$today', '$time', '$comment', '', '');");
		
		}
		
	}
	
	$query= mysql_query("SELECT * FROM `punchio` WHERE `empID` = '$empID' AND `date`='$today'"); 
	$row = mysql_fetch_object($query);	
	
?>
<center>
	
	<?php 
		if(isset($row->empID)){
			if($row->in && $row->out){
				$head = '';	
			}else if($row->in){
				$head = 'Punch OUT';
			}else{	
				$head = 'Punch IN';
			}
		}else{	
			$head = 'Punch IN';
		}
	if($head){
	?>
	<h2> <?php echo $head; ?></h2>
	<form method="post" action="">
		<table cellpadding="5">
			<tr>
				<td valign="top"><b>Now: </b>:</td>
				<td><?php echo $dateTime; ?></td>
			</tr>
			<tr>
				<td valign="top">Comment:</td>
				<td>
					<textarea name="comment" rows="5" cols="30"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="punchio" value="<?php echo $head; ?>" /></td>
			</tr>
		</table>
		
	</form>
</center>
<?php 
	}else{
		echo '<h2> You Already Punched OUT</h2>';
	}
	include("footer.php");
?>