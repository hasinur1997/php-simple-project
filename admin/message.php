<?php require_once('inc/header.php');
require_once('core/init.php');
$errorHandaler = new ErrorHandaler;
$db = DB::getInstance();


?>
<script> 
 function delete_confirm(){
 	return confirm('Are you sure, wanto delete this ?');
 }
</script>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	
	<div class="content"> 

		<div class="view-notice"> 

			<div class="add-content"> 
			<h2>Messages</h2>

			 <table class="table table-bordered">
			 	<thead>
			 		<tr>
			 			<th>SL No</th>
			 			<th>Subject</th>
			 			<th>Sender Name</th>
			 			<th>Sender Email</th>
			 			<th>Date</th>
			 			<th>Action</th>
			 		</tr>
			 	</thead>

			 	<tbody>

						<?php 
							$i = 1;
							foreach ($db->fetchAll('message')->result() as $row) {


								

							?>
								<tr>
				 			<td><?php echo $i?></td>
				 			<td><?php echo $row->subject;?></td>
				 			<td><?php echo $row->name;?></td>
				 			<td><?php echo $row->email;?></td>
				 			<td><?php 
				 				$date = $row->date;
				 				echo $date = date('j F, Y', strtotime($row->date));

				 			?></td>
				 			<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>">View Details</a> | <a onclick="return delete_confirm()" href="delete-message.php?delete=<?=$row->id?>">Delete</a>

								<div class="modal fade" id="myModal<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header"> 
								        <h4 class="modal-title" id="myModalLabel"><?php echo $row->subject;?></h4>
								      </div>
								      <div class="modal-body">
								       <p><?php echo $row->message;?></p>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
								      </div>
								    </div>
								  </div>
								</div>
				 			</td>
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


</div>

	



<?php require_once('inc/footer.php');?>