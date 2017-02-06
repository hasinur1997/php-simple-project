<?php 
require_once('inc/header.php');
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$user = new User;
$db = DB::getInstance();

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'name' => [
			'required' => true,
		],

		'department' => [
			'required' => true,
		],

		'designation' => [
			'required' => true
		]
	]);

	if(!empty($_FILES['name'])){
		$validatior->check($_FILES, [
		'picture' => [
			'imageformate' => 'png,jpeg,gif,jpg',
			'imagesize' => 1
		]
		
		]);
	}

	
	if( !$validation->fails()){

		$image_name = '';
		$upload = $user->upload('picture');
		if($upload['action']){
			$image_name = $upload['name'];

		}
		if($db->insert('teacher',[
			'name' => $_POST['name'],
			'department' => $_POST['department'],
			'designation' => $_POST['designation'],
			'picture' => $image_name
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






?>
<?php echo $errorHandaler->first('') != null ? ' has-error' : ''?>
<?php echo $errorHandaler->first('') != null ? '<p class="help-block">' . $errorHandaler->first('') . '</p>' : ''?>



<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="add-content"> 
			<?php if(isset($message)){echo $message;}?>
			<div class="student-information"> 
				<h2>Add Teacher Information</h2>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="col-md-6"> 
						<div class="form-group<?php echo $errorHandaler->first('name') != null ? ' has-error' : ''?>"> 

							<label for="name" class="control-label">Name</label>

							<input type="text" id="name" class="form-control" name="name"/>

							<?php echo $errorHandaler->first('name') != null ? '<p class="help-block">' . $errorHandaler->first('name') . '</p>' : ''?>

						</div>

						<div class="form-group<?php echo $errorHandaler->first('department') != null ? ' has-error' : ''?>">

							<label for="department" class="control-label">Department</label>				
							<input type="text" id="department" class="form-control" name="department"/>

							<?php echo $errorHandaler->first('department') != null ? '<p class="help-block">' . $errorHandaler->first('department') . '</p>' : ''?>
						</div>
						
					
					
					
					
					<div class="form-group<?php echo $errorHandaler->first('designation') != null ? ' has-error' : ''?>"> 

						<label for="designation" class="control-label">Designation</label>

						<input type="text" id="designation" class="form-control" name="designation"/>

						<?php echo $errorHandaler->first('designation') != null ? '<p class="help-block">' . $errorHandaler->first('designation') . '</p>' : ''?>
					</div>
					
					</div>
					
					<div class="col-md-6"> 
					
					
					<div class="form-group<?php echo $errorHandaler->first('picture') != null ? ' has-error' : ''?>"> 

						<label for="picture" class="control-label">Upload Image</label>

						<input type="file" id="picture" name="picture"/>

						<?php echo $errorHandaler->first('picture') != null ? '<p class="help-block">' . $errorHandaler->first('picture') . '</p>' : ''?>
					</div>
					
					<div class="form-group"> 
						
						<input type="submit" value="submit" class="btn btn-default"/>
					</div>
					</div>

					
				</form>
			</div>
		</div>

	</div>
</div>


<?php require_once('inc/footer.php');?>