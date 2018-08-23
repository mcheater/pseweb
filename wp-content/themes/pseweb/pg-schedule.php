<?php
	/*
	Template Name: Schedule
	*/

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

		<div class="col-lg-12 content">

			<?php

				the_content();

				if( have_rows('schedule') ):
					while ( have_rows('schedule') ) : the_row();

						if ( get_row_layout() == 'date_header' ){
							$date = get_sub_field('date');
							echo "<h2>$date</h2>";
						}

						if ( get_row_layout() == 'pre_session_schedule' ){
							include('assets/schedule/pre-sessions.php');
						}

						if ( get_row_layout() == 'session_schedule' ){
							include('assets/schedule/sessions.php');
						}

					endwhile;
				endif;

				include('sharing.php');

			?>
		</div>

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