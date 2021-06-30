<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/categoryclass.php'; ?>
<?php include_once '../classes/brandclass.php'; ?>
<?php include_once '../classes/productclass.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  
        <?php 
        $obj_pro = new product();
        if(isset($_POST['submit'])){
        	$p_id = $_GET['pro_id'];
            $show_pro = $obj_pro->updatePro($_POST,$_FILES,$p_id);
        }
         ?>

         <?php  
            if(isset($show_pro)){
                echo $show_pro;
            }

          ?>     
          <?php 
          	if(isset($_GET['pro_id'])){
          		$p_id = $_GET['pro_id'];
          		$sel_pro = $obj_pro->selectProId($p_id);
          		if($sel_pro){
          			while($select =$sel_pro->fetch_assoc()){
                  ?>    

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name = "name" value="<?php echo $select['pro_name'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select Category</option>
                            <?php 
                            $cat_obj = new category();
                            $cat_show = $cat_obj->selectQ();
                            if($cat_show){
                                while($row = $cat_show->fetch_assoc()){
                            
                             ?>
                            <option 
                            <?php 
                            if($select['cat_id'] == $row['id']){
                            	echo "selected = 'selected'";
                            }
                             ?>
                            
                            value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                           <?php }} ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php 
                            $obj_brand = new brand();
                            $show_brand = $obj_brand->selctBrand();
                            if($show_brand){
                                while($row2 = $show_brand->fetch_assoc()){
                              ?>

                             ?>
                            <option 
                            <?php 
                            if($select['brand_id'] == $row2['brand_id']){
                            	echo "selected='selected'";
                            }
                             ?>
                            
                            value="<?php echo $row2['brand_id']; ?>"><?php echo $row2['brand_name']; ?></option>
                        <?php }} ?>
                        </select>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="description">
                        	<?php echo $select['description']; ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $select['price']; ?>" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img style="width:100px;height:70px;"src="<?php echo $select['image']; ?>">
                    	<br>
                        <input type="file" name="img"/>
                        <input type="hidden" name="old-img" value="<?php echo $select['image']; ?>">
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="fetype">
                            <option>Select Type</option>
                            <?php 
                            if($select['type'] == 0){?>
                              <option selected="selected" value="0">Featured</option>
                              <option value="1">General</option>
                           <?php }else{ ?>
                            <option  value="0">Featured</option>
                            <option selected = "selected" value="1">General</option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }}} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>