<?php include "inc/header.php" ?>
<?php 
	$login = session::get("cuslog");
	if($login == false){
		header("Location:login.php");
	}
 ?>
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 <style>
 	.custbl{}
 	.tblone{border:3px solid black;}
 
 	.tbl2{float:right;text-align:left;margin-bottom:30px;border:1px solid black;}
 </style>

 <?php 
 	if(isset($_GET['order']) && $_GET['order'] == 'orid'){
 		$sesid = session::get("cusId");
 		$order = $obj_cart->orderlist($sesid);
 		$delProForLogout = $obj_customer->deleteCart();
 		header("Location:success.php");
 	}
  ?>
<div class="container">
   <div class="row">
    	<div class="col-md-6">
    		<div class="btlone">
    			<table class="tblone">
					<tr>
						<th width="5%">SI</th>
						<th width="15%">Product Name</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
					</tr>
					<?php 
	    			$selc = $obj_cart->selcart();
	    				if($selc){
	    					$i = 0;
	    					$sum = 0;
	    				while($row = $selc->fetch_assoc()){
	    						$i++;
	    				 ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['pro_name']; ?></td>
						
						<td><?php echo $row['pro_price']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<!--UPDATE Cart -->
						<td>
							<?php
							$totalp = $row['pro_price'] * $row['quantity']; 
							echo $totalp." TK";
							?>
						</td>
					</tr>
					<?php 
					$sum = $sum + $totalp;
					session::set("sum",$sum);
					 ?>
					<?php }} ?>
				</table>
				<?php 
					$chkCE = $obj_cart->cce();
					if($chkCE){
				 ?>
					<table class="tbl2" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td>TK. <?php echo $sum; ?></td>
						</tr>
						<tr>
							<th>VAT : </th>
							<td>10%</td>
						</tr>
						<tr>
							<th>Grand Total :</th>
							<td>
								<?php 
								$vat = $sum * 0.1;
								$gtotal =$sum + $vat;
								echo "TK ".$gtotal;

								 ?>
							</td>
						</tr>
				   </table>
				<?php } ?>
    		</div>
		</div>
		<div class="col-md-6">
			<div class="custbl">
				<h2>Your Information</h2>
				<table class="tblone">
					
					<?php 
					$ses_id = session::get("cusId");
					$cus = $obj_customer->selCus($ses_id);
					if($cus){
						while($row=$cus->fetch_assoc()){
					 ?>
					
						<tr>
							<td>Name<td>
							<td>:</td>
							<td><?php echo $row['cus_name'];?></td>
						</tr>
						<tr>
							<td>City<td>
							<td>:</td>
							<td><?php echo $row['cus_city'];?></td>
						</tr>
						<tr>
							<td>Zip-Code<td>
							<td>:</td>
							<td><?php echo $row['cus_zip'];?></td>
						</tr>
						<tr>
							<td>Email<td>
							<td>:</td>
							<td><?php echo $row['cus_email'];?></td>
						</tr>
						<tr>
							<td>Address<td>
							<td>:</td>
							<td><?php echo $row['cus_address'];?></td>
						</tr>
						<tr>
							<td>Country<td>
							<td>:</td>
							<td><?php echo $row['cus_country'];?></td>
						</tr>
						<tr>
							<td>Phone<td>
							<td>:</td>
							<td><?php echo $row['cus_phone'];?></td>
						</tr>
						
				<?php }} ?>
	    				
	    		</table>
			</div>
		</div>
    </div>
  	<button style="color:green;background: chartreuse;font-size: 34px;padding: 3px 40px;margin-top: 40px;margin-left: 350px;border: 2px solid green; border-radius: 9px; margin-bottom: 30px;"><a style="text-decoration: none;" href="?order=orid">Order</a></button>
 </div>
	


 <?php include "inc/footer.php" ?>