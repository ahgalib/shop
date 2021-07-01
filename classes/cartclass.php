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

	public function orderlist($sesid){
		$sesId = session_id();
		$sql = "SELECT * FROM admin_cart WHERE sess_id = '$sesId'";
		$query = $this->db->select($sql);
		if($query){
			while($row = $query->fetch_assoc()){
				$proID = $row['pro_id'];
				$proNm = $row['pro_name'];
				
				$proQuna = $row['quantity'];
				$proPrice = $row['pro_price'];
				$pro_img = $row['image'];

				$ord_ins = "INSERT INTO shop_order(cus_id,pro_id,pro_name,quantity,price,image)VALUES('$sesid','$proID','$proNm','$proQuna','$proPrice','$pro_img')";
				$ins = $this->db->insert($ord_ins);
			
			}
		}
	}

	public function showOrder($seId){
		$sql = "SELECT * FROM shop_order WHERE cus_id = '$seId'";
		$query = $this->db->select($sql);
		if($query){
			return $query;
		}else{
			echo "fail";
		}
	}

	public function showOrderadmin(){
		$sql = "SELECT * FROM shop_order";
		$query = $this->db->select($sql);
		if($query){
			return $query;
		}else{
			echo "fail";
		}
	}

	public function upsta($cid,$oderid){
		$sql = "UPDATE shop_order SET status = '1' WHERE cus_id = '$cid' AND or_id ='$oderid'";
		$show = $this->db->update($sql);
		if($show){
			$msg = "<span style='color:green'>Update successfull</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Update NOTT successfull</span>";
			return $msg;
		}
	}
}
  ?>
