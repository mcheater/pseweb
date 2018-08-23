<?php
	$sessions_title		= get_sub_field('sessions_title', 'option');
	$sessions_shown		= get_sub_field('sessions_shown', 'option');
?>

<aside class="sessions">
	<h3><?php echo $sessions_title; ?></h3>

	<?php

		$args=array(
			'post_type'			=> 'pse-sessions',
			'posts_per_page'	=> $sessions_shown,
			'orderby'			=> 'rand',
			'tax_query'			=> array(
				array(
					'taxonomy'	=> 'session-year',
					'field'		=> 'id',
					'terms'		=> $session_year,
				),
			),
		);

		$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

		$post_title			= get_the_title();
		$post_link			= get_permalink();
		$date				= get_field('date');
		$new_date			= DateTime::createFromFormat('d/m/Y', $date);
		$start_time			= get_field('start_time');
		$excerpt			= get_custom_excerpt(120, '... ', 'More');

	?>

	<div class="session">
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

	<?php
		endwhile;
		wp_reset_query();
	?>

</aside>