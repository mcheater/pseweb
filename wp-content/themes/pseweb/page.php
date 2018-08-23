<?php
	include('header.php');
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 content">
			<?php
				the_content();
				include('sharing.php');
			?>
		</div>

		<?php
			$sidebar_default = get_field('sidebar_default');
			if ( $sidebar_default == 'Custom' ) {
				include('assets/sidebars/pages.php');
			} else {
				include('assets/sidebars/global.php');
			}
		?>

	</div>
</div> <!-- end container -->

<?php
	endwhile;
	endif;
	wp_reset_query();

	$page_footer_default = get_field('page_footer_default', 'option');
	if ( $page_footer_default == 'Custom' ) {
		include('assets/footer/pages.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>