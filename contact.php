<?php 
	$title = 'Contact';
	require_once 'inc/header.php';
	$errorHandaler = new ErrorHandaler;
	$db = DB::getInstance();


	if(!empty($_POST)){
		$validator = new Validator($errorHandaler);
		$validation = $validator->check($_POST, [
			'name' => [
				'required' => true
			],
			'email' => [
				'required' => true,
				'email' => true
			],
			'phone' => [
				'required' => true
			],
			'subject' => [
				'required' => true
			],
			'message' => [
				'required' => true
			],
		]);

		if(!$validation->fails()){
			if($db->insert('messag', [
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'subject' => $_POST['subject'],
				'message' => $_POST['message'],
				'date' => date('Y-m-d H:i:s')
			])){
				$success = "Your message has been sent";
			}else{
				$failed = "Your message not sent ! Please try again";
			}
		}
	}
?>

<div class="contact-area"> 
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="message"> 
					<h2>Message Us</h2>
					<?php if(isset($success)):?>

						<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong><?php echo $success;?>
						</div>
						
						<?php elseif(isset($failed)):?>

						<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong><?php echo $failed;?>
						</div>

					<?php endif;?>

					
					<div class="cotact-form"> 
						<form action="" method="POST"> 

							<div class="form-group<?php echo $errorHandaler->first('name') != null ? ' has-error' : '' ;?>">
								
								<label class="control-label" for="name" >Name<span class="require">*</span></label>

								<input type="text" id="name" class="form-control" name="name"/>
								<?php echo $errorHandaler->first('name') != null ? '<p class="help-block">'. $errorHandaler->first('name') .'</p>' : '';?>
							</div>


							<div class="form-group<?php echo $errorHandaler->first('email') != null ? ' has-error' : '' ;?>">
								<label 
								<label class="control-label" for="email" >Email<span class="require">*</span></label>
								<input type="text" id="email" class="form-control" name="email"/>

								<?php echo $errorHandaler->first('email') != null ? '<p class="help-block">'. $errorHandaler->first('email') .'</p>' : '';?>

							</div>


							<div class="form-group<?php echo $errorHandaler->first('phone') != null ? ' has-error' : '' ;?>">
								<label 
								<label for="phone" class="control-label" for="phone">Phone<span class="require">*</span></label>
								<input type="text" id="phone" class="form-control" name="phone"/>
								<?php echo $errorHandaler->first('phone') != null ? '<p class="help-block">'. $errorHandaler->first('phone') .'</p>' : '';?>
							</div>


							<div class="form-group<?php echo $errorHandaler->first('subject') != null ? ' has-error' : '' ;?>">
								<label 
								<label for="subject" class="control-label" for="subject">Subject<span class="require">*</span></label>
								<input type="text" id="subject" class="form-control" name="subject"/>

								<?php echo $errorHandaler->first('subject') != null ? '<p class="help-block">'. $errorHandaler->first('subject') .'</p>' : '';?>
							</div>


							<div class="form-group<?php echo $errorHandaler->first('message') != null ? ' has-error' : '' ;?>">

								<label class="control-label" for="message">Message<span class="require">*</span></label>

								<textarea name="message" id="message" cols="30" rows="6" class="form-control"></textarea>

								<?php echo $errorHandaler->first('message') != null ? '<p class="help-block">'. $errorHandaler->first('message') .'</p>' : '';?>

							</div>

							
							<div class="form-group">
								<input type="submit" class="btn btn-default btn-lg pull-right" name="submit" value="Send"/>
							</div>


						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="address">
					<h2>Contact Us</h2>
					<address> 
						Pabna, Polytechnic Institute, Pabna.<br>
						Phone:0731-57839<br>
						Mobile:01564-75839<br>
						Emai: pabnapoly@gmail.com<br>
						
					</address>
				</div>
			</div>
		</div>
	</div>
</div>













<?php 
	require_once 'inc/footer.php';
?>