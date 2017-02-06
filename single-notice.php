	<?php 
		$title = 'Notice';
		if(isset($_GET['notice'])){
			$id = $_GET['notice'];
		}else{
			header('location:notice.php');
		}
		require_once("inc/header.php");
		$db = DB::getInstance();

		$data = $db->get('notice', ['id', '=', $id])->first();
	?>

	
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-8"> 
			
				
				<div class="content-area">  
					<div class="notice-title"> 
						<h2><?php echo $data->title?></h2>
					</div>
					<div class="notice-description"> 
						<h3>Posted On <?php echo date('j F, Y', strtotime($data->date));?></h3>
						<p> 
							<?php 
						echo $data->description;
						?>
						</p>
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