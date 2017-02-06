
<?php require_once('inc/header.php');

		if(isset($_GET['notice'])){
			$id = $_GET['notice'];
		}else{
			header('location:notice.php');
		}

require_once('core/init.php');
$db = DB::getInstance();
$data = $db->get('notice', ['id', '=', $id])->first();

?>
<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	
	<div class="content"> 
		<div class="notice"> 
			<div class="add-content"> 
				<h2><?php echo $data->title;?></h2>
				<h3>Posted On <?php echo date('j F, Y', strtotime($data->date));?></h3>
				<p><?php echo $data->description;?></p>
				<a href="notice.php">Back to Notice</a>
			</div>
		</div>

		</div>
	</div>


</div>

	



<?php require_once('inc/footer.php');?>