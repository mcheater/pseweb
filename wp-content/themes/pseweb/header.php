<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="EN"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="EN"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="EN"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="EN"><!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title><?php wp_title(''); ?></title>

	<!-- META -->
	<!--[if lt IE 9]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="640">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php include('vars.php'); ?>

	<link rel="apple-touch-icon" href="<?php echo $theme_path; ?>/images/pieces/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $theme_path; ?>/images/pieces/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $theme_path; ?>/images/pieces/apple-touch-icon.png" />
	<link rel="shortcut icon" href="<?php echo $theme_path; ?>/favicon.ico">

	<link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">


	<?php wp_head(); ?>

	<!-- IE Stuff -->
	<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lt IE 8]><script src="<?php echo $theme_path; ?>/scripts/ie.js"></script><![endif]-->

</head>

<body <?php body_class('clearfix'); ?>>

	<?php include('assets/includes/pushy-nav.php'); ?>

	<!-- Site Overlay -->
	<div class="site-overlay"></div>

	<nav id="topnav">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!-- Mobile Navigation -->
					<div class="mobile">
						<a class="menu-btn">
							<span class="icon-mobile-nav"><span class="hidden">Show Menu</span></span>
							<span class="icon-close"><span class="hidden">Hide Menu</span></span>
						</a>
						<?php
							if( is_home() ) {
								echo "<h1><span>#</span>PSEWEB</h1>";
							} else {
								echo "<h2><a href=\"$site_url\"><span>#</span>PSEWEB</a></h2>";
							}
						?>
					</div>

					<!-- Desktop Navigation -->
					<div class="desktop">
						<?php
							// MAIN NAVIGATION
							$args = array(
									'theme_location'	=> 'top-nav',
									'items_wrap'		=> '<ul class="navigation">%3$s</ul>',
									'container'			=> false,
							);
							wp_nav_menu( $args );
						?>
						<ul class="social">
							<?php
								if ( $twitter != null ) {
									echo "<li><a href=\"http://twitter.com/$twitter\"><span class=\"icon-twitter-box\"></span><span class=\"hidden\">Follow us on Twitter</span></a></li>";
								}
								if ( $facebook != null ) {
									echo "<li><a href=\"$facebook\"><span class=\"icon-facebook-box\"></span><span class=\"hidden\">Follow us on Facebook</span></a></li>";
								}
								if ( $gplus != null ) {
									echo "<li><a href=\"$gplus\"><span class=\"icon-gplus-box\"></span><span class=\"hidden\">Follow us on Google Plus</span></a></li>";
								}
								if ( $instagram != null ) {
									echo "<li><a href=\"$instagram\"><span class=\"icon-instagram-box\"></span><span class=\"hidden\">Follow us on Instagram</span></a></li>";
								}
								echo "<li><a href=\"$site_url/feed\"><span class=\"icon-rss-box\"></span><span class=\"hidden\">Subscribe to our RSS Feed</span></a></li>";
							?>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</nav>

	<!-- Your Content -->
	<div id="container">

		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<div class="site-title">
							<?php
								if( is_home() ) {
									echo "<h1><span>#</span>PSEWEB</h1>";
								} else {
									echo "<h2><a href=\"$site_url\"><span>#</span>PSEWEB</a></h2>";
								}
							?>
						</div>

						<div class="search">
							<form class="searchform" method="get" action="<?php echo $site_url; ?>">
								<label style="display:none;" for="n">Search <?php echo $site_name; ?></label>
								<input type="text" value="Search <?php echo $site_name; ?>" name="s" id="n" onfocus="if (this.value == 'Search <?php echo $site_name; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search <?php echo $site_name; ?>';}" />
								<button name="submit" class="icon-search" type="submit" title="Search <?php echo $site_name; ?>"></button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</header>