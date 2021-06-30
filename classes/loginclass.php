<?php include "../lib/database.php"; ?>
<?php include "../lib/session.php"; 
session::checklog();
?>
<?php 
class login{
	public $db = "";
	public function __construct(){
		$this->db = new database();
	}
	public function chklog($username,$password){
		$ad_us = mysqli_real_escape_string($this->db->link,$username);
		$ad_pass = mysqli_real_escape_string($this->db->link,$password);
		$sql = "SELECT * FROM admin_table WHERE admin_user = '$ad_us' AND admin_pass = '$ad_pass'";
		$result = $this->db->select($sql);
		if($result){
			$row = $result->fetch_assoc();
			session::set("login",true);
			session::set("usId",$row['admin_id']);
			session::set("usName",$row['admin_user']);
			header("Location:index.php");
		}else{
			$errormsg = "user or password are not match";
			return $errormsg;
		}
	}
	
}
 ?>
