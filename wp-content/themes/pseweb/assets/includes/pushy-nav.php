<nav class="pushy pushy-left">
	<h2>Browse #PSEWEB</h2>

	<?php
		// MAIN NAVIGATION
		$args = array(
				'theme_location'	=> 'top-nav',
				'items_wrap'		=> '<ul class="navigation">%3$s</ul>',
				'container'			=> false,
		);
		wp_nav_menu( $args );
	?>

	<?php

		// SPONSOR HIGHLIGHT
		if ( $sponsor_highlight == 'Yes' ) {

		$args1 = array(
			'post_type'		=> 'pse-sponsors',
			'showposts'		=> 1,
			'orderby'		=> 'rand',

		);

		$args2 = array (
			'tax_query'		=> array(
				'relation' => 'AND',
				array(
					'taxonomy'	=> 'sponsor-type',
					'field'		=> 'slug',
					'terms'		=> 'platinum',
				),
				array(
					'taxonomy'	=> 'sponsor-year',
					'field'		=> 'id',
					'terms'		=> $sponsor_year,
				),
			),
		);

		if ($sponsor_highlighted == 'Random') {
			$the_query = new WP_Query( $args1 );
		} else {
			$args = array_merge($args1, $args2);
			$the_query = new WP_Query( $args );
		}

		// $the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

		$sponsor_link	= get_field('sponsor_link');
		$sponsor_logo	= get_field('sponsor_logo');

	?>

	<div class="sponsor">
		<?php

			if ($sponsor_highlighted == 'Random') {
				if ( $random_sponsor_title != null) {
					echo "<p>$random_sponsor_title</p>";
				} else {
					echo '<p>Proud Sponsor</p>';
				}
			} else {
				echo '<p>Platinum Sponsor</p>';
			}

			if ($sponsor_logo != null) {
				echo '<div class="image">';
					echo "<a href=\"$sponsor_link\">";
						echo wp_get_attachment_image($sponsor_logo, 'thumbnail');
					echo "</a>";
				echo '</div>';
			}

		?>
	</div>

	<?php
		endwhile;
		wp_reset_query();
	} ?>

	<h2>Socialize with #PSEWEB</h2>
	<ul class="social">
		<?php
			if ( $twitter != null ) {
				echo "<li><a href=\"http://twitter.com/$twitter\"><span class=\"social-icon icon-twitter-box\"></span><span class=\"\">Twitter</span></a></li>";
			}
			if ( $facebook != null ) {
				echo "<li><a href=\"$facebook\"><span class=\"social-icon icon-facebook-box\"></span><span class=\"\">Facebook</span></a></li>";
			}
			if ( $gplus != null ) {
				echo "<li><a href=\"$gplus\"><span class=\"social-icon icon-gplus-box\"></span><span class=\"\">Google Plus</span></a></li>";
			}
			if ( $instagram != null ) {
				echo "<li><a href=\"$instagram\"><span class=\"social-icon icon-instagram-box\"></span><span class=\"\">Instagram</span></a></li>";
			}
		?>
	</ul>
</nav>