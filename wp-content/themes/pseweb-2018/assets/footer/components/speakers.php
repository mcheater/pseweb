<div class="container sections section-speakers">

	<div class="row heading">
		<div class="col-lg-12">
			<?php
				if ( $speakers_title != null ) {
					echo "<h3><span>$speakers_title</span></h3>";
				} else {
					echo "<h3><span>Our Speakers</span></h3>";
				}
			?>
			<p class="headinglink"><a href="<?php echo $site_url; ?>/speakers/">View more speakers</a></p>
		</div>
	</div>

	<div class="row">

		<?php

			$args=array(
				'post_type'		=> 'pse-speakers',
				'showposts'		=> 4,
				'orderby'		=> 'rand',
				'tax_query'			=> array(
					array(
						'taxonomy'	=> 'speaker-year',
						'field'		=> 'id',
						'terms'		=> $speaker_year,
					),
				)
			);

			$the_query = new WP_Query( $args );
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i > 3) {
				$speakersHide = 'col-lg-3 col-md-3 col-sm-3 col-xs-6 hide-below-768';
			} elseif ($i > 2) {
				$speakersHide = 'col-lg-3 col-md-3 col-sm-3 col-xs-6 hide-below-640';
			} else {
				$speakersHide = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
			}

			$post_title			= get_the_title();
			$first_name			= get_field('first_name');
			$last_name			= get_field('last_name');
			$job_title			= get_field('job_title');
			$organization		= get_field('organization');
			$profile_photo		= get_field('profile_photo');
			$email				= get_field('email_address');

		?>

				<div class="<?php echo $speakersHide; ?>">
					<div class="speaker-item">
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
								echo "<h4>$post_title</h4>";

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
</div> <!-- end container -->