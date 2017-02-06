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
		'link' => [
			'required' => true
		]

	]);
	
	if( !$validation->fails()){
		if($db->insert('link',[
			'url' => $_POST['url'],
			'link' => $_POST['link']
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
				
					<div class="form-group<?php echo $errorHandaler->first('url') != null ? ' has-error' : ''?>"> 
					
						<label for="url" class="control-label">Add Link url</label>
						
						<input id="url" type="text" name="url" class="form-control"/>
						
						<?php echo $errorHandaler->first('url') != null ? '<p class="help-block">'. $errorHandaler->first('url') .'</p>' : ''?>
						
					</div>
					
					<div class="form-group<?php echo $errorHandaler->first('link') != null ? ' has-error' : ''?>"> 
					
						<label for="link" class="control-label">Add Link Name</label>
						
						<input id="link" type="text" name="link" class="form-control"/>
						
						<?php echo $errorHandaler->first('link') != null ? '<p class="help-block">'. $errorHandaler->first('link') .'</p>' : ''?>
						
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
		  			<th>Link Name</th>
		  			<th>Link URL</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody> 
				<?php 
					$i = 1;
					foreach($db->fetchAll('link')->result() as $row){
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $row->link;?></td>
							<td><?php echo $row->url;?></td>
							<td><a href="link-edit.php?edit=<?=$row->id?>">Edit</a> | <a href="delete-link.php?delete=<?=$row->id?>" onclick="return delete_confirm()">Delete</a></td>
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