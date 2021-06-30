<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include ("../classes/brandclass.php");
    $obj_brand = new brand();
    if(isset($_POST['submit'])){
        $brand_n = $_POST['brand'];
        $call_brand = $obj_brand->insertBrand($brand_n);
    }
  
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                 
                    <?php 
                        if(isset($call_brand)){
                            echo $call_brand;
                        }
                     ?>
               				
                        <tr>
                            <td>
                                <input type="text" name="brand" placeholder="Enter brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>