<?php 
include "../lib/database.php";
 ?>
 <?php 
class Category{
public $db;
	public function __construct(){
		$this->db = new database();
	}

	public function insertCat($cat){
		$category = mysqli_real_escape_string($this->db->link,$cat);
		if($category ==""){
			$cat_msg = "<span style='color:red;font-size: 20px;'>write a category name</span>";
			return $cat_msg;
		}else{
			$sql = "INSERT INTO admin_category(category_name) VALUES ('$category')";
			$query = $this->db->insert($sql);
			if($query){
				$cat_msg = "<span style='color:green;font-size: 20px;'>category addded successfully </span>";
				return $cat_msg;
			}else{
				echo "unsuccess";
			}
		}
	}

	public function selectQ(){
		$sql = "SELECT * FROM admin_category";
		$sel_row = $this->db->select($sql);
		if($sel_row){
			return $sel_row;
		}
	}

}
  ?>
