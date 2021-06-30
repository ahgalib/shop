<?php include_once "../lib/database.php"; ?>

<?php 
class product{
	public $db;

	public function __construct(){
		$this->db = new database();
		//$this->fms - new forhelp();
	}

	public function insertPro($POST,$FILES){
		$pro_name = mysqli_real_escape_string($this->db->link,$POST['name']);
		$pro_cat = mysqli_real_escape_string($this->db->link,$POST['category']);
		$pro_brand = mysqli_real_escape_string($this->db->link,$POST['brand']);
		$pro_dec = mysqli_real_escape_string($this->db->link,$POST['description']);
		$pro_price = mysqli_real_escape_string($this->db->link,$POST['price']);
		$pro_type = mysqli_real_escape_string($this->db->link,$POST['fetype']);

		//image part
		$extension = array("jpg","jpeg","png");
		$file_name = $FILES['img']['name'];
		$file_type = $FILES['img']['type'];
		$file_size = $FILES['img']['size'];
		$file_tmp = $FILES['img']['tmp_name'];	
		$div = explode('.',$file_name);
		$file_ext = end($div);
		
		$unique_img = substr(md5(time()),0,10).".".$file_ext;
		$upload_img = "upload/".$unique_img;
		if($pro_name =="" || $pro_cat =="" || $pro_brand =="" || $pro_dec =="" || $pro_price =="" || $file_name == "" ||$pro_type ==""){
			$pro_msg = "<span style='color:red;font-size:20px;'>field must not be empty</span>";
			return $pro_msg;

			//img validation
			if(empty($file_name)){
				$pro_msg = "<span style='color:red;font-size:20px;'>field must not be empty</span>";
				return $pro_msg;
			}
			elseif($file_size>1048567){
				$pro_msg = "<span style='color:red;font-size:20px;'>please select a picture</span>";
				return $pro_msg;
			}
			elseif(in_array($file_ext,$extension) == false){
				$pro_msg = "<span style='color:red;font-size:20px;'>Select a picture less than 2mb</span>";
				return $pro_msg;
			}
		}else{
			move_uploaded_file($file_tmp,$upload_img);
			$query = "INSERT INTO admin_product(pro_name,cat_id,brand_id,description,price,image,type) VALUES ('$pro_name','$pro_cat','$pro_brand','$pro_dec','$pro_price','$upload_img','$pro_type')";
			$insert_pro = $this->db->insert($query);
			if($insert_pro){
				echo "<script>window.location='productlist.php'</script>";
			}else{
				$pro_msg = "<span style='color:red;font-size:20px;'>field must not be empty</span>";
				return $pro_msg;
			}
		}

	}

	public function selectPro(){
		$sql = "SELECT admin_product.*,admin_category.category_name,admin_brand.brand_name FROM admin_product 
				INNER JOIN admin_category ON admin_product.cat_id = admin_category.id
				INNER JOIN admin_brand ON admin_product.brand_id = admin_brand.brand_id";
		$select_row = $this->db->select($sql);
		if($select_row){
			return $select_row;
		}else{
			return false;
		}
	}
}
?>
	

