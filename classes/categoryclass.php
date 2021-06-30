<?php 
$file_path = realpath(dirname(__FILE__));
include_once $file_path."/../lib/database.php";
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

	public function updataCat($id,$cat){
		$category = mysqli_real_escape_string($this->db->link,$cat);
		if($category == ""){
			$cat_msg = "<span style='color:red;font-size: 20px;'>write a category name</span>";
			return $cat_msg;
		}else{
			$sql = "UPDATE admin_category SET category_name = '$cat' WHERE id='$id'";
			$update_row = $this->db->update($sql);
			if($update_row){
				$msg_cate = "<span style='color:green;font-size: 20px;'>update category successfull</span>";
				echo "<script>window.location='catlist.php'</script>";
			}
		}
	}

	public function  selectWhere($id){
		$sql = "SELECT * FROM admin_category WHERE id='$id'";
		$sel_row = $this->db->select($sql);
		if($sel_row){
			return $sel_row;
		}
	}

	public function deletQ($del_id){
		$sql = "DELETE FROM admin_category WHERE id='$del_id'";
		$sel_row = $this->db->delete($sql);
		if($sel_row){
			return $sel_row;
		}
	}

	public function selCat(){
	$sql = "SELECT * FROM admin_category";
	$sel_row = $this->db->select($sql);
		if($sel_row){
			return $sel_row;
		}
	}


}
  ?>
