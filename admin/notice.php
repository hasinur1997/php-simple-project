<?php require_once('inc/header.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();


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
		if($db->insert('notice',[
			'title' => $_POST['notice-title'],
			'description' => $_POST['description'],
			'date' => date('Y-m-d H:i:s')
			
		]))
		{
			echo"<script> 
					alert('You have added successfully ')
			</script>";
		}else{
			echo"<script> 
					alert('You have not added successfully ')
			</script>";
		}
	}
}

// view notice 




?>
<script> 
 function delete_confirm(){
 	return confirm('Are you sure, wanto delete this ?');
 }
</script>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	
	<div class="content"> 
		<div class="notice"> 
			<div class="add-content"> 
				<?php if(isset($messege)){
					echo $messege;
					}?>
				<h2>Add Notice</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('notice-title') != null ? ' has-error' : '';?>">

						<label for="notice-title" class="control-label">Notice Title</label>

						<?php echo $errorHandaler->first('notice-title') != null ? '<p class="help-block">'. $errorHandaler->first('notice-title') .'</p>' : ' ';?>

						<input type="text" id="notice-title" class="form-control" name="notice-title"/>
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('description') != null ? ' has-error' : '';?>">

						<label for="description" class="control-label">Notice Description</label>

						
						<?php echo $errorHandaler->first('description') != null ? '<p class="help-block">'. $errorHandaler->first('description') .'</p>' : '';?>


						<textarea name="description" class="form-control" id="description" cols="30" rows=" "></textarea>
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
							<input type="submit" value="Submit" class="btn btn-default" />
					</div>
					
				</form>
			</div>
		</div>


		<div class="view-notice"> 

			<div class="add-content"> 
			 <h2>View All notice</h2>

			 <table class="table table-bordered">
			 	<thead>
			 		<tr>
			 			<th>SL No</th>
			 			<th>Title</th>
			 			<th>Date</th>
			 			<th>Action</th>
			 		</tr>
			 	</thead>

			 	<tbody>

						<?php 
							$i = 1;
							foreach ($db->fetchAll('notice')->result() as $row) {


								

							?>
								<tr>
				 			<td><?php echo $i?></td>
				 			<td><?php echo $row->title;?></td>
				 			<td><?php 
				 				$date = $row->date;
				 				echo $date = date('j F, Y', strtotime($row->date));

				 			?></td>
				 			<td><a href="single-notice.php?notice=<?=$row->id;?>">View Details</a> | <a href="edit-notice.php?edit=<?=$row->id?>">Edit</a> | <a onclick="return delete_confirm()" href="delete-notice.php?delete=<?=$row->id?>">Delete</a></td>
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