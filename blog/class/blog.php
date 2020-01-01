<?php 

class Blog{

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

public function save_info($data){
$ext=$this->save_img();
$sql="INSERT INTO `tbl_blog` ( `blog_img`,`blog_title`, `author_name`, `blog_des`, `publication_sts`) VALUES ( '$ext','$data[blog_title]', '$data[author_name]', '$data[des]', '$data[status]')";
	
 
if(mysqli_query($this->con, $sql)){
	$img_url='../asset/blog_img/pic-'.mysqli_insert_id($this->con).".".$ext;
	  				move_uploaded_file($_FILES['pic']['tmp_name'], $img_url);
	$msg="Blog info saved sucessfuly!!!";
	return $msg;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}


public function show_blog(){

	$sql="SELECT * FROM tbl_blog ORDER BY blog_id DESC ";
	if(mysqli_query($this->con, $sql)){
	$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}


public function edit_info_by_id($blog_id){
$sql="SELECT * FROM tbl_blog WHERE 	blog_id='$blog_id' ";
if(mysqli_query($this->con, $sql)){
	$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}

public function update_info($data){

if(isset($_FILES['pic']['name'])){
	$blog_id= $data['blog_id'];
	$img_result=mysqli_query($this->con,"SELECT blog_img From tbl_blog Where blog_id='$blog_id'");
	$blog_img=mysqli_fetch_assoc($img_result);
	unlink("../asset/blog_img/pic-".$blog_id.".".$blog_img['blog_img']);

	$ext=$this->save_img();	
	$sql="UPDATE tbl_blog SET blog_img='$ext',blog_title='$data[blog_title]',author_name='$data[author_name]',
blog_des='$data[des]',publication_sts='$data[status]' WHERE blog_id='$data[blog_id]'";

if(mysqli_query($this->con, $sql)){
	$img_url='../asset/blog_img/pic-'.$blog_id.".".$ext;
	move_uploaded_file($_FILES['pic']['tmp_name'], $img_url);
	
	$_SESSION['msg']='Update sucessfuly!!!';
	 header('Location:mng_blog.php'); 
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}else{

$sql="UPDATE tbl_blog SET blog_title='$data[blog_title]',author_name='$data[author_name]',
blog_des='$data[des]',publication_sts='$data[status]' WHERE blog_id='$data[blog_id]'";

if(mysqli_query($this->con, $sql)){
	
	$_SESSION['msg']='Update sucessfuly!!!';
	 header('Location:mng_blog.php'); 
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}

}

public function delete_info($blog_id){
$sql="DELETE FROM tbl_blog where blog_id='$blog_id' ";
$img_result=mysqli_query($this->con,"SELECT blog_img From tbl_blog Where blog_id='$blog_id'");
$blog_img=mysqli_fetch_assoc($img_result);
unlink("../asset/blog_img/pic-".$blog_id.".".$blog_img['blog_img']);

if(mysqli_query($this->con, $sql)){
	$msg="Deleted sucessfuly!!!";
	return $msg;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}


}

public function save_img(){
	// echo '<pre>';
	// print_r($_FILES);
	 $myImg=$_FILES['pic']['name'];
	 $ext=pathinfo($myImg,PATHINFO_EXTENSION);
	 $ext=strtolower($ext);
	 $image_size=$_FILES['pic']['size'];
	 
	 
	  		if($image_size>5000000){
	  			die('Image is too large');
	  		}else{
	  			if($ext!='jpg' && $ext!='jpeg' && $ext!='png'){
	  				die('File type is invalid.please insert JPG,JPEG or PNG');
	  			}else{
	 				
	  				return $ext;

	  			}
	  		}

	  	

	  
	 
	 
} 


public function show_img(){

	$sql="SELECT * FROM tbl_blog order by blog_id desc";
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