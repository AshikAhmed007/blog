
<?php 
require_once 'class/blog.php';
$blog=new Blog();
if(isset($_POST['btn'])){

 
$blog->save_img($_POST);

}
$result=$blog->show_img();
 ?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="pic" onchange="showPic.call(this)"  multiple accept="images/*"><br><br>
		<img src="" style="display: none;" width='100px' height='100px' id="image">
		 <script>
      	function showPic(){
      		if(this.files && this.files[0])
      		{
      			var obj= new FileReader();
      			obj.onload= function(data){
      				var image= document.getElementByID("image");
      				image.src=data.target.result;
      				image.style.display="block";
      			}
      			obj.readAsDataURL(this.files[0]);
      		}
      	}

      </script>
		<input type="submit" name="btn" value="save image">
	</form>

 	<div class="container">
 		
 		<div class="row">
 			<?php while($img_info=mysqli_fetch_assoc($result)) {?>
 					<div class="col-lg-3">
 					<div class="well">
 			<?php  echo "<img src='"."asset/blog_img/pic-{$img_info['img_id']}.{$img_info['img']}"."'width='150px'>";?>

 				</div>
 				
 			
 		</div>
 		<?php } ?>
 	</div>
</div>



</body>
</html>