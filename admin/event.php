
<?php require_once('inc/header.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'title' => [
			'required' => true,
		],
		'description' => [
			'required' => true
		]

	]);
	
	if( !$validation->fails()){
		date_default_timezone_set("Asia/Dhaka");
		if($db->insert('event',[
			'title' => $_POST['event-title'],
			'description' => $_POST['event-description'],
			'date' => date('Y-m-d H:i:s')
		]))
		{
			echo"<script> 
					alert('You have added successfully !');
			</script>";
		}else{
			echo"<script> 
				alert('You have not added successfully!');
			</script>";
		}
	}
}



?><?php require_once('inc/header.php');?>
<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	
	<div class="content"> 
		<div class="event"> 
			<div class="add-content"> 
				<h2>Add Event</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('event-title') != null ? ' has-error' : '';?>">
						<label for="event-title" class="control-label">Event Title</label>

						<?php echo $errorHandaler->first('event-title') != null ? '<p class="help-block">'. $errorHandaler->first('event-title') .'</p>' : ' ';?>

						<input type="text" id="event-title" class="form-control" name="event-title"/>
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('event-description') != null ? ' has-error' : '';?>">

						<label for="event-description" class="control-label">Event Description</label>

						<?php echo $errorHandaler->first('event-description') != null ? '<p class="help-block">'. $errorHandaler->first('event-description') .'</p>' : ' ';?>

						<textarea name="event-description" class="form-control" id="" cols="30" rows=" "></textarea>

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
									var editor = CKEDITOR.replace( 'event-description' );
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

		<div class="view-event">
			<div class="add-content"> 
			 <h2>View All Event</h2>
			 <table class="table table-bordered">
			 	<thead>
			 		<tr>
			 			<th>SL No.</th>
			 			<th>Event Title</th>
			 			<th>Date</th>
			 			<th>Action</th>
			 		</tr>
			 	</thead>
			 	<tbody> 
					<?php 
						$i = 1;
						foreach($db->fetchAll('event')->result() as $row){

							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row->title;?></td>
								<td><?php  
									echo date('j F, Y', strtotime($row->date));
								?>
									
								</td>
								<td><a href="">View</a> | <a href="">Edit</a> | <a href="">Delete</a></td>
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