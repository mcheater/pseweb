<?php
	$speakers_title		= get_sub_field('speakers_title', 'option');
	$speakers_shown		= get_sub_field('speakers_shown', 'option');
?>

<aside class="speakers">
	<h3><?php echo $speakers_title; ?></h3>

	<?php

		$args=array(
				'post_type'			=> 'pse-speakers',
				'posts_per_page'	=> $speakers_shown,
				'orderby'			=> 'rand',
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

	<div class="speaker">
		<a href="<?php the_permalink(); ?>">
			<div class="image">
				<?php
					// Profile Photo
					if ( $profile_photo != null ) {
						echo wp_get_attachment_image($profile_photo, 'speaker-photo');
					}
					else {
						echo get_avatar( $email, 350 );
					}
				?>
			</div>
			<h4><?php echo "$first_name $last_name"; ?></h4>
			<p><?php echo $job_title . ', ' . $organization; ?></p>
		</a>
	</div>

	<?php
		endwhile;
		wp_reset_query();
	?>

</aside>