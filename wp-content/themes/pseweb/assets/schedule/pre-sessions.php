<?php

	if( have_rows('pre_session_items') ):

		// DESKTOP VERSION
		echo '<table class="schedule-desktop hide-below-800" style="width:100%;">';
		echo '<tbody>';

		while( have_rows('pre_session_items') ): the_row();

			// VARIABLES
			$pre_session_time		= get_sub_field('pre_session_time');
			$pre_session_type		= get_sub_field('pre_session_type');

			echo '<tr>';
			echo "<td style=\"width:20%;\"><p>$pre_session_time</p></td>";
			echo '<td style="width:80%;">';

			// TEXT ONLY SETTING
			if ( $pre_session_type == "Text" ) {

				// VARIABLES
				$pre_session_title	= get_sub_field('pre_session_title');
				$pre_session_desc		= get_sub_field('pre_session_description');

				echo "<h3>$pre_session_title</h3>";

				// OPTIONAL DESCRIPTION
				if ( $pre_session_desc != null ) {
					echo "<p>$pre_session_desc</p>";
				}

			} // END TEXT ONLY SETTING

			// SESSION LINK SETTING
			if ( $pre_session_type == "Link" ) {

				// VARIABLES
				$pre_session_link	= get_sub_field('pre_session_link');
				$post_title					= $pre_session_link->post_title;
				$post_link					= $pre_session_link->guid;
				$post_content				= $pre_session_link->post_content;

				echo "<h3><a href=\"$post_link\">$post_title</a></h3>";
				echo "<p>$post_content</p>";

			} // END SESSION LINK SETTING

			echo '</td>';
			echo '</tr>';

		endwhile;

		echo '</tbody>';
		echo '</table>';

		// MOBILE VERSION
		echo '<div class="schedule-mobile hide-above-800">';
			while( have_rows('pre_session_items') ): the_row();

				// VARIABLES
				$pre_session_time		= get_sub_field('pre_session_time');
				$pre_session_type		= get_sub_field('pre_session_type');

				echo '<div class="session-block">';

				// TEXT ONLY SETTING
				if ( $pre_session_type == "Text" ) {

					// VARIABLES
					$pre_session_title	= get_sub_field('pre_session_title');
					$pre_session_desc		= get_sub_field('pre_session_description');

					echo "<p class=\"time\">$pre_session_time</p>";
					echo "<p class=\"title\">$pre_session_title</p>";

					// OPTIONAL DESCRIPTION
					if ( $pre_session_desc != null ) {
						echo "<p class=\"desc\">$pre_session_desc</p>";
					}

				} // END TEXT ONLY SETTING

				// SESSION LINK SETTING
				if ( $pre_session_type == "Link" ) {

					// VARIABLES
					$pre_session_link	= get_sub_field('pre_session_link');
					$post_title					= $pre_session_link->post_title;
					$post_link					= $pre_session_link->guid;
					$post_content				= $pre_session_link->post_content;

					echo "<p class=\"time\">$pre_session_time</p>";
					echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";
					// echo "<p class=\"desc\">$post_content</p>";

				} // END SESSION LINK SETTING

				echo '</div>';

			endwhile;
		echo '</div>';

	endif; // end have_rows('pre_session_items')

?>