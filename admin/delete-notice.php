<?php require_once('inc/header.php');

		

require_once('core/init.php');
$db = DB::getInstance();
$data = $db->get('notice', ['id', '=', $id])->first();

	if(isset($_GET['delete'])){
			$id = $_GET['delete'];
		}else{
			header('location:notice.php');
		}

	$db->delete('notice', [
			'id', '=', $id
		]);
	header('location:notice.php');