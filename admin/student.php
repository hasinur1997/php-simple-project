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

		'roll' => [
			'required' => true
		],

		'registration' => [
			'required' => true
		],

		'semester' => [
			'required' => true
		],

		'shift' => [
			'required' => true
		],

		'session' => [
			'required' => true
		],

		'phone' => [
			'required' => true
		],

		'email' => [
			'required' => true
		],

		'address' => [
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
		if($db->insert('student',[
			'name' => $_POST['name'],
			'department' => $_POST['department'],
			'roll' => $_POST['roll'],
			'registration' => $_POST['registration'],
			'semester' => $_POST['semester'],
			'shift' => $_POST['shift'],
			'session' => $_POST['session'],
			'phone' => $_POST['phone'],
			'email' => $_POST['email'],
			'address' => $_POST['address'],
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
				<h2>Add Student Information</h2>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="col-md-4"> 
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
						
						<div class="form-group<?php echo $errorHandaler->first('roll') != null ? ' has-error' : ''?>">
							<label for="roll" class="control-label">Roll</label>				
							<input type="text" id="roll" class="form-control" name="roll"/>

							<?php echo $errorHandaler->first('roll') != null ? '<p class="help-block">' . $errorHandaler->first('roll') . '</p>' : ''?>
						</div>
						
						<div class="form-group<?php echo $errorHandaler->first('registration') != null ? ' has-error' : ''?>"> 

							<label for="registration" class="control-label">Registration No</label>

							<input type="text" id="registration" class="form-control" name="registration"/>

							<?php echo $errorHandaler->first('registration') != null ? '<p class="help-block">' . $errorHandaler->first('registration') . '</p>' : ''?>

						</div>
					</div>
					<div class="col-md-4">
					<div class="form-group<?php echo $errorHandaler->first('semester') != null ? ' has-error' : ''?>">

						<label for="semester" class="control-label">Semester</label>

						<input type="text" id="semester" class="form-control" name="semester"/>

						<?php echo $errorHandaler->first('semester') != null ? '<p class="help-block">' . $errorHandaler->first('semester') . '</p>' : ''?>
						
					</div> 

					<div class="form-group<?php echo $errorHandaler->first('shift') != null ? ' has-error' : ''?>">

						<label for="shift" class="control-label">Shift</label>

						<input type="text" id="shift" class="form-control" name="shift"/>

						<?php echo $errorHandaler->first('shift') != null ? '<p class="help-block">' . $errorHandaler->first('shift') . '</p>' : ''?>

					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('session') != null ? ' has-error' : ''?>"> 

						<label for="session" class="control-label">Session</label>

						<input type="text" id="session" class="form-control" name="session"/>

						<?php echo $errorHandaler->first('session') != null ? '<p class="help-block">' . $errorHandaler->first('session') . '</p>' : ''?>
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('phone') != null ? ' has-error' : ''?>"> 

						<label for="phone" class="control-label">Phone</label>

						<input type="text" id="phone" class="form-control" name="phone"/>

						<?php echo $errorHandaler->first('phone') != null ? '<p class="help-block">' . $errorHandaler->first('phone') . '</p>' : ''?>
					</div>
					
					
					</div>
					<div class="col-md-4"> 
						<div class="form-group<?php echo $errorHandaler->first('email') != null ? ' has-error' : ''?>"> 

						<label for="email" class="control-label">Email</label>
						<input type="email" id="email" class="form-control" name="email"/>

						<?php echo $errorHandaler->first('email') != null ? '<p class="help-block">' . $errorHandaler->first('email') . '</p>' : ''?>
					</div>
						<div class="form-group<?php echo $errorHandaler->first('email') != null ? ' has-error' : ''?>">

						<label for="address" class="control-label">Address</label>

						<input type="text" id="address" class="form-control" name="address"/>

							<?php echo $errorHandaler->first('address') != null ? '<p class="help-block">' . $errorHandaler->first('address') . '</p>' : ''?>
					</div>
					
					
					
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


		<div class="view-student"> 
			<div class="addcontent"> 
				<h2>View Student List</h2>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>SL No</th>
							<th>Name</th>
							<th>Department</th>
							<th>Roll</th>
							<th>Registration</th>
							<th>Semester</th>
							<th>Shift</th>
							<th>Session</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
						</tr>
					</thead>
				

				<tbody>

					<?php 
						$i = 1;
						foreach($db->fetchAll('student')->result() as $row){


							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->department;?></td>
								<td><?php echo $row->roll;?></td>
								<td><?php echo $row->registration;?></td>
								<td><?php echo $row->semester;?></td>
								<td><?php echo $row->shift;?></td>
								<td><?php echo $row->session;?></td>
								<td><?php echo $row->phone;?></td>
								<td><?php echo $row->email;?></td>
								<td><?php echo $row->address;?></td>
							</tr>


							<?php
							$i++;
						}

					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>