<?php 
$file_path = realpath(dirname(__FILE__));
include_once($file_path."/../lib/database.php");
 ?>

 <?php 
class customer{
	public $db;
	public function __construct(){
		$this->db = new database();
	}

	public function customerInsert($POST){
		$name = mysqli_real_escape_string($this->db->link,$POST['name']);
		$city = mysqli_real_escape_string($this->db->link,$POST['city']);
		$zip = mysqli_real_escape_string($this->db->link,$POST['zipCode']);
		$email = mysqli_real_escape_string($this->db->link,$POST['email']);
		$address = mysqli_real_escape_string($this->db->link,$POST['address']);
		$country = mysqli_real_escape_string($this->db->link,$POST['country']);
		$phone = mysqli_real_escape_string($this->db->link,$POST['phone']);
		$password = mysqli_real_escape_string($this->db->link,$POST['password']);

		if($name == "" ||$city == "" ||$zip == "" ||$email == "" ||$address == "" ||$country == "" ||$phone == "" ||$password == ""){
			$cus_msg = "<span style='color:red;font-size:22px;'>please fill the form</span>";
			return $cus_msg;
		}
		$mailsql = "SELECT * FROM shop_customer WHERE cus_email = '$email'";
		$chkmail = $this->db->select($mailsql);
		if($chkmail != false){
			$cus_msg = "<span style='color:red;font-size:22px;'>This email is already exist!!</span>";
			return $cus_msg;
		}else{
			$sql = "INSERT INTO shop_customer(cus_name,cus_city,cus_zip,cus_email,cus_address,cus_country,cus_phone,cus_password) VALUES ('$name','$city','$zip','$email','$address','$country','$phone','$password')";
			$insert_row = $this->db->insert($sql);
			if($insert_row){
				$cus_msg = "<span style='color:green;font-size:22px;'>Form submit successfully</span>";
				return $cus_msg;
			}else{
				echo "fail";
			}
		}
	}

	public function customerChklog($POST){
		$email = mysqli_real_escape_string($this->db->link,$POST['email']);
		$password = mysqli_real_escape_string($this->db->link,$POST['password']);
		if($email == "" || $password == ""){
			$cus_msg = "<span style='color:red;font-size:22px;'>please fill the form</span>";
			return $cus_msg;
		}
		$sql = "SELECT * FROM shop_customer WHERE cus_email = '$email' AND cus_password = '$password'";
		$selrow = $this->db->select($sql);
		if($selrow){
			$row = $selrow->fetch_assoc();
			session::set("cuslog",true);
			session::set("cusId",$row['cus_id']);
			session::set("cusName",$row['cus_name']);
			session::set("cusEmail",$row['cus_email']);
			header("Location:index.php");
		}else{
			$cus_msg = "<span style='color:red;font-size:22px;'>Email or password Are not match</span>";
			return $cus_msg;
		}
	}

	public function deleteCart(){
		$sesId = session_id();
		$sql = "DELETE FROM admin_cart WHERE sess_id = '$sesId'";
		$delrow = $this->db->delete($sql);
		if($delrow){
			return $delrow;
		}else{
			return false;
		}
	} 

	public function selCus($ses_id){
		$sql = "SELECT * FROM shop_customer	WHERE cus_id='$ses_id'";
		$selrow = $this->db->select($sql);
		if($selrow){
			return $selrow;
		}else{
			return false;
		}
	}
}
  ?>
