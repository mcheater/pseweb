<div class="container sections section-sessions">

	<div class="row heading">
		<div class="col-lg-12">
			<?php
				if ( $sessions_title != null ) {
					echo "<h3><span>$sessions_title</span></h3>";
				} else {
					echo "<h3><span>The Sessions</span></h3>";
				}
			?>
			<p class="headinglink"><a href="<?php echo $site_url; ?>/sessions/">View more sessions</a></p>
		</div>
	</div>

	<div class="row">

		<?php

			$args=array(
				'post_type'		=> 'pse-sessions',
				'showposts'		=> 4,
				'orderby'		=> 'rand',
				'tax_query'			=> array(
					array(
						'taxonomy'	=> 'session-year',
						'field'		=> 'id',
						'terms'		=> $session_year,
					),
				)
			);

			$the_query = new WP_Query( $args );
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i > 3) {
				$sessionsHide = 'col-lg-3 col-md-3 col-sm-4 col-xs-6 hide-below-992';
			} elseif ($i > 2) {
				$sessionsHide = 'col-lg-3 col-md-3 col-sm-4 col-xs-6 hide-below-640';
			} else {
				$sessionsHide = 'col-lg-3 col-md-3 col-sm-4 col-xs-6';
			}

			$post_title			= get_the_title();
			$post_link			= get_permalink();
			$date				= get_field('date');
			$new_date			= DateTime::createFromFormat('d/m/Y', $date);
			$start_time			= get_field('start_time');
			$excerpt			= get_custom_excerpt(140, '... ', 'Read more');

		?>

		<div class="<?php echo $sessionsHide; ?>">
			<div class="session-item">
				<?php

					// Post Title
					echo "<h4><a href=\"$post_link\">$post_title</a></h4>";

					// Date and Time
					if ( $date != null || $start_time != null ) {
						echo '<div class="metadate"><p>';
					}

						if ( $date != null ) {
							echo $new_date->format('l, F j, Y');
						}

						if ( $date != null && $start_time != null ) {
							echo ' at ';
						}

						if ( $start_time != null ) {
							echo ( date("g:i A", strtotime($start_time)) );
						}

					if ( $date != null || $start_time != null ) {
						echo '</p></div>';
					}

					// Speaker Relationship
					$speakers = get_field('speaker');
					if( $speakers ):
					$resultstr = array();

						echo '<div class="metaspeaker"><p>';

							foreach( $speakers as $s ):

								$post_title = $s->post_title;
								$post_link = $s->guid;

								$resultstr[] = "<a href=\"$post_link\">$post_title</a>";

							endforeach;

							$result = implode(", ",$resultstr);
							echo $result;

						echo '</p></div>';
					endif;

					echo "<p>$excerpt</p>";

				?>
			</div>
		</div>

		<?php
			endwhile;
			wp_reset_query();
		?>

	</div>
</div> <!-- end container -->