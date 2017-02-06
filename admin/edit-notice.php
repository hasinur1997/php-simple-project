<?php 
	if(isset($_GET['edit'])){
			$id = $_GET['edit'];
		}else{
			header('location:notice.php');
		}
require_once('inc/header.php');
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();
$data = $db->get('notice', ['id', '=', $id])->first();

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'notice-title' => [
			'required' => true,
		],
		'description' => [
			'required' => true
		]

	]);
	
	if( !$validation->fails()){
		date_default_timezone_set("Asia/Dhaka");
		if($db->update('notice', $data->id, [
			'title' => $_POST['notice-title'],
			'description' => $_POST['description'],
			'date' => date('Y-m-d H:i:s')
			
		]))
		{
			echo"<script> 
					alert('You have Updated successfully ')
			</script>";
		}else{
			echo"<script> 
					alert('You have not Updated successfully ')
			</script>";
		}
	}
}





?>
<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	
	<div class="content"> 
		<div class="notice"> 
			<div class="add-content"> 
				<?php if(isset($messege)){
					echo $messege;
					}?>
				<h2>Update Notice</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('notice-title') != null ? ' has-error' : '';?>">

						<label for="notice-title" class="control-label">Notice Title</label>

						<?php echo $errorHandaler->first('notice-title') != null ? '<p class="help-block">'. $errorHandaler->first('notice-title') .'</p>' : ' ';?>

						<input type="text" id="notice-title" class="form-control" name="notice-title" value="<?php echo $data->title?>"/>
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('description') != null ? ' has-error' : '';?>">

						<label for="description" class="control-label">Notice Description</label>

						
						<?php echo $errorHandaler->first('description') != null ? '<p class="help-block">'. $errorHandaler->first('description') .'</p>' : '';?>


						<textarea name="description" class="form-control" id="description" cols="30" rows=" "  <?php echo $data->description;?></textarea>
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
					<input type="hidden" value="<?php echo $data->id?>">
					<div class="form-group"> 
							<input type="submit" value="Submit" class="btn btn-default" />
					</div>
					
				</form>

				<a href="notice.php">Back</a>
			</div>


		</div>
	</div>


</div>

	



<?php require_once('inc/footer.php');?>