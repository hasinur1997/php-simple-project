<?php 
	$db = DB::getInstance();
?>

<div class="event"> 
	<h2>Latest Event</h2>
	<ul class="nav">
		<?php 
			foreach($db->fetchAll('event')->result() as $row){

				?>

				<li><a href=""><i class="fa fa-angle-right"></i><?php echo $row->title?></a></li>

				<?php

			}
		?>
		
		

	</ul>
</div>