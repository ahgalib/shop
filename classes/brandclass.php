<?php 
$file_path = realpath(dirname(__FILE__));
include_once $file_path."/../lib/database.php";
 ?>
<?php 
class brand{
	public $obj_db;
	public function __construct(){
		$this->obj_db = new database();

	}

	public function selctBrand(){
		$sql = "SELECT * FROM admin_brand";
		$query = $this->obj_db->select($sql);
		if($query){
			return $query;
		}else{
			return false;
		}
	}

	public function insertBrand($brand_n){
		$brand_name = mysqli_real_escape_string($this->obj_db->link,$brand_n);
		if(empty($brand_name)){
			$brand_msg = "<span style='color:red;font-size:20px;'>please enter a brand name</span>";
			return $brand_msg;
		}else{
			$sql = "INSERT INTO admin_brand (brand_name) VALUES ('$brand_name')";
			$query = $this->obj_db->insert($sql);
			if($query){
				echo "<script>window.location='brandlist.php'</script>";
			}else{
				echo "fail";
			}
		}
	}

	public function updataBrand($id,$brand){
		$brand_name = mysqli_real_escape_string($this->obj_db->link,$brand);
		if($brand_name == ""){
			$brd_msg = "<span style='color:red;font-size: 20px;'>write a brand name</span>";
			return $brd_msg;
		}else{
			$sql = "UPDATE admin_brand SET brand_name = '$brand_name' WHERE brand_id='$id'";
			$update_row = $this->obj_db->update($sql);
			if($update_row){
				$msg_brd = "<span style='color:green;font-size: 20px;'>update category successfull</span>";
				echo "<script>window.location='brandlist.php'</script>";
			}
		}
	}

	public function  selectWhere($id){
	$sql = "SELECT * FROM admin_brand WHERE brand_id='$id'";
	$sel_row = $this->obj_db->select($sql);
		if($sel_row){
			return $sel_row;
		}
	}

	public function deletQ($del_id){
	$sql = "DELETE FROM admin_brand WHERE brand_id='$del_id'";
	$sel_row = $this->obj_db->delete($sql);
		if($sel_row){
			return $sel_row;
		}
	}
}
 ?>
