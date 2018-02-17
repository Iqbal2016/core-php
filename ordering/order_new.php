<?php 
    include('db.php');
    $items='';
	$msg = '';
	$oc = 0;
	$date = date('Y-m-d');
	
	if(isset($_POST['newOrder'])){
		
		foreach($_POST['order'] as $item){
			if($item['food_id'] && $item['quantity']){
				$oc++;
			}
		}
		
		$cid = $_POST['cid'];
		$items=$_POST['items'];
		
		if(!$cid){
			$msg .= '<font color="red">Select Customer.</font><br/>';
		}
		
		if(!$oc){
			$msg .= '<font color="red">Enter order items.</font>';
		}
		
		if($oc && $cid){
			
			mysql_query("INSERT INTO `order` (`cid`, `status`, `quantity`, `amount`, `date`) VALUES ('$cid', 'pending', '0', '0', '$date');");
			$oid = mysql_insert_id();
			
			if($oid){
				
				foreach($_POST['order'] as $item){
					$itm = $item['food_id'];
					$qty = $item['quantity'];
					
					if($itm && $qty){
						mysql_query("INSERT INTO `order_items` (`order_id`, `food_id`, `quantity`) VALUES ('$oid', '$itm', '$qty');");
					}
				}
				
				header("Location: order_detail.php?order_id=$oid");
			}
		}
		
	}else if(isset($_POST['items']) && $_POST['items']){
        $items=$_POST['items'];
    }
	
    include('header.php');
?>
<div><?php echo $msg; ?></div>
<form method="post" action="">
	<table cellpadding="5">
		<?php if($items){ ?>
			
			<thead>
				<tr>
					<th>No</th>
					<th>Food Item</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="3">
					Customer: 
					<select name="cid">
						<option value=""> -- Select -- </option>
						<?php 
							$query = mysql_query("SELECT * FROM `customer` ORDER BY name ASC");
							while($row = mysql_fetch_object($query)){
								echo '<option value="'.$row->cid.'">'.$row->name.'</option>';
							}
						?>
					</select>
					</td>
				</tr>
			
				<?php 
				$query = mysql_query("SELECT * FROM `food` ORDER BY food_name ASC ");
				$food_list='<option value=""> -- Select -- </option>';
				while($row = mysql_fetch_object($query)){
					$food_list.='<option value="'.$row->food_id.'">'.$row->food_name.'</option>';
				}
				
				for($i=1;$i<=$items;$i++){
					echo '<tr>
							<td>'.$i.'</td>
							<td><select name="order['.$i.'][food_id]" >'.$food_list.'</select></td>
							<td><input type="text" name="order['.$i.'][quantity]" value="" /></td>
						</tr>';	
				}
			?>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="newOrder" value="Make Order" />
					<input type="hidden" name="items" value="<?php echo $items; ?>" />
				</td>
			</tr>
		</tbody>
		
		<?php }else{ ?>
		
			<tr>
				<td>Enter Number of Items :</td>
				<td><input type="text" name="items" value="<?php echo $items; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Go" /></td>
			</tr>
			
		<?php } ?>
		
	</table>
</form>

<?php
    include('footer.php');
?>