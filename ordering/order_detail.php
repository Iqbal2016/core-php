<?php
include('db.php');
include('header.php');

$order_id = '';
if(isset($_GET['order_id'])) $order_id = addslashes($_GET['order_id']);

$result = mysql_query("SELECT * FROM `order` WHERE order_id='$order_id'");
$order = mysql_fetch_object($result);

if(isset($order->order_id)){

	$cname = '';
	$cphone = '';
	$caddress = '';
	$query = mysql_query("SELECT * FROM `customer` WHERE cid='$order->cid'");
	$cust = mysql_fetch_object($query);
	
	if(isset($cust->cid)){
		$cname = $cust->name;
		$cphone = $cust->phone;
		$caddress = $cust->address;
	}
	
	?>
	<h2 align="center">Invoice</h2>
	<table width="100%">
		<tr>
			
			<td>
				<b>Customer Information:</b><br/>
				<?php echo $cname; ?><br/>
				<?php echo $cphone; ?><br/>
				<?php echo $caddress; ?><br/>
			</td>
			
			<td>
				<b>Order Information:</b><br/>
				Order No: <?php echo $order->order_id; ?><br/>
				Date: <?php echo $order->date; ?><br/>
			</td>
			
		</tr>
	</table>
	<br/>
	<table width="100%">
		<thead>
			<tr>
				<th align="left">S.I</th>
				<th align="left">Item</th>
				<th align="left">Code</th>
				<th align="left">Quantity</th>
				<th align="right">Price</th>
				<th align="right">Sub Total</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 
			$query = mysql_query("SELECT * FROM `order_items` as oi LEFT JOIN `food` as fi ON oi.food_id = fi.food_id WHERE oi.order_id='$order_id'");
			$total = 0;
			$i = 1;
			
			while($row = mysql_fetch_object($query)){
				
				$tprice = $row->quantity * $row->price ;
				$total = $total + $tprice;
				$bgcolor = ($i%2 == 0)?'#EAEAEA':'#FFFFFF';
				
				echo '<tr bgcolor="'.$bgcolor.'">
						<td>'.$i.'</td>
						<td>'.$row->food_name.'</td>
						<td>'.$row->food_code.'</td>
						<td>'.$row->quantity.'</td>
						<td align="right">'.$row->price.'</td>
						<td align="right">'.number_format($tprice,2).'</td>
					</tr>';
				$i++;
			}
			
			$discount = 0;
			if($total > 2000){
				$discount = $total * 0.05;
			}
			$gtotal = $total - $discount;
			$bgcolor = ($i%2 == 0)?'#F5F5F5':'#FFFFFF';
			?>
			
			<tr bgcolor="<?php echo $bgcolor; ?>">
				<td align="right" colspan="5"><b>Total Price:</b></td>
				<td align="right"><?php echo number_format($total,2); ?></td>
			</tr>
			
			<tr>
				<td align="right" colspan="5"><b>Discount:</b></td>
				<td align="right"><?php echo number_format($discount,2); ?></td>
			</tr>
			
			<tr>
				<td align="right" colspan="5"><b>Total:</b></td>
				<td align="right"><?php echo number_format($gtotal,2); ?></td>
			</tr>
			
		</tbody>
	</table>
	<br/>
	<?php
}else{

	echo "Order not found!";
	
}

include('footer.php');
?>