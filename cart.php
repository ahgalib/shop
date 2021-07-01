<?php include "inc/header.php"; ?>
<?php 
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$delC = $obj_cart->deleteC($delid);
}
 ?>
 <?php 
 //for refresh page
 if(!isset($_GET['id'])){
 	echo "<meta http-equiv='refresh' content='0; URL=?id=live'/>";
 }
  ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
		    	<h2>Your Cart</h2>
		    	<table class="tblone">
					<tr>
						<th width="5%">SI</th>
						<th width="15%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
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
						<td><img src="admin/<?php echo $row['image']; ?>" alt=""/></td>
						<td><?php echo $row['pro_price']; ?></td>
						<!--UPDATE Cart -->
						<?php 
						if(isset($_POST['submit'])){
							$cid = $_POST['cartId'];
							$quan = $_POST['quantity'];
							$upQan = $obj_cart->updateQ($cid,$quan);
							
							if($quan <=0){
								$delC = $obj_cart->deleteC($cid);
							}
						}
						 ?>
						
						<td>
							<form action="" method="post">
								<input type="hidden" name="cartId" value="<?php echo $row['cart_id']; ?>"/>
								<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"/>
								<input type="submit" name="submit" value="Update"/>
							</form>
						</td>
						<td>
							<?php
							$totalp = $row['pro_price'] * $row['quantity']; 
							echo $totalp." TK";
							?>
							
						</td>
						
						<td><a onclick='return confirm("DO you delete this product?!")' href="?delid=<?php echo $row['cart_id']; ?>">X</a></td>
					</tr>
					<?php 
					$sum = $sum + $totalp;
					Session::set("sum",$sum);

					 ?>
					<?php }} ?>
				</table>
					
				<?php 
					$chkCE = $obj_cart->cce();
					if($chkCE){
				 ?>
					<table style="float:right;text-align:left;" width="40%">
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
				<?php }else{
					header("Location:index.php");
				} ?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
    	</div>  	
      	<div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>