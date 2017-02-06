<?php 
require_once('inc/header.php');
$user = new User();

$db = DB::getInstance();

?>

<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="add-content"> 
			<h2>Welcome To Pabna Polytechnic Institute Website Admin Panel </h2>
			<?php  print_r($user->user()) ;?>
			<?php print_r($_SESSION);?>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et iaculis neque. Nam sodales volutpat turpis, at adipiscing sem ornare sed. Nullam molestie ac lorem sit amet viverra. Etiam blandit nibh nisi, quis sodales lectus rhoncus fringilla. Nam velit orci, auctor vel mollis et, lobortis in quam. Vivamus vehicula commodo dolor. Quisque nec nunc vitae nisl ornare tempor. Donec semper nisl ac nisl ullamcorper volutpat. Donec in iaculis nisl, vel volutpat tellus. Curabitur sit amet ultricies libero, in tempus nulla. Quisque id nunc sed sapien eleifend faucibus eget vitae neque.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et iaculis neque. Nam sodales volutpat turpis, at adipiscing sem ornare sed. Nullam molestie ac lorem sit amet viverra. Etiam blandit nibh nisi, quis sodales lectus rhoncus fringilla. Nam velit orci, auctor vel mollis et, lobortis in quam. Vivamus vehicula commodo dolor. Quisque nec nunc vitae nisl ornare tempor. Donec semper nisl ac nisl ullamcorper volutpat. Donec in iaculis nisl, vel volutpat tellus. Curabitur sit amet ultricies libero, in tempus nulla. Quisque id nunc sed sapien eleifend faucibus eget vitae neque.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et iaculis neque. Nam sodales volutpat turpis, at adipiscing sem ornare sed. Nullam molestie ac lorem sit amet viverra. Etiam blandit nibh nisi, quis sodales lectus rhoncus fringilla. Nam velit orci, auctor vel mollis et, lobortis in quam. Vivamus vehicula commodo dolor. Quisque nec nunc vitae nisl ornare tempor. Donec semper nisl ac nisl ullamcorper volutpat. Donec in iaculis nisl, vel volutpat tellus. Curabitur sit amet ultricies libero, in tempus nulla. Quisque id nunc sed sapien eleifend faucibus eget vitae neque.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et iaculis neque. Nam sodales volutpat turpis, at adipiscing sem ornare sed. Nullam molestie ac lorem sit amet viverra. Etiam blandit nibh nisi, quis sodales lectus rhoncus fringilla. Nam velit orci, auctor vel mollis et, lobortis in quam. Vivamus vehicula commodo dolor. Quisque nec nunc vitae nisl ornare tempor. Donec semper nisl ac nisl ullamcorper volutpat. Donec in iaculis nisl, vel volutpat tellus. Curabitur sit amet ultricies libero, in tempus nulla. Quisque id nunc sed sapien eleifend faucibus eget vitae neque.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et iaculis neque. Nam sodales volutpat turpis, at adipiscing sem ornare sed. Nullam molestie ac lorem sit amet viverra. Etiam blandit nibh nisi, quis sodales lectus rhoncus fringilla. Nam velit orci, auctor vel mollis et, lobortis in quam. Vivamus vehicula commodo dolor. Quisque nec nunc vitae nisl ornare tempor. Donec semper nisl ac nisl ullamcorper volutpat. Donec in iaculis nisl, vel volutpat tellus. Curabitur sit amet ultricies libero, in tempus nulla. Quisque id nunc sed sapien eleifend faucibus eget vitae neque.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere </p>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>