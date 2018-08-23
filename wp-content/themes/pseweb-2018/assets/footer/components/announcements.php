<?php
	$blocks_displayed	= get_sub_field('blocks_displayed', $homepage_identification);

	// Block 1
	$block_1_title		= get_sub_field('block_1_title', $homepage_identification);
	$block_1_link		= get_sub_field('block_1_link', $homepage_identification);
	$block_1_content	= get_sub_field('block_1_content', $homepage_identification);

	// Block 2
	$block_2_title		= get_sub_field('block_2_title', $homepage_identification);
	$block_2_link		= get_sub_field('block_2_link', $homepage_identification);
	$block_2_content	= get_sub_field('block_2_content', $homepage_identification);

	// Block 3
	$block_3_title		= get_sub_field('block_3_title', $homepage_identification);
	$block_3_link		= get_sub_field('block_3_link', $homepage_identification);
	$block_3_content	= get_sub_field('block_3_content', $homepage_identification);

	if ( $blocks_displayed == 2 ) {
		$blocks_size	= 'col-lg-6 col-md-6 col-sm-6 col-xs-12 announcement-item';
	} else {
		$blocks_size	= 'col-lg-4 col-md-4 col-sm-4 col-xs-12 announcement-item';
	}

	echo '<div class="container sections section-announcements">';
		echo '<div class="row">';

			// BLOCK 1
			echo "<div class=\"$blocks_size\">";
				echo '<h2>';
					if ( $block_1_link != null ) {
						echo "<a href=\"$block_1_link\">";
					}
					echo $block_1_title;
					if ( $block_1_link != null ) {
						echo "</a>";
					}
				echo '</h2>';
				echo "<p>$block_1_content</p>";
			echo '</div>';

			// BLOCK 2
			echo "<div class=\"$blocks_size\">";
				echo '<h2>';
					if ( $block_2_link != null ) {
						echo "<a href=\"$block_2_link\">";
					}
					echo $block_2_title;
					if ( $block_2_link != null ) {
						echo "</a>";
					}
				echo '</h2>';
				echo "<p>$block_2_content</p>";
			echo '</div>';

			// BLOCK 3
			if ( $blocks_displayed == 3 ) {
				echo "<div class=\"$blocks_size\">";
					echo '<h2>';
						if ( $block_3_link != null ) {
							echo "<a href=\"$block_3_link\">";
						}
						echo $block_3_title;
						if ( $block_3_link != null ) {
							echo "</a>";
						}
						echo '</h2>';
					echo "<p>$block_3_content</p>";
				echo '</div>';
			}

		echo '</div>';
	echo '</div>'; // end container

?>