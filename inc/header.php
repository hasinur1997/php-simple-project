<?php 
	require_once'admin/core/inita.php';
	$db = DB::getInstance(); 
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	
	<title><?php echo $title;?></title>
	
<!-- CSS -->
	
	<link rel="icon" type="image/png" href="images/diversity2_0_0.jpg">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />

	
</head>
<body>
	<div class="wrap"> 
	<!-- Header Area -->
	 <div class="header-area"> 
		<div class="container">
			<div class="row">
				<div class="col-md-4"> 
					<div class="logo"> 

						<a href="index.php"><img src="images/logo1.png" alt=""  /></a>
						

					</div>
				</div>
				<div class="col-md-8">
					<div class="header-text text-center">
						<h2>Pabna Polytechnic Institute,Pabna.</h2>
					</div>
				</div>
			</div>
		</div>
	 </div>
	 
	<nav id="nav" class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<ul class="pull-right nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a> 
				<ul>
					<li><a href="mision.php">Mission And Vision</a></li>
					<li><a href="principle.php">Message From Principle</a></li>
					<li><a href="viceprinciple.php">Message From Vice Principle</a></li>
					<li><a href="administrative.php">Administrative</a></li>
				</ul>
			</li>
			<li><a href="teachers.php">Teachers</a> 
				<ul>
					<?php 
						foreach($db->fetchAll('student_page')->result() as $item){

							?>
								<li><a href="teachers-page.php?teacher=<?=$item->page_title;?>"><?php echo $item->page_title?></a></li>

							<?php

						}
					?>
				</ul>
			</li>
			<li><a href="student.php">Students</a>
				<ul>
					<?php 
						foreach($db->fetchAll('student_page')->result() as $item){

							?>
								<li><a href="student-page.php?department=<?=$item->page_title;?>"><?php echo $item->page_title?></a></li>

							<?php

						}
					?>

					
				</ul>
			</li>
			<li><a href="academic.php">Academic</a> 
				<ul>
					<li><a href="syllabus.php">Syllabus</a></li>
						<li><a href="routine.php">Class Routine</a></li>
						<li><a href="result.php">Result</a></li>
						<li><a href="calender.php">Academic Calender</a></li>
				</ul>
			</li>
			<li><a href="notice.php">Notice</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		</ul>
		</div>
	</nav>