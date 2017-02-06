<?php 

require_once('inc/header.php');



?>
<div class="content-area"> 
	<?php require_once('inc/left-menu.php');?>
	<div class="content"> 
		<div class="container-fluid"> 
			<div class="row"> 
				
			<div class="col-md-6">
				<div class="add-content"> 
				<h2>Upload Logo</h2>
				<?php
				$errorHandaler = new ErrorHandaler;
				$user = new User();
				if(isset($_POST['img-submit']))
				{
					$validate  = new Validator($errorHandaler);

					$validation = $validate->check($_FILES, [
						'image' => [
							//'required' => true,
							'imagesize' => 1,
							'imageformate' => 'jpg,png,jpeg,gif'
						]
					]);

					print_r($validate->errors()->all());
				}
				?>
				<form action="" method="POST" enctype="multipart/form-data"> 
					
					<div class="form-group logo-submit"> 
						<input type="file" id="exampleInputFile" class="form-control" name="image"/>
					</div>
					<div class="form-group"> 
						<input type="submit" name="img-submit" value="Submit" class="btn btn-default"/>
					</div>
				</form>
				</div>
			</div>
		
			<div class="col-md-6">
				<div class="add-content"> 
				<h2>Add Header Text</h2>
				<form action="" method="POSt"> 
					<div class="form-group"> 
						<input type="text" name="header-text" class="form-control"/>
					</div>
					<div class="form-group"> 
						<input type="submit" class="btn btn-default" value="Submit"/>
					</div>
				</form>
				</div>
			</div>
			<div class="col-md-6"></div>
			<div class="col-md-6"> 
				<div class="add-content"> 
					<h2>Select a logo</h2>
					
						<div class="row"> 
							<div class="col-md-4 "> 
								<a href=""><img src="../images/logo1.png" class="img-responsive img-border active" alt="image"></a>
							</div>
							<div class="col-md-4 "> 
								<a href=""><img src="../images/logo1.png" class="img-responsive img-border" alt="image"></a>
							</div>
							<div class="col-md-4 "> 
								<a href=""><img src="../images/logo1.png" class="img-responsive img-border" alt="image"></a>
							</div>
						</div>
					
				</div>
			</div>

			</div>
		</div>
	</div>
</div>


<?php require_once('inc/footer.php');?>