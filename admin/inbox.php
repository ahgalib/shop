<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include_once '../classes/cartclass.php';
$obj_cart = new cart();
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Product</th>
					<th>Customer ID</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Image</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			//update status
			if(isset($_GET['cid'])){
				$cid = $_GET['cid'];
				$oderid = $_GET['orid'];
				$shift = $obj_cart->upsta($cid,$oderid);

			}
			if(isset($shift)){
				echo $shift;
			}
			 ?>
			<?php 
			$selc = $obj_cart->showOrderadmin();
				if($selc){
					$i = 0;
				while($row = $selc->fetch_assoc()){
						$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $row['pro_name']; ?></td>
					<td><?php echo $row['cus_id']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><img style="width:70px;height:40px;"src="<?php echo $row['image']; ?>"></td>
					<td><?php echo $row['dateee']; ?></td>
					<td>
						<?php 
						if($row['status'] == 0){
						 ?>
							<a href="?cid=<?php echo $row['cus_id']; ?>& orid=<?php echo $row['or_id']; ?>">click to sell</a>
						<?php }else{
							echo "soild";
						} ?>
					</td>
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
