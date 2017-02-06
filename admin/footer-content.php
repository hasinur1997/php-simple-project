<?php require_once('inc/header.php');
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();


if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'url' => [
			'required' => true
		],
		'link-icon' => [
			'required' => true
		]

	]);
	
	if( !$validation->fails()){
		if($db->insert('social_media',[
			'url' => $_POST['url'],
			'icon' => $_POST['link-icon']
		]))
		{
			echo"<script> 
					alert('You have added successfully ')
			</script>";
		}else{
			echo"<script> 
				alert('You have  not added successfully!')
			</script>";
		}
	}
}



?>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="link"> 
			<div class="add-content"> 
				<h2>Add Social Media Link</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('url') != null ? ' has-error' : ''?>"> 
					
						<label for="url" class="control-label">Add Social Media URL</label>
						
						<input id="url" type="text" name="url" class="form-control"/>
						
						<?php echo $errorHandaler->first('url') != null ? '<p class="help-block">'. $errorHandaler->first('url') .'</p>' : ''?>
						
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('link-icon') != null ? ' has-error' : ''?>"> 
					
						<label for="link" class="control-label">Add Social Media Icon Name</label>
						
						<input id="link" type="text" name="link-icon" class="form-control"/>
						
						<?php echo $errorHandaler->first('link-icon') != null ? '<p class="help-block">'. $errorHandaler->first('link-icon') .'</p>' : ''?>
						
					</div>
					
					<div class="form-group"> 
						
						<input type="submit" value="Submit" class="btn btn-default" />
						
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>