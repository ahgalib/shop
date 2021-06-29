<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/categoryclass.php"; ?>
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
						$cate_obj = new Category();
						$showCate = $cate_obj->selectQ();
						if($showCate){
							$i= 0;
							while($row = $showCate->fetch_assoc()){
								$i++;
						 ?>
						

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['category_name']; ?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
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

