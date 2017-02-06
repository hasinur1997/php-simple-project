
<?php 
require_once('inc/header.php');
$errorHandaler = new ErrorHandaler;
$user = new User;

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'welcome-title' => [
			'required' => true,
		],
		'description' => [
			'required' => true
		]

	]);
	
	/*if( !$validation->fails()){
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
	}*/
}


?>






<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="add-content"> 
		
			<div class="welcome-text"> 
				<h2>Add Home Page Content</h2>
				<form action="" method="POST"> 
					<div class="form-group<?php echo $errorHandaler->first('welcome-title') != null ? ' has-error' : ''?>">

						<label for="welcome-title" class="control-label">Welcome Title</label>

						<?php echo $errorHandaler->first('welcome-title') != null ? '<p class="help-block">'. $errorHandaler->first('welcome-title') .'</p>' : ''?>
						<input type="text" id="welcome-title" name="welcome-title" class="form-control" />


					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('description') != null ? ' has-error' : ''?>">

						<label for="description" class="control-label">Welcome Description</label>



						<?php echo $errorHandaler->first('description') != null ? '<p class="help-block">'. $errorHandaler->first('description') .'</p>' : ''?>


						<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>


						<script type="text/javascript">
								if ( typeof CKEDITOR == 'undefined' )
								{
									document.write(
										'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
										'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
										'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
										'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
										'value (line 32).' ) ;
								}
								else
								{
									var editor = CKEDITOR.replace( 'description' );
									//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
								}

							</script>
					</div>
					<div class="form-group"> 
						<input type="submit" value="submit" class="btn btn-default"/>
					</div>
				</form>
			</div>
		
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>