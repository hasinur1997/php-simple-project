<?php
	$menus = [
		[
			'link' => 'index.php',
			'name'  => 'Dashboard'
		],
		[
			'link' => 'header-content.php',
			'name'  => 'Header-Content'
		],
		[
			'link' => 'footer-content.php',
			'name'  => 'Footer Content'
		],
		[
			'link' => 'home-page.php',
			'name'  => 'Home Page Content'
		],
		[
			'link' => '#',
			'name'  => 'About-Content'
		],
		[
			'link' => 'student.php',
			'name'  => 'Add Student'
		],
		[
			'link' => 'add-teacher.php',
			'name'  => 'Add Teacher'
		],
		[
			'link' => 'student-page.php',
			'name'  => 'Add Student Page Title'
		],
		[
			'link' => 'notice.php',
			'name'  => 'Add Notice'
		],
		[
			'link' => 'event.php',
			'name'  => 'Add Event'
		],
		[
			'link' => 'link.php',
			'name'  => 'Important Link'
		],
		[
			'link' => 'message.php',
			'name'  => 'Message'
		],
		
	];

?>
	<div class="left"> 
		<ul class="nav">
			<?php foreach($menus as $item) :?>
			<li<?php echo $item['link'] == basename($_SERVER['PHP_SELF']) ? ' class="dashboard"' : '';?>><a href="<?=$item['link'];?>"><?=$item['name'];?></a></li>
			<?php endforeach;?>
			
		</ul>
	</div>