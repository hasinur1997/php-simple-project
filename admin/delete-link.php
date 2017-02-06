<?php require_once('inc/header.php');

		

require_once('core/init.php');
$db = DB::getInstance();
$data = $db->get('link', ['id', '=', $id])->first();

	if(isset($_GET['delete'])){
			$id = $_GET['delete'];
		}else{
			header('location:link.php');
		}

	$db->delete('link', [
			'id', '=', $id
		]);
	header('location:link.php');