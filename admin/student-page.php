<?php require_once('inc/header.php');
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();

if(!empty($_POST)){
	$validatior = new Validator($errorHandaler);
	$validation = $validatior->check($_POST, [
		'page_title' => [
			'required' => true
		],

	]);
	
	if( !$validation->fails()){
		if($db->insert('student_page',[
			'page_title' => $_POST['page_title']
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
<script> 
function delete_confirm(){
	return confirm('Are you sure want to delete this?');
}
</script>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="link"> 
			<div class="add-content"> 
				<h2>Add Important Link</h2>
				<form action="" method="POST"> 
				
					<div class="form-group<?php echo $errorHandaler->first('page_title') != null ? ' has-error' : ''?>"> 
					
						<label for="url" class="control-label">Add Page Title</label>
						
						<input id="url" type="text" name="page_title" class="form-control"/>
						
						<?php echo $errorHandaler->first('page_title') != null ? '<p class="help-block">'. $errorHandaler->first('page_title') .'</p>' : ''?>
						
					</div>
					
					<div class="form-group"> 
						
						<input type="submit" value="Submit" class="btn btn-default" />
						
					</div>
					
				</form>
			</div>
		</div>

		<div class="view-link"> 
		 <div class="add-content"> 
		  <h2>View All Link</h2>
		  <table class="table table-bordered">
		  	<thead>
		  		<tr>
		  			<th>SL No</th>
		  			<th>Page Title</th>
		  		</tr>
		  	</thead>
		  	<tbody> 
				<?php 
					$i = 1;
					foreach($db->fetchAll('student_page')->result() as $row){
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $row->page_title;?></td>
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