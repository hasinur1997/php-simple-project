<?php 
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$user = new User;

if(!$user->loggedin())
{
	Redirect::to('login.php');
}

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'username' => [
			'required' => true,
			'maxlength' => 20,
			'minlength' => 6,
			'alnum' => true,
			'unique' => 'users'
		],
		'email' => [
			'required' => true,
			'email' => true,
			'unique' => 'users'
		],
		'password' => [
			'required' => true,
			'minlength' => 6
		],
		'confirm-password' => [
			'required' => true,
			'match' => 'password'
			
		]

	]);
	
	if( !$validation->fails()){
		if($user->create([
			'username' => $_POST['username'],
			'email' => $_POST['email'],
			'password' => md5($_POST['password'])
		]))
		{
			echo"<script> 
					alert('You have successfully registered');
			</script>";
		}else{
			echo"<script> 
				alert('You are unable to create your account !');
			</script>";
		}
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="register-form"> 
		<form action="" method="post">
			<h2>Admin Registration</h2>
			<div class="form-group<?php echo $errorHandaler->first('username') != null ? ' has-error' : '' ?>">
				<label for="name" class="control-label">User Name:</label> 
				<input type="text" id="name" name="username" class="form-control"value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : '';?>">
				<?php echo $errorHandaler->first('username') != null ? '<p class="help-block">'. $errorHandaler->first('username') .'</p>' : ' ';?>
			</div>
			
			<div class="form-group<?php echo $errorHandaler->first('email') != null ? ' has-error' : ''?>">
				<label for="email" class="control-label">Email:</label> 
				<input type="text" id="email" name="email" class="form-control">
				<?php echo $errorHandaler->first('email') != null ? '<p class="help-block">'. $errorHandaler->first('email') .'</p>' : '';?>
			</div>
			<div class="form-group<?php echo $errorHandaler->first('password') != null ? ' has-error' : ''?>">
				<label for="password" class="control-label">Password:</label> 
				<input type="text" id="password" name="password" class="form-control">
				<?php echo $errorHandaler->first('password') != null ? '<p class="help-block">'. $errorHandaler->first('password') .'</p>' : '';?>
			</div>

			<div class="form-group<?php echo $errorHandaler->first('confirm-password') != null ? ' has-error' : ''?>">
				<label for="confirm-password" class="control-label">Confirm-password:</label> 
				<input type="text" id="confirm-password" name="confirm-password" class="form-control">
				<?php echo $errorHandaler->first('confirm-password') != null ? '<p class="help-block">'. $errorHandaler->first('confirm-password') .'</p>' : '';?>
			</div>
			<div class="form-group">
				<input type="submit"  value="Submit" class="btn btn-default pull-right">
			</div>

		</form>
	</div>
	

	<script src="../js/jquery.js"></script>
	<script src="../js/boostrap.min.js"></script>
</body>
</html>
