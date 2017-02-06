<?php require_once('inc/header.php');

		

require_once('core/init.php');
$db = DB::getInstance();
$data = $db->get('message', ['id', '=', $id])->first();

	if(isset($_GET['delete'])){
			$id = $_GET['delete'];
		}else{
			header('location:message.php');
		}

	$db->delete('message', [
			'id', '=', $id
		]);
	header('location:message.php');