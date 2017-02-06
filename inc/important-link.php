<?php $db = DB::getInstance()?>
<div class="link"> 
	<h2>Important Link</h2>
	<ul class="nav">
		<?php foreach($db->fetchAll('link')->result() as $row){
			?>
				<li><a target="_blank" href="http://<?php echo $row->url?>"><i class="fa fa-angle-right"></i><?php echo $row->link;?></a></li>
			<?php
		
		}?>
		
		

	</ul>
</div>