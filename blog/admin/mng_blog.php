<?php 

session_start();
if($_SESSION['admin_id']==NULL){
	header('Location:index.php');
}
require_once '../class/blog.php';
 $blog=new Blog();
$msg="";
 if(isset($_GET['delete'])){
	$blog_id=$_GET['delete'];
	$msg=$blog->delete_info($blog_id);
}


// // echo session_id();

// // echo $_SESSION['name'];
// // unset ($_SESSION['name']);
// // echo $_SESSION['name'];
// $msg='';
// if(isset($_GET['delete'])){
// 	$id=$_GET['delete'];
// 	$msg=$std->delete_info($id);
// }




$result=$blog->show_blog();

if(isset($_GET['logout'])){
	require_once '../class/login.php';
	$login=new Login;
	$login->admin_logout();
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Manage Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
		 <a class="navbar-brand" href="#">Logo</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link " href="dashboard.php">Add Blog </a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="mng_blog.php">Manage Blog</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="" class="nav-link"> Hello <?php echo $_SESSION['admin_name']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?logout=logout">Logout</a>
			</li>
		</ul>
	</nav>

<center>
	<h3 style="color:green;"><?php if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
} ?></h3>
	<table style="margin-top: 100px;" class="table table-dark table-hover table-striped">
	<tr>
		<td>SL no.</td>
		<td>Blog Image</td>
		<td>Blog Title</td>
		<td>Author name</td>
		<td>Blog Description</td>
		<td>Publication Status</td>
		<td>Action</td>

	</tr>
		<?php $i=1; while($blog_info=mysqli_fetch_assoc($result)){ ?>
			
	<tr>
		<td><?php echo $i++; ?></td>
		<td>

			 <?php  echo "<img src='"."../asset/blog_img/pic-{$blog_info['blog_id']}.{$blog_info['blog_img']}"."'width='100px' height='100px'>";?>

		</td>
		<td> <?php echo  $blog_info['blog_title'];?></td>
		<td><?php  echo $blog_info['author_name'];?></td>
		<td><?php echo $blog_info['blog_des']; ?></td>
		<td><?php if($blog_info['publication_sts']==1){
				echo 'Published';
		}else{
			echo 'Unpublished';
		} ?></td>
		<td>
			<a href="edit.php?id=<?php echo  $blog_info['blog_id']; ?>" style="color: white;" ><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
			<a href="?delete=<?php echo  $blog_info['blog_id']; ?>" style="color: white" onclick="return confirm('Are you sure to delete this?');"><i class="fa fa-trash"></i></a>
		</td>

	</tr>
<?php } ?>
	</table></center>
</body>
</html>