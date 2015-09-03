<?php get_header(); ?>

	<div id="wrapper">
		<header id="header">
			<img class="header-bg" src="<?php echo get_stylesheet_directory_uri() . '/image/header_bg.jpg' ?>" alt="Background images"/>
			<div class="logo container-fluid">
				<a href="<?php echo home_url(); ?>">
					<span>Waltzsoft</span>
				</a>
			</div>
		</header>

		<main id="main">
			<div class="container">
				<div class="intro">
					<p> We working together with private clients & international companies to create great</p>
					<p class="solutions">
						Mobile application, Mobile & Server solutions
					</p>
				</div>
			</div>

		</main>

		<footer id="footer">
			<div class="container">
				<div class="line"></div>
				<div class="row">
					<div class="col-xs-4">
						<p>Have a project in mind?</p>
						<a href="mailto:info@waltzsoft.com">info@waltzsoft.com</a>
					</div>
					<div class="col-xs-4">
						<p>Looking for a job?</p>
						<a href="mailto:hr@waltzsoft.com">hr@waltzsoft.com</a>
					</div>
					<div class="col-xs-4">
						<p>Follow us on</p>
						<div class="socials">
							<a class="facebook" href="#">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
					</div>
				</div>
				
			</div>
		</footer>
	</div>

<?php get_footer(); ?>