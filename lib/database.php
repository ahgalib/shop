<?php 
class database{
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_pass = "";
	public $db_name = "db_shop";
	public $error = "";
	public $link = "";
	public $conn = true;
	
	public function __construct(){
		if($this->conn == true){
			$this->link =new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name)or die("conn fail");
		}else{
			$this->error = "connect error".$this->link->connect_error;
		}
	}

	public function select($sql){
		$show = $this->link->query($sql)or die($this->link->error.__LINE__);
		if($show->num_rows>0){
			return $show;
		}else{
			return false;
		}
	}

	public function insert($sql){
		$query = $this->link->query($sql)or die("insert sql fail");
		if($query){
			return $query;
		}else{
			return false;
		}
	}

	public function update($sql){
		$query = $this->link->query($sql);
		if($query){
			return $query;
		}else{
			return false;
		}
	}

	public function delete($sql){
		$query = $this->link->query($sql);
		if($query){
			return $query;
		}else{
			return false;
		}
	}

}
 ?>