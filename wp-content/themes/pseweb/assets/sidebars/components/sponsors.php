<?php
	$sponsors_title		= get_sub_field('sponsors_title', 'option');
	$sponsors_shown		= get_sub_field('sponsors_shown', 'option');
	$sponsor_order		= get_sub_field('sponsor_order', 'option');
	$sponsor_1			= get_sub_field('sponsor_1', 'option');
	$sponsor_2			= get_sub_field('sponsor_2', 'option');
	$sponsor_3			= get_sub_field('sponsor_3', 'option');

	if ( $sponsor_1 != null ) {
		$sponsor_id_1		= $sponsor_1->ID;
	}

	if ( $sponsor_2 != null ) {
		$sponsor_id_2		= $sponsor_2->ID;
	}

	if ( $sponsor_3 != null ) {
		$sponsor_id_3		= $sponsor_3->ID;
	}
?>

<aside class="sponsors">
	<?php

		if ( $sponsors_title != null ) {
			echo "<h3>$sponsors_title</h3>";
		}

		$args_base = array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> $sponsors_shown,
			'tax_query'			=> array(
				array(
					'taxonomy'	=> 'sponsor-year',
					'field'		=> 'id',
					'terms'		=> $sponsor_year,
				),
			),
		);

		$args_random = array(
			'orderby'			=> 'rand',
		);

		if ($sponsor_order == 'Random') {
			$args = array_merge($args_base, $args_random);
		}

		if ( $sponsor_order == 'Specific' && $sponsors_shown == 1 ) {
			$args_custom1 = array(
				'post__in'		=> array( $sponsor_id_1 ),
				'orderby'		=> 'post__in',
			);
			$args = array_merge($args_base, $args_custom1);
		}

		if ( $sponsor_order == 'Specific' && $sponsors_shown == 2 ) {
			$args_custom2 = array(
				'post__in'		=> array( $sponsor_id_1, $sponsor_id_2 ),
				'orderby'		=> 'post__in',
			);
			$args = array_merge($args_base, $args_custom2);
		}

		if ( $sponsor_order == 'Specific' && $sponsors_shown == 3 ) {
			$args_custom3 = array(
				'post__in'		=> array( $sponsor_id_1, $sponsor_id_2, $sponsor_id_3 ),
				'orderby'		=> 'post__in',
			);
			$args = array_merge($args_base, $args_custom3);
		}

		$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

		$post_title			= get_the_title();
		$sponsor_link		= get_field('sponsor_link');
		$sponsor_logo		= get_field('sponsor_logo');

		if ($sponsor_logo != null) {
			echo '<div class="image">';
				echo "<a href=\"$sponsor_link\">";
					echo wp_get_attachment_image($sponsor_logo, 'full');
				echo "</a>";
			echo '</div>';
		}

		endwhile;
		wp_reset_query();
	?>

</aside>