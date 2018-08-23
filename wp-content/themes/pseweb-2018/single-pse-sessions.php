<?php
	include('header.php');
	if ( have_posts() ) : while ( have_posts() ) : the_post();

	$current_post		= get_the_ID();
	$date				= get_field('date');
	$final_date			= DateTime::createFromFormat('d/m/Y', $date);
	$start_hour			= get_field('start_hour');
	$start_min			= get_field('start_minute');
	$start_time			= "$start_hour:$start_min";
	$room				= get_field('room');
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if ( $sessions_title != null ) {
						echo "<h2>$sessions_title</h2>";
					} else {
						echo "<h2>The Sessions</h2>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-8 col-md-8 content">
			<div class="content speakers-sessions">
				<h1><?php the_title(); ?></h1>

				<div class="posttime">
					<?php

						// Date and Time
						if ( $date != null || $start_time != null ) {
							echo '<p>';
						}

							if ( $date != null ) {
								echo $final_date->format('l, F j, Y');
							}

							if ( $date != null && $start_time != null ) {
								echo ' at ';
							}

							if ( $start_time != null ) {
								echo ( date("g:i A", strtotime($start_time)) );
							}

						if ( $date != null || $start_time != null ) {
							echo '</p>';
						}

						// Room Number
						if ( $room != 'N/A' ) {
							echo "<p>Location: Room $room";
						}

					?>
				</div>

				<div class="postmeta">
					<?php the_terms( $post->ID, 'session-track', '<p>Track: ', ', ', '</p>' ); ?>
					<?php the_terms( $post->ID, 'session-tags', '<p>Tags: ', ', ', '</p>' ); ?>
				</div>

				<?php the_content(); ?>
			</div>

			<?php
				// Speaker Relationship
				$speakers = get_field('speaker');
				if( $speakers ):
			?>
				<div class="speaker-relation">
					<h2>Presented by</h2>

					<?php
						foreach( $speakers as $s ):

						$post_title			= get_the_title($s->ID);
						$post_link			= get_permalink($s->ID);
						$first_name			= get_field('first_name', $s->ID);
						$last_name			= get_field('last_name', $s->ID);
						$job_title			= get_field('job_title', $s->ID);
						$organization		= get_field('organization', $s->ID);
						$profile_photo		= get_field('profile_photo', $s->ID);
						$email				= get_field('email_address', $s->ID);
					?>

					<div class="speaker-item equalheight">
						<a href="<?php echo $post_link; ?>">
							<?php

								// Profile Photo
								if ( $profile_photo != null ) {
									echo wp_get_attachment_image($profile_photo, 'speaker-photo');
								}
								else {
									echo get_avatar( $email, 350 );
								}

								// Post Title
								echo "<h3>$post_title</h3>";

								if ( $job_title != null || $organization != null ) {
									echo '<p>';
								}

									// Job Title
									if ( $job_title != null ) {
										echo $job_title;
									}

									if ( $job_title != null || $organization != null ) {
										echo ', ';
									}

									// Organization
									if ( $organization != null ) {
										echo $organization;
									}

								if ( $job_title != null || $organization != null ) {
									echo '</p>';
								}

							?>
						</a>
					</div>

					<?php endforeach; ?>
				</div>
			<?php
				endif;
				include('sharing.php');
			?>
		</div>

		<?php
			$sessions_sidebar_default = get_field('sessions_sidebar_default', 'option');
			if ( $sessions_sidebar_default == 'Custom' ) {
				include('assets/sidebars/sessions.php');
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

	$session_footer_default = get_field('session_footer_default', 'option');
	if ( $session_footer_default == 'Custom' ) {
		include('assets/footer/sessions.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');
?>