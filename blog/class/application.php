<?php 
class Application{

protected $con;

	public function __construct(){
	$hostname="localhost";
	$username="root";
	$pass="";
	$dbname="db_blog";
	$this->con=mysqli_connect($hostname,$username,$pass,$dbname);
	if(!$this->con){
		die('Connection Failed'.mysqli_error($this->con));

	}
}



public function publishedBlog(){
	$sql="Select * from tbl_blog where publication_sts=1 order by blog_id desc";
	if(mysqli_query($this->con, $sql)){
		$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}

public function selectedBlog($blog_id){
	$sql="Select * from tbl_blog where blog_id=$blog_id";
	if(mysqli_query($this->con, $sql)){
		$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}

}










 ?>