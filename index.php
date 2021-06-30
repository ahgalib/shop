<?php include "inc/header.php" ?>
<?php include "inc/slider.php"; ?>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
	    	<?php 
	    	$getFp = $obj_pro->selectfp();
	    	if($getFp){
	    		while($row = $getFp->fetch_assoc()){
	    	 ?>
	    		<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?pid=<?php echo $row['pro_id']; ?>"><img src="admin/<?php echo $row['image']; ?>" alt="" /></a>
					 <h2><?php echo $row['pro_name']; ?></h2>
					 <p><?php echo substr($row['description'],0,26); ?></p>
					 <p><span class="price"><?php echo $row['price']; ?></span></p>
				     <div class="button"><span><a href="preview.php?pid=<?php echo $row['pro_id']; ?>" class="details">Details</a></span></div>
				</div>
			<?php }} ?>
		</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
			$selNP = $obj_pro->selNewp();
			if($selNP){
				while($row2 = $selNP->fetch_assoc()){
			 ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?pid=<?php echo $row2['pro_id']; ?>"><img src="admin/<?php echo $row2['image']; ?>" alt="" /></a>
					 <h2><?php echo $row2['pro_name']; ?> </h2>
					 <p><span class="price"><?php echo $row2['price']; ?></span></p>
				     <div class="button"><span><a href="preview.php?pid=<?php echo $row2['pro_id']; ?>" class="details">Details</a></span></div>
				</div>
			<?php }} ?>
		</div>
	</div>
</div>
</div>
 <?php include "inc/footer.php" ?>

