	<?php 
		$title = 'Home';
		require_once("inc/header.php");
		$db = DB::getInstance();
	?>

	
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-8"> 
			
				<div class="slider-area"> 
					<div id="slider" class="pattern_1">
	
						<div data-src="images/1.jpg"></div>
						<div data-src="images/2.jpg"></div>
						<div data-src="images/3.jpg"></div>
						<div data-src="images/4.jpg"></div>
						<div data-src="images/5.jpg"></div>
					
					</div>
				</div>
				
				<div class="content-area">  
					<div class="welcome"> 
					<h2>Welcome !to Pabna Polytechnic Institute <br />- Light through learning.  </h2>
					<p>welcome  is a historical polytechnic institute. This institute is playing a vital role in Technical sector of Bangladesh which runs under Bangladesh Technical Education Board. Its history begins in 1924 when the Landlord of Trash Mr. Shri Banomali Roy founded a technical school at the right side of the Nagarabari highway in Pabna named “BL Eliot Technical School”. In the decade of 1960’s, Government of East Pakistan established many Polytechnic Institute in different district of East Pakistan under Five-Year Plan . As part of the plan in 1962 that technical</p>
					<p><strong>Our Programs:</strong> unique in nature. Our students evaluate us as unconventional and extraordinary in the teaching strategies we adhere to. For every program we have scientifically designed course curriculum and study materials – that really make us distinguished.</p>
					<p><strong>Our Faculty:</strong> our strength. Our faculty body consists of experienced, erudite and trained teachers. We pay equal importance to teaching skills, personal and academic background and experience. From a large number of prospective qualified teachers, only outstanding performers are finally selected as teaching assistants who gradually obtain the position of an honorable faculty.</p>
				</div>
				</div>
				
				<div class="photo-gallery"> 
					<h2>Photo Gallery</h2>
					<div class="owl-carousel">
						
						<div> 
							<img src="images/service1.jpg" alt="" /> 
							<div class="overlay"> 
								<div class="icon"> 
									<i class="fa fa-search"></i>
									<i class="fa fa-link"></i>
								</div>
							</div>
						</div>

						<div> 
							<img src="images/service2.jpg" alt="" /> 
							<div class="overlay"> 
								<div class="icon"> 
									<i class="fa fa-search"></i>
									<i class="fa fa-link"></i>
								</div>
							</div>
						</div>
						
						<div> 
							<img src="images/service3.jpg" alt="" /> 
							<div class="overlay"> 
								<div class="icon"> 
									<i class="fa fa-search"></i>
									<i class="fa fa-link"></i>
								</div>
							</div>
						</div>
						
						<div> 
							<img src="images/service4.jpg" alt="" /> 
							<div class="overlay"> 
								<div class="icon"> 
									<i class="fa fa-search"></i>
									<i class="fa fa-link"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-4"> 
				<?php 
					require_once 'inc/latest-notice.php';
					require_once 'inc/important-link.php';
					require_once 'inc/latest-event.php';

				?>
				
				
				

			</div>
			
		</div>
	</div>

	
	
<?php 
	require_once("inc/footer.php");
?>