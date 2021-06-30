<?php include "../lib/database.php"; ?>
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
}
 ?>
