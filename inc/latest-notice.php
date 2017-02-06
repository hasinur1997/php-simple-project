<?php
	$db = DB::getInstance();
?>
<div class="latest-notice"> 
	<h2 class="text-center">Latest Notice</h2>
	<div class="notice"> 
		<ul class="newsticker nav">
		<?php 
			foreach($db->fetchAll('notice')->result() as $row){

				?>
					<li>

					<a href="single-notice.php?notice=<?=$row->id;?>"> 
							
							<?php 
							 

							 echo $row->title;
							?>
							<br>
							<span class="notice-date"><?php echo date('j F, Y', strtotime($row->date));?></span>
					</a></li>
				<?php
			}
		?>
		

		

		
	</ul>
	</div>
</div>