<?php include "inc/header.php"; ?>

 <?php 
	if(isset($_GET['pid'])){
		$id = $_GET['pid'];
	}
 ?>

 <?php 
 	if(isset($_POST['submit'])){
 		$id = $_GET['pid'];
 		$quantity = $_POST['quantity'];
 		$cart = $obj_cart->insertC($id,$quantity);
 	}
 
  ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		
		    	$selASingleP = $obj_pro->showASP($id);
		    	if($selASingleP){
		    		while($row = $selASingleP->fetch_assoc()){
		    	 ?>

			<div class="cont-desc span_1_of_2">				
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $row['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $row['pro_name']; ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>Price: <span><?php echo $row['price']; ?></span></p>
						<p>Category: <span><?php echo $row['category_name']; ?></span></p>
						<p>Brand:<span><?php echo $row['brand_name']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>	
						<span style="color:red;font-size: 20px;">
							<?php 
							if(isset($cart)){
								echo $cart;
							} 
							?>
						</span>			
					</div>
				</div>
			<div class="product-desc">
				<h2>Product Details</h2>
				<p><?php echo $row['description']; ?></p>
	   	 	</div>
		</div>
	<?php }} ?>
		<div class="rightsidebar span_3_of_1">
			<h2>CATEGORIES</h2>
			<ul>
				<?php 
			$showCat = $obj_category->selCat();
			if($showCat){
				while($row = $showCat->fetch_assoc()){
			 ?>
		      <li><a href="productbycat.php?catId=<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
		     
			<?php }} ?>
			</ul>

			</div>
 		</div>
 	</div>
</div>
  <?php include "inc/footer.php"; ?>
