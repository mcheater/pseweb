<?php
	include('header.php');
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if ( $speakers_title != null ) {
						echo "<h1>$speakers_title</h1>";
					} else {
						echo "<h1>Our Speakers</h1>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row speakers-list">
		<div class="clearfix">
			<?php

				$args=array(
						'post_type'			=> 'pse-speakers',
						'posts_per_page'	=> -1,
						'order'				=> 'ASC',
						'meta_key'			=> 'last_name',
						'orderby'			=> 'meta_value',
						'tax_query'			=> array(
							array(
								'taxonomy'	=> 'speaker-year',
								'field'		=> 'id',
								'terms'		=> $speaker_year,
						),
					),
				);

				$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) : $the_query->the_post();

				$post_title			= get_the_title();
				$first_name			= get_field('first_name');
				$last_name			= get_field('last_name');
				$job_title			= get_field('job_title');
				$organization		= get_field('organization');
				$profile_photo		= get_field('profile_photo');
				$email				= get_field('email_address');

			?>

			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
				<div class="speaker-item equalheight">
					<a href="<?php the_permalink(); ?>">
						<?php

							// Profile Photo
							if ( $profile_photo != null ) {
								echo wp_get_attachment_image($profile_photo, 'speaker-photo');
							}
							else {
								echo get_avatar( $email, 350 );
							}

							// Post Title
							echo "<h2>$post_title</h2>";

							// Job Title
							if ( $job_title != null ) {
								echo "<p>$job_title, $organization</p>";
							}

						?>
					</a>
				</div>
			</div>

			<?php
				endwhile;
				wp_reset_query();
			?>

		</div>

		<?php include('sharing.php'); ?>

	</div>
</div> <!-- end container -->

<?php

	$speaker_footer_default = get_field('speaker_footer_default', 'option');
	if ( $speaker_footer_default == 'Custom' ) {
		include('assets/footer/speakers.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>