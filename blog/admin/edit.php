<?php 
session_start();
if($_SESSION['admin_id']==NULL){
	header('Location:index.php');
}
$blog_id=$_GET['id'];
require_once '../class/blog.php';
$blog=new Blog();
$result=$blog->edit_info_by_id($blog_id);
$blog_info=mysqli_fetch_assoc($result);

$msg='';
 if(isset($_POST['btn'])){
 $blog->update_info($_POST);

 	}

 	if(isset($_GET['logout'])){
	require_once '../class/login.php';
	$login=new Login;
	$login->admin_logout();
}
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
		 <a class="navbar-brand" href="#">Logo</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link active" href="dashboard.php">Add Blog </a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="mng_blog.php">Manage Blog</a>
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
	 <!-- <h1 style="color: green" class="text-center"><?php echo $msg; ?></h1> -->
 
<div class="container col-lg-3">
	<!-- <h3 style="color:green;"><?php echo  $msg; ?></h3> -->
<form  style="margin-top: 100px;" action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
      <label for="name">Blog Title :</label>
      <input type="text" class="form-control" placeholder="Blog Title" name="blog_title" 
      value="<?php echo $blog_info['blog_title'] ?>">
      <input type="hidden" name="blog_id" value="<?php echo $blog_info['blog_id'] ?>">
    </div>

	<div class="form-group"> 
      <label for="name">Author Name :</label>
      <input type="text" class="form-control" placeholder="Author Name" name="author_name"
      value="<?php echo $blog_info['author_name'] ?>">
    </div>

    <div class="form-group">
      <label for="des">Blog Description :</label>
      <textarea placeholder="Blog Description" name="des" class="form-control" rows="5"><?php echo $blog_info['blog_des']?></textarea>
    </div>

    <div class="form-group">
      <label for="name">Image :</label>
      <input type="file" name="pic" multiple accept="images/*" onchange="loadfile(event)">
      <?php  echo "<img src='"."../asset/blog_img/pic-{$blog_info['blog_id']}.{$blog_info['blog_img']}"."'width='100px' height='100px' id='image'>";?>
      
       <script type="text/javascript">
      	function loadfile(event){
      		var output = document.getElementById('image');
      		output.src = URL.createObjectURL(event.target.files[0]);
      		output.style.display="block";
      	};

      </script>

    </div>
    <div class="form-group">
      <label for="status">Publication Status :</label>
      <select name="status">
      	<option>--select status--</option>
      	<option value="1">published</option>
      	<option value="0">unpublished</option>
      </select>
    </div>

	<button type="submit" class="btn btn-success btn-block" name="btn">submit</button>

</form>
</div>
</body>
</html>