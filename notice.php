s	<?php 
		$title = 'Notice';
		require_once("inc/header.php");
		$db = DB::getInstance();
		$currentPage = isset($_GET['page'])? $_GET['page'] : 1;
		$paginator = new Paginator($db->totalRow('notice'), 15, $currentPage, '?page=(:num)');
	?>

	
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-8"> 
			
				
				<div class="content-area">  
					<ul class="list-group">
						<?php 
							
							foreach($db->getLimit('notice',$paginator->limitStart(), $paginator->limitEnd()) as $row){
							
								?>
								
								 <li class="list-group-item"><span class="date"><?php echo date('j F, Y', strtotime($row->date));?></span><?php echo $row->title;?><span class="badge"><a href="single-notice.php?notice=<?=$row->id;?>">View</a></span></li>
								
								<?php
							}
						?>
					
					 
					  
					</ul>
					
					<div class="pagination"> 
						<?php echo $paginator->toHTML();?>
					</div>
				</div>
				
				
			</div>
			
			<div class="col-md-4"> 
				<?php 
					require_once'inc/latest-notice.php';
					require_once'inc/important-link.php';
					require_once'inc/latest-event.php';
				?>
			</div>
			
		</div>
	</div>

	
	
<?php 
	require_once("inc/footer.php");
?>