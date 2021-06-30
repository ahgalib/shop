<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/productclass.php';
    
	$obj_pro = new product();
	
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Category</th>
					<th>Product Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Product type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sel_obj = $obj_pro->selectPro();
				if($sel_obj){
					while($row = $sel_obj->fetch_assoc()){
				 ?>
				
				<tr class="odd gradeX">
					<td><?php echo $row['pro_id']; ?></td>
					<td><?php echo $row['pro_name']; ?></td>
					<td><?php echo $row['category_name']; ?></td>
					<td><?php echo $row['brand_name']; ?></td>
					<td><?php echo substr($row['description'],0,20)."...."; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><img style="width:50px;height:40px;" src="<?php echo $row['image']; ?>"></td>
					<td>
						<?php 
							if($row['type'] == 1){
								echo "Featured";
							}else if($row['type'] == 2){
								echo "General";
							}
						?>
						
					</td>
					<td><a href="editpro.php?pro_id=<?php echo $row['pro_id']; ?>">Edit</a> || <a href="delpro.php?pro_id=<?php echo $row['pro_id']; ?>">Delete</a></td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
