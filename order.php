<?php include "inc/header.php" ?>
<?php 
	$login = session::get("cuslog");
	if($login == false){
		header("Location:login.php");
	}
 ?>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<h1>your order product list</h1>
	   </div>
	   <div class="btlone">
			<table class="tblone">
				<tr>
					<th width="5%">SI</th>
					<th width="15%">Product Name</th>
					<th width="15%">Price</th>
					<th width="5%">Quantity</th>
					<th width="20%">Image</th>
					<th width="20%">Date</th>
					<th width="10%">Status</th>
					<th width="10%">Action</th>
				</tr>
				<?php 
					$seId = session::get("cusId");
	    			$selc = $obj_cart->showOrder($seId);
	    				if($selc){
	    					$i = 0;
	    				while($row = $selc->fetch_assoc()){
	    						$i++;
	    				 ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['pro_name']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><img style="width:70px;height:40px;"src="admin/<?php echo $row['image']; ?>"></td>
						<td><?php echo $row['dateee']; ?></td>
						<td>
							<?php 
							if($row['status'] == 0){
								echo "Panding";	
							}else{
								echo "Done";
							}
							 ?>
						</td>
						<td>N/A</td>
					</tr>
				<?php }} ?>
			</table>
 		</div>
	</div>
</div>
<?php include "inc/footer.php" ?>