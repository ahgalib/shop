<?php 
$file_path = realpath(dirname(__FILE__));
include_once $file_path."/../lib/database.php";
 ?>
 <?php 
class cart{
	public $db="";
	public function __construct(){
		$this->db = new database();
	}

	public function insertC($id,$quantity){
		$product_id = mysqli_real_escape_string($this->db->link,$id);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$sqlP = "SELECT * FROM admin_product WHERE pro_id = '$id'";
		$ses_id = session_id();
		$result = $this->db->select($sqlP)->fetch_assoc();

		$product_name = $result['pro_name'];
		$product_price = $result['price'];
		$product_image = $result['image'];

		$checkPro = "SELECT * FROM admin_cart WHERE pro_id = '$product_id' AND sess_id = '$ses_id'";
		$query = $this->db->select($checkPro);
		if($query){
			$pro_message = "THIS PRODUCT IS ALREADY SELLECTED";
			return $pro_message;
		}else{
			$cartInsert = "INSERT INTO admin_cart(sess_id,pro_id,pro_name,pro_price,quantity,image) VALUES ('$ses_id','$product_id','$product_name','$product_price','$quantity','$product_image')";
			$cartIn = $this->db->insert($cartInsert);
			if($cartIn){
				header("Location:cart.php");
			}else{
				echo "fail";
			}
		}
	}

	public function selcart(){
		$sesId = session_id();
		$sql = "SELECT * FROM admin_cart WHERE sess_id = '$sesId'";
		$query = $this->db->select($sql);
		if($query){
			return $query;
		}else{
			return false;
		}
	}

	public function updateQ($cid,$quan){
		$sql = "UPDATE admin_cart SET quantity = '$quan' WHERE cart_id = '$cid'";
		$upC = $this->db->update($sql);
		if($upC){
			header("Location:cart.php");
		}else{
			return false;
		}
	}

	public function deleteC($delid){
		$sql = "DELETE FROM admin_cart WHERE cart_id = '$delid'";
		$delC = $this->db->delete($sql);
		if($delC){
			header("Location:cart.php");
		}else{
			return false;
		}
	}

	public function cce(){
		$sesId = session_id();
		$sql = "SELECT * FROM admin_cart WHERE sess_id = '$sesId'";
		$query = $this->db->select($sql);
		return $query;
	}
}
  ?>
