<?php 

class Login{

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


public function admin_login_check($data){
	$pass=md5($data['password']);
	$sql="select * from tbl_admin where email='$data[email]' AND password='$pass'";
	$query_result=mysqli_query($this->con, $sql);
	$admin_info=mysqli_fetch_assoc($query_result);
	if($admin_info){
		session_start();
		$_SESSION['admin_id']=$admin_info['admin_id'];
		$_SESSION['admin_name']=$admin_info['admin_name'];
		header('Location:dashboard.php');
	}else{
		$msg="Your id or password is not valid";
		return $msg;
	}
}
public function admin_logout(){
	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']);
	header('Location:index.php');
}





}
 ?>