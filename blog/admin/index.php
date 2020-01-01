<?php 





if(isset($_SESSION['admin_id'])){
  if($_SESSION['admin_id']!=NULL){
    header('Location:dashboard.php');
  }
}




if(isset($_POST['btn'])){
  require_once '../class/login.php';
  $login= new Login();
  $msg=$login->admin_login_check($_POST);

}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="row">
        <div class="col-lg-offset-2 col-lg-6">
          <div class="well" style="margin-top: 230px;padding: 80px;">
            <h3 class="text-center ">Enter valid info</h3>
            <h4 class="text-center text-danger"><?php if(isset($msg)){echo $msg;} ?></h4>
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-lg-3">Email :</label>
                <div class="col-lg-9">
                <input type="email" name="email"  class="form-control">
              </div>
            </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Password :</label>
                <div class="col-lg-9">
                <input type="Password" name="password"  class="form-control">
              </div>
            </div>
              <div class="form-group">
               <div class="col-lg-offset-3 col-lg-9">
                <input type="submit" name="btn"  class="btn btn-success btn-block" value="login">
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="asset/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
