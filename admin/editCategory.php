<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include ("../classes/categoryclass.php");
    $obj_cate = new category();
    if(isset($_POST['submit'])){
    	$id = $_GET['cat_id'];
        $cat = $_POST['category'];
        $call_cate = $obj_cate->updataCat($id,$cat);
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Category</h2>
        
       <div class="block copyblock"> 
            <form action="" method="post">
                <table class="form">
                    <?php 
                        if(isset($call_cate)){
                            echo $call_cate;
                        }
                    ?>
                    <?php 
                     	$id = $_GET['cat_id'];
                     	$cat_show = $obj_cate->selectWhere($id);
                     	if($cat_show){
                     		while($row = $cat_show->fetch_assoc()){
                     	
                    ?>
               				
                        <tr>
                            <td>
                                <input type="text" name="category" value="<?php echo $row['category_name']; ?>"placeholder="Enter Category Name..." class="medium" />
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