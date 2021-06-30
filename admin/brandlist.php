<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	 include ("../classes/brandclass.php");
	$brand_obj = new brand();
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$new_brand = $brand_obj->selctBrand();
							if($new_brand){
								$i = 0;
								while($row = $new_brand->fetch_assoc()){
									$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['brand_name']; ?></td>
							<td><a href="editbrand.php?brand_id=<?php echo $row['brand_id']; ?>">Edit</a> || <a onclick="return confirm('are you sure to delete thsi')" href="delbrand.php?del_id=<?php echo $row['brand_id']; ?>">Delete</a></td>
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