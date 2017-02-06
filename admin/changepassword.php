<?php 
require_once('inc/header.php');
$errorHandaler = new ErrorHandaler;
$user = new User();


if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'current-password' => [
			'required' => true,
		],
		
		'new-password' => [
			'required' => true,
			'minlength' => 6,
		],
		'newpassword-agian' => [
			'required' => true,
			'minlength' => 6,
			'match' => 'new-password'
		]
		

	]);

	if(!$validation->fails())
	{
		if(md5($_POST['current-password']) !== $user->user()->password)
		{
			$message = 'Current password is wrong';
		}elseif($db->update('users', $user->user()->id, [
				'password' => md5($_POST['new-password']) 

			])){
			echo "<script> 
				alert('Your password has been changed');
			</script>";
		}else{
			$message = "Your password could not change";
		}
		
	}
	
	
}

?>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="add-content"> 
			<h2>Change Password</h2>
			<form action="" method="POST"> 
				
				<?php if(isset($message)){
					?>
						<div class="has-error"> 
							<p class="help-block"><?php echo $message;?></p>
						</div>

					<?php

					}?>
				<div class="form-group<?php echo $errorHandaler->first('current-password') != null ? ' has-error' : ''?>"> 

					<label for="current-password" class="control-label">Current Password</label>

					<input type="password" name="current-password" id="current-password" class="form-control">

					<?php echo $errorHandaler->first('current-password') != null ? '<p class="help-block">'. $errorHandaler->first('current-password') .'</p>' : ''?>
				</div>



				<div class="form-group<?php echo $errorHandaler->first('new-password') != null ? ' has-error' : ''?>">

					<label for="new-password" class="control-label">New Password</label>

					<input type="password" name="new-password" id="new-password" class="form-control">

					<?php echo $errorHandaler->first('new-password') != null ? '<p class="help-block">'. $errorHandaler->first('new-password') .'</p>' : ''?>
				</div>


				<div class="form-group<?php echo $errorHandaler->first('newpassword-agian') != null ? ' has-error' : ''?>">

					<label for="newpassword-agian" class="control-label">New Password Again</label>

					<input type="password" name="newpassword-agian" id="newpassword-agian" class="form-control">

					<?php echo $errorHandaler->first('newpassword-agian') != null ? '<p class="help-block">'. $errorHandaler->first('newpassword-agian') .'</p>' : ''?>
				</div>


				<div class="form-group"> 
					<input type="submit" value="Update" class="btn btn-default">
				</div>

			</form>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>