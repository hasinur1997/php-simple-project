
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

foreach($db->fetchAll('link')->result() as $row){
	
}

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'url' => [
			'required' => true
		],
		'link' => [
			'required' => true
		]

	]);
	
	if( !$validation->fails()){
		if($db->update('link', $row->id,[
			'url' => $_POST['url'],
			'link' => $_POST['link']
		]))
		{
			echo"<script> 
					alert('You have updated successfully ')
			</script>";
		}else{
			echo"<script> 
				alert('You have  not updated successfully!')
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
				<h2>Edit Important Link</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('url') != null ? ' has-error' : ''?>"> 
					
						<label for="url" class="control-label">Add Link url</label>
						
						<input id="url" type="text" name="url" class="form-control" value="<?php echo $row->url;?>"/>
						
						<?php echo $errorHandaler->first('url') != null ? '<p class="help-block">'. $errorHandaler->first('url') .'</p>' : ''?>
						
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('link') != null ? ' has-error' : ''?>"> 
					
						<label for="link" class="control-label">Add Link Name</label>
						
						<input id="link" type="text" name="link" class="form-control" value="<?php echo $row->link;?>"/>
						
						<?php echo $errorHandaler->first('link') != null ? '<p class="help-block">'. $errorHandaler->first('link') .'</p>' : ''?>
						
					</div>
					
					<input type="hidden" value="<?php echo $row->id?>">
					<div class="form-group"> 
						
						<input type="submit" value="Submit" class="btn btn-default" />
						
					</div>
					
				</form>

				<a href="link.php">Back</a>
			</div>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>