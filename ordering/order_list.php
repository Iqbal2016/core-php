<?php 
	include('header.php');
	include('db.php'); 
	$action = '';
	$order_id = '';
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	} 
	if(isset($_GET['order_id'])){
		$order_id = $_GET['order_id'];
	}
	if($order_id && ($action == 'delivered' || $action == 'cancelled')){
		mysql_query("UPDATE `order` SET status='$action' WHERE order_id = '$order_id'");
	}
	
?>
<h2 align="center">Available Food Items</h2>
<table width="100%" class="list" cellspacing="0" cellpadding="5" border="0">
	<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Customer</th>
			<th align="left">Quantity</th>
			<th align="right">Total</th>
			<th align="left">Status</th>
			<th align="left">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	
	$result = mysql_query("SELECT * FROM `order` as o LEFT JOIN `customer` as c ON o.cid = c.cid ORDER BY date DESC");
	$i = 1;
	
	while($row2 = mysql_fetch_object($result)){
		
		$tqty = 0;
		$total = 0;
		$query = mysql_query("SELECT * FROM `order_items` as oi LEFT JOIN `food` as fi ON oi.food_id = fi.food_id WHERE oi.order_id = '$row2->order_id'");
		while($item = mysql_fetch_object($query)){
			$tqty = $item->quantity;
			$tprice = $item->quantity * $item->price ;
			$total = $total + $tprice;
		}
		
		$act = '';
		if($row2->status == 'pending'){
			$act = '<a href="order_list.php?action=delivered&order_id='.$row2->order_id.'">Delivered</a> | <a href="order_list.php?action=cancelled&order_id='.$row2->order_id.'">Cancel</a>';
		}
		if($row2->status == 'delivered'){
			$act = '<a href="order_detail.php?action=delivered&order_id='.$row2->order_id.'">Invoice</a>';
		}
		$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF'; 
		echo '<tr bgcolor="'.$bgcolor.'">
				<td>'.$row2->order_id.'</td>
				<td>'.$row2->name.'</td>
				<td>'.$tqty.'</td>
				<td align="right">'.number_format($total,2).'</td>
				<td>'.ucfirst($row2->status).'</td>
				<td>'.$act.'</td>
			</tr>';
		$i++;
	}
	?>
	</tbody>
</table>
<?php include('footer.php'); ?>