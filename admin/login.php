<?php 
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$user = new User();

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'username' => [
			'required' => true,
		],
		
		'password' => [
			'required' => true
		]
		

	]);

	if(!$validation->fails())
	{
		if($user->login($_POST['username'], $_POST['password']))
		{
			Redirect::to('index.php');
		}else
		{
			if(!$user->find($_POST['username']))
			{
				 $message = "This username '{$_POST['username']}' does not exist in the database";
			}elseif(md5($_POST['password']) !==  $user->data()->password){

				$message = "username and password does not match";
			}
		}
	}
	
	
}

?>

<?php if(isset($message))
			{
				?> 

					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	<?php echo $message;?>
					</div>
		
					




				<?php
			}
			?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="register-form"> 
		<form action="" method="POST">
			<h2>Admin Login</h2>
			

		
			<div class="form-group<?php echo $errorHandaler->first('username') != null ? ' has-error' : '' ?>">
				<label for="username" class="control-label">User Name:</label> 
				<input type="text" id="username" name="username" class="form-control">
				<?php echo $errorHandaler->first('username') != null ? '<p class="help-block">'. $errorHandaler->first('username') .'</p>': ''?>
			</div>
			
			<div class="form-group<?php echo $errorHandaler->first('password') != null ?  ' has-error' : '';?>">
				<label for="password" class="control-label">Password:</label> 
				<input type="text" id="password" name="password" class="form-control">
				<?php echo $errorHandaler->first('password') != null ? '<p class="help-block">'. $errorHandaler->first('password') .'</p>' : '';?>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Login" class="btn btn-default pull-right">
			</div>

		</form>
	</div>


	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
