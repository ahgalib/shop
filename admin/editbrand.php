<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include ("../classes/brandclass.php");
    $obj_brand = new brand();
   if(isset($_POST['submit'])){
    	$id = $_GET['brand_id'];
        $brand = $_POST['brand'];
        $call_brand = $obj_brand->updataBrand($id,$brand);
    }
  
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update brand</h2>
        <div class="block copyblock"> 
            <form action="" method="post">
                <table class="form">
                 <?php 
                    if(isset($call_brand)){
                        echo $call_brand;
                    }
                 ?>
                 <?php 
                 	$id = $_GET['brand_id'];
                 	$brand_show = $obj_brand->selectWhere($id);
                 	if($brand_show){
                 		while($row = $brand_show->fetch_assoc()){
                ?>
           			<tr>
                        <td>
                            <input type="text" name="brand" value="<?php echo $row['brand_name']; ?>"placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
    				<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                <?php }} ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>