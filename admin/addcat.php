﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include ("../classes/categoryclass.php");
    $obj_cate = new category();
    if(isset($_POST['submit'])){
        $cat = $_POST['category'];
        $call_cate = $obj_cate->insertCat($cat);
    }
  
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                 
                    <?php 
                        if(isset($call_cate)){
                            echo $call_cate;
                        }
                     ?>
                            
                        <tr>
                            <td>
                                <input type="text" name="category" placeholder="Enter Category Name..." class="medium" />
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