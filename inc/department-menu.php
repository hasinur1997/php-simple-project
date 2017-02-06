<ul class="nav">
	<?php 
	foreach($db->fetchAll('student_page')->result() as $item){
		?>
			<li >

			<a href="student-page.php?department=<?=$item->page_title;?>"><?php echo $item->page_title?></a></li>
		<?php
	}
?>
</ul>

