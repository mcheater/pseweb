<?php
	include('header.php');
	if ( have_posts() ) : while ( have_posts() ) : the_post();

	$post_title			= get_the_title();
	$first_name			= get_field('first_name');
	$last_name			= get_field('last_name');
	$job_title			= get_field('job_title');
	$organization		= get_field('organization');
	$profile_photo		= get_field('profile_photo');
	$email				= get_field('email_address');
	$twitter			= get_field('twitter_username');
	$linkedin			= get_field('linkedin_profile');
	$pse_planner		= get_field('planning_team_title');
	$pse_board			= get_field('board_member_title');
	$pse_five_year		= get_field('five_year_member');
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if ( $speakers_title != null ) {
						echo "<h2>$speakers_title</h2>";
					} else {
						echo "<h2>Our Speakers</h2>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-8 col-md-8 content speaker-details">
			<div class="content speaker-details speakers-sessions">
				<?php
					if ( $profile_photo != null ) {
						echo '<div class="speaker-image">';
							echo wp_get_attachment_image($profile_photo, 'speaker-photo');
						echo '</div>';
					}
					elseif ( $profile_photo == null && $email != null ) {
						echo '<div class="speaker-image">';
							echo get_avatar( $email, 350 );
						echo '</div>';
					}
				?>

				<h1><?php the_title(); ?></h1>
				<p class="title"><?php echo "$job_title, $organization"; ?></p>

				<?php
					if ( $pse_planner != null || $pse_board != null || $pse_five_year == 'Yes' ) {
						echo '<ul class="pse-member">';

							if ( $pse_planner != null ) {
								echo "<li>$pse_planner</li>";
							}

							if ( $pse_board != null ) {
								echo "<li>$pse_board</li>";
							}

							if ( $pse_five_year == 'Yes' ) {
								echo "<li class=\"five-year\">* Speaker is a 5 year #PSEWEB Member</li>";
							}

						echo '</ul>';
					}
				?>

				<?php
					if ( $twitter != null || $linkedin != null ) {
						echo '<ul class="social">';
							if ( $twitter != null ) {
								echo "<li><a href=\"http://twitter.com/$twitter\"><span class=\"social-icon icon-twitter-box\"></span><span>@$twitter</span></a></li>";
							}
							if ( $linkedin != null ) {
								echo "<li><a href=\"$linkedin\"><span class=\"social-icon icon-linkedin-box\"></span><span>$linkedin</span></a></li>";
							}
						echo '</ul>';
					}
				?>

				<?php the_content(); ?>
			</div>







			<?php

				$sessions = get_posts(array(
					'post_type'			=> 'pse-sessions',
					'order'			=> 'DESC',
					'meta_key'		=> 'date',
					'orderby'		=> 'meta_value', //or 'meta_value_num'
					'meta_query'		=> array(
						array(
							'key'		=> 'speaker', // name of custom field
							'value'		=> '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
							'compare'	=> 'LIKE'
						)
					)
				));

				if( $sessions ):
			?>

				<div class="session-relation">
					<h2><?php echo $first_name; ?>'s Talks</h2>

					<?php
						foreach( $sessions as $session ):

						$post_title			= get_the_title($session->ID);
						$post_link			= get_permalink($session->ID);
						$date				= get_field('date', $session->ID);

						if ( $date != null ) {
							$new_date			= DateTime::createFromFormat('d/m/Y', $date);
							$final_date			= $new_date->format('l, F j, Y');
						}

					?>
						<div class="session-item equalheight">
							<?php
								echo "<h3><a href=\"$post_link\">$post_title</a></h3>";

								if ( $date != null ) {
									echo "<p>$final_date</p>";
								}
							?>
						</div>
					<?php endforeach; ?>

				</div>
			<?php
				endif;
				include('sharing.php');
			?>

		</div>

		<?php
			$speaker_sidebar_default = get_field('speaker_sidebar_default', 'option');
			if ( $speaker_sidebar_default == 'Custom' ) {
				include('assets/sidebars/speakers.php');
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

	$speaker_footer_default = get_field('speaker_footer_default', 'option');
	if ( $speaker_footer_default == 'Custom' ) {
		include('assets/footer/speakers.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>