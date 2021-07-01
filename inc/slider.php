<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<?php 
			$showProIphn = $obj_pro->selProIphone();
			if($showProIphn){
				while($row = $showProIphn->fetch_assoc()){
			 ?>
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					 <a href="preview.php?pid=<?php echo $row['pro_id']; ?>"> <img src="admin/<?php echo $row['image'] ?>" alt="" /></a>
				</div>
			    <div class="text list_2_of_1">
					<h2><?php echo $row['brand_name']; ?></h2>
					<p><?php echo substr($row['description'],0,30)."..."; ?></p>
					<div class="button"><span><a href="preview.php?pid=<?php echo $row['pro_id']; ?>">Add to cart</a></span></div>
			   </div>
		   </div>	
		   <?php }} ?>	

			<?php 
			$showProIphn = $obj_pro->selProSamsung();
			if($showProIphn){
				while($row = $showProIphn->fetch_assoc()){
			 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?pid=<?php echo $row['pro_id']; ?>"> <img src="admin/<?php echo $row['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $row['brand_name']; ?></h2>
						<p><?php echo substr($row['description'],0,30)."..."; ?></p>
						<div class="button"><span><a href="preview.php?pid=<?php echo $row['pro_id']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
		   <?php }} ?>	
		</div>

		<div class="section group">
			<?php 
			$showProIphn = $obj_pro->selProCanon();
			if($showProIphn){
				while($row = $showProIphn->fetch_assoc()){
			 ?>
				<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					 <a href="preview.php?pid=<?php echo $row['pro_id']; ?>"> <img src="admin/<?php echo $row['image'] ?>" alt="" /></a>
				</div>
			    <div class="text list_2_of_1">
					<h2><?php echo $row['brand_name']; ?></h2>
					<p><?php echo substr($row['description'],0,30)."..."; ?></p>
					<div class="button"><span><a href="preview.php?pid=<?php echo $row['pro_id']; ?>">Add to cart</a></span></div>
			   </div>
		   </div>	
		   <?php }} ?>	

			<?php 
			$showProIphn = $obj_pro->selProSony();
			if($showProIphn){
				while($row = $showProIphn->fetch_assoc()){
			 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?pid=<?php echo $row['pro_id']; ?>"> <img src="admin/<?php echo $row['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $row['brand_name']; ?></h2>
						<p><?php echo substr($row['description'],0,30)."..."; ?></p>
						<div class="button"><span><a href="preview.php?pid=<?php echo $row['pro_id']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
		   <?php }} ?>	
		</div>
	  	<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
   <!-- FlexSlider -->
     
		<section class="slider">
			  <div class="flexslider">
				<ul class="slides">
					<li><img src="images/1.jpg" alt=""/></li>
					<li><img src="images/2.jpg" alt=""/></li>
					<li><img src="images/3.jpg" alt=""/></li>
					<li><img src="images/4.jpg" alt=""/></li>
			    </ul>
			  </div>
	  </section>
<!-- FlexSlider -->
	</div>
 	<div class="clear"></div>
</div>