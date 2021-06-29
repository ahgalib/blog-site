<?php 
class blog{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $database_name = "db_blog";
	private $conn = true;
	private $error = "";
	private $success = "";
	public $mysqlix = "";
	//private $link = "";
	private $array_error = array();
	

	public function __construct(){
		if($this->conn == true){
			$this->mysqlix = new mysqli($this->host,$this->user,$this->pass,$this->database_name)or die("connect fail");
		}else{
			$this->error ="connect fail". $this->mysqlix->connect_error;
			return false;
		}
	}

	public function select($sql){
		$show = $this->mysqlix->query($sql) or die($this->mysqlix->error.__LINE__);
		if($show->num_rows>0){
			return $show;
		}else{
			return false;
		}
	}

	public function insert($query){
		$insert_row = $this->mysqlix->query($query)or die("insert query fail");
		if($insert_row){
			return $insert_row;
		}else{
			return false;
		}
	}

	public function update($sql){
		$update_row = $this->mysqlix->query($sql)or die("update query fail");
		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}

	public function delete($sql){
		$delete_row = $this->mysqlix->query($sql)or die("update query fail");
		if($delete_row){
			return $delete_row;
		}else{
			return false;
		}
	}
}

 ?>