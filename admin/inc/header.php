<?php 
	require_once('core/init.php');
$user = new User;

if(!$user->loggedin()){
  Redirect::to('login.php');
}
   

  
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	
	
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	
</head>
<body>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Paban Polytechnic Institute Web site Content Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
