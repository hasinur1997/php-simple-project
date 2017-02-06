	
	<div class="footer-area"> 
		<div class="container"> 
			<div class="row"> 
				<div class="footer"> 
					<div class="col-md-8"> 
						<div class=""> 
							<p><span>Call us: 0731-7588</span> <span>Pabna Polytechnic Institute, Pabna.</span><span>Email: pabanapoly@gmail.com</span></p>
						</div>
					</div>
					<div class="col-md-4"> 
						<div class="social-icon">
							<ul class="pull-right">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row"> 
				<div class="footer-bottom"> 
					<div class="col-md-10"> 
						<p>&copy;2016-Copyright All right reserved, PPI <br>
						Designed and Developed By Hasinur Rahman
						</p>
					</div>
					<div class="col-md-2"> 
						<div class="top-icon">
							<i class="fa fa-angle-up pull-right top"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<!-- JS -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/camera.min.js"></script>
	<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.newsTicker.min.js"></script>
	
	
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	
	<script> 
		jQuery(function(){
			
			

			
			
			$('.newsticker').newsTicker({
				row_height: 48,
				max_rows: 7,
				speed: 600,
				direction: 'up',
				duration: 4000,
				autostart: 1,
				pauseOnHover: 1
			});
			
			// scroll to top
			$('.top').click(
				function () {
					$('html, body').animate({scrollTop: '0px'},800);
				}
			);
			
			// Carosel
			$(".owl-carousel").owlCarousel({
				animateOut: 'slideOutDown',
				animateIn: 'flipInX',
				items:3,
				margin:10,
				stagePadding:40,
				smartSpeed:450,
				autoPlay:true,
			});
			
			$('#slider').camera({
				fx:'curtainSliceRight',
				imagePath: 'images/',
				height:'35%',
				pagination:false,
				
			});
		});
	</script>
</body>
</html>