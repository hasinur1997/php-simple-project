<?php 
	$title = 'Departments';

	if(isset($_GET['teacher'])){
		$teacher = $_GET['teacher'];

	}

	require_once('inc/header.php' );
	$db = DB::getInstance();
?>

	
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-3"> 
				<div class="sidebar-nav"> 
					<h2>Departments</h2>
					<ul class="nav">
						<?php 
						foreach($db->fetchAll('student_page')->result() as $item){

							?>
								<li><a href="teachers-page.php?teacher=<?=$item->page_title;?>"><?php echo $item->page_title?></a></li>

							<?php

						}
					?>
					</ul>
				</div>
			</div>
			
			<div class="col-md-9"> 
				<div class="about-us-content">
					<div class="instructor"> 
						<h2>Teachers of (<?php echo $db->get('teacher',['department', '=', $teacher])->first()->department; ?>)Department</h2>
						<?php 
							foreach ($db->get('teacher', ['department', '=', $teacher])->result() as $row) {
								?>
									
								<div class="col-md-4"> 
									<div class="single-instructor"> 
										<img src="admin/uploads/<?php echo $row->picture;?>" alt="">
										<h3><?php echo $row->name;?></h3>
										<p><?php echo $row->designation;?></p>
									</div>
								</div>

								<?php
							}
						?>

					</div>

				</div>
			</div>
			
		</div>
	</div>
	
	
	
<?php 
	require_once('inc/footer.php');
?>