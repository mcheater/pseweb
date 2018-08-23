<?php

	if( have_rows('session_items') ):







		// DESKTOP VERSION
		$session_rooms = get_sub_field('session_rooms');
		if ( $session_rooms == 3 ) {
			$width_time			= 'width:20%';
			$width_sessions		= 'width:26.66667%';
		} else {
			$width_time			= 'width:20%';
			$width_sessions		= 'width:40%';
		}

		echo '<table class="schedule-desktop hide-below-800" style="width:100%;">';
		echo '<thead>';
		echo '<tr>';
		echo "<td style=\"$width_time\">Time</td>";
		echo "<td style=\"$width_sessions\">Room 1: Middlesex College 110</td>";
		echo "<td style=\"$width_sessions\">Room 2: Middlesex College 105B</td>";
		//echo "<td style=\"$width_sessions\">Room 3</td>";
		if ( $session_rooms == 4 ) {
			echo "<td style=\"$width_sessions\">Room 4</td>";
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';

		while( have_rows('session_items') ): the_row();

			// VARIABLES
			$session_time		= get_sub_field('session_time');
			$session_type		= get_sub_field('session_type');
			$session_style		= get_sub_field('session_style');

			echo '<tr>';
				echo "<td style=\"$width_time\"><p>$session_time</p></td>";



				// SINGLE ITEMS SPANNING ALL ROWS
				if ( $session_type == 'Single' ) {
					echo "<td colspan=\"3\">";

					// TEXT ONLY
					if ( $session_style == 'Text' ) {
						$session_title		= get_sub_field('session_title');
						$session_desc		= get_sub_field('session_description');

						echo "<h3>$session_title</h3>";
						if ( $session_desc != null ) {
							echo "<p>$session_desc</p>";
						}
					}

					// LINKED SESSION
					if ( $session_style == 'Link' ) {
						$session_link		= get_sub_field('session_link');
						$post_title			= $session_link->post_title;
						$post_link			= $session_link->guid;
						$post_content		= $session_link->post_content;

						echo "<h3><a href=\"$post_link\">$post_title</a></h3>";
						// echo "<p>$post_content</p>";

						// SPEAKER RELATIONSHIP
						$speakers = get_field('speaker', $session_link);
						if( $speakers ):
							$resultstr = array();
							foreach( $speakers as $s ):
								$post_title = $s->post_title;
								$post_link = $s->guid;
								$resultstr[] = "<p><strong>Speaker(s):</strong> <a href=\"$post_link\">$post_title</a></p>";
							endforeach;
							$result = implode(", ",$resultstr);
							echo $result;
						endif;
						// END SPEAKER RELATIONSHIP

						// the_terms( $session_link, 'session-track', '<p><strong>Track:</strong> ', ', ', '</p>' );
					}

					echo "</td>";
				}









				// MULTIPLE ITEMS USING INDIVIDUAL ROWS
				if ( $session_type == 'Multiple' ) {

					// ROOM 1 SESSION
					$session_room_1_heading		= get_sub_field('session_room_1_heading');
					echo "<td style=\"$width_sessions\">";

					if( have_rows('sessions_room_1') ):

						if ( $session_room_1_heading != null ) {
							echo "<p class=\"multiheading\">$session_room_1_heading</p>";
						}

						while( have_rows('sessions_room_1') ): the_row();

							// VARIABLES
							$session_room_1		= get_sub_field('session_room_1');
							$post_title			= $session_room_1->post_title;
							$post_link			= $session_room_1->guid;

							echo '<div class="session-item">';
							echo "<h3><a href=\"$post_link\">$post_title</a></h3>";

							// SPEAKER RELATIONSHIP
							$speakers = get_field('speaker', $session_room_1);
							if( $speakers ):
								$resultstr = array();
								foreach( $speakers as $s ):
									$post_title = $s->post_title;
									$post_link = $s->guid;
									$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
								endforeach;
								$result = implode(", ",$resultstr);
								echo "<p class=\"speaker\">Speaker(s): $result</p>";
							endif;
							// END SPEAKER RELATIONSHIP

							the_terms( $session_room_1, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

							echo '</div>';
						endwhile;

					endif;
					echo "</td>";
					// END ROOM 1 SESSION









					// ROOM 2 SESSION
					$session_room_2_heading		= get_sub_field('session_room_2_heading');
					echo "<td style=\"$width_sessions\">";

					if( have_rows('sessions_room_2') ):

						if ( $session_room_2_heading != null ) {
							echo "<p class=\"multiheading\">$session_room_2_heading</p>";
						}

						while( have_rows('sessions_room_2') ): the_row();

							// VARIABLES
							$session_room_2		= get_sub_field('session_room_2');
							$post_title			= $session_room_2->post_title;
							$post_link			= $session_room_2->guid;

							echo '<div class="session-item">';
							echo "<h3><a href=\"$post_link\">$post_title</a></h3>";

							// SPEAKER RELATIONSHIP
							$speakers = get_field('speaker', $session_room_2);
							if( $speakers ):
								$resultstr = array();
								foreach( $speakers as $s ):
									$post_title = $s->post_title;
									$post_link = $s->guid;
									$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
								endforeach;
								$result = implode(", ",$resultstr);
								echo "<p class=\"speaker\">Speaker(s): $result</p>";
							endif;
							// END SPEAKER RELATIONSHIP

							the_terms( $session_room_2, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

							echo '</div>';
						endwhile;

					endif;
					echo "</td>";
					// END ROOM 2 SESSION









					// ROOM 3 SESSION
					$session_room_3_heading		= get_sub_field('session_room_3_heading');
					//echo "<td style=\"$width_sessions\">";

					if( have_rows('sessions_room_3') ):

						if ( $session_room_3_heading != null ) {
							//echo "<p class=\"multiheading\">$session_room_3_heading</p>";
						}

						while( have_rows('sessions_room_3') ): the_row();

							// VARIABLES
							$session_room_3		= get_sub_field('session_room_3');
							$post_title			= $session_room_3->post_title;
							$post_link			= $session_room_3->guid;

							//echo '<div class="session-item">';
							//echo "<h3><a href=\"$post_link\">$post_title</a></h3>";

							// SPEAKER RELATIONSHIP
							$speakers = get_field('speaker', $session_room_3);
							if( $speakers ):
								$resultstr = array();
								foreach( $speakers as $s ):
									$post_title = $s->post_title;
									$post_link = $s->guid;
									$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
								endforeach;
								$result = implode(", ",$resultstr);
								//echo "<p class=\"speaker\">Speaker(s): $result</p>";
							endif;
							// END SPEAKER RELATIONSHIP

							the_terms( $session_room_3, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

							//echo '</div>';
						endwhile;

					endif;
					//echo "</td>";
					// END ROOM 3 SESSION









					// ROOM 4 SESSION
					if ( $session_rooms == 4 ) {

						$session_room_4_heading		= get_sub_field('session_room_4_heading');
						echo "<td style=\"$width_sessions\">";

						if( have_rows('sessions_room_4') ):

							if ( $session_room_4_heading != null ) {
								echo "<p class=\"multiheading\">$session_room_4_heading</p>";
							}

							while( have_rows('sessions_room_4') ): the_row();

								// VARIABLES
								$session_room_4		= get_sub_field('session_room_4');
								$post_title			= $session_room_4->post_title;
								$post_link			= $session_room_4->guid;

								echo '<div class="session-item">';
								echo "<h3><a href=\"$post_link\">$post_title</a></h3>";

								// SPEAKER RELATIONSHIP
								$speakers = get_field('speaker', $session_room_4);
								if( $speakers ):
									$resultstr = array();
									foreach( $speakers as $s ):
										$post_title = $s->post_title;
										$post_link = $s->guid;
										$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
									endforeach;
									$result = implode(", ",$resultstr);
									echo "<p class=\"speaker\">Speaker(s): $result</p>";
								endif;
								// END SPEAKER RELATIONSHIP

								the_terms( $session_room_4, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

								echo '</div>';
							endwhile;

						endif;
						echo "</td>";

					}
					// END ROOM 4 SESSION

				} //  END MULTIPLE

			echo '</tr>';

		endwhile; // end have_rows('session_items')

		echo '</tbody>';
		echo '</table>';










		// MOBILE VERSION
		echo '<div class="schedule-mobile hide-above-800">';
			while( have_rows('session_items') ): the_row();

				// VARIABLES
				$session_time		= get_sub_field('session_time');
				$session_type		= get_sub_field('session_type');
				$session_style		= get_sub_field('session_style');

				echo '<div class="session-block">';

					// SINGLE ITEMS SPANNING ALL ROWS
					if ( $session_type == 'Single' ) {
						echo "<p class=\"time\">$session_time</p>";
						echo "<div class=\"session-item\">";

						// TEXT ONLY
						if ( $session_style == 'Text' ) {
							$session_title		= get_sub_field('session_title');
							$session_desc		= get_sub_field('session_description');

							echo "<p class=\"title\">$session_title</p>";
							if ( $session_desc != null ) {
								echo "<p>$session_desc</p>";
							}
						}

						// LINKED SESSION
						if ( $session_style == 'Link' ) {
							$session_link		= get_sub_field('session_link');
							$post_title			= $session_link->post_title;
							$post_link			= $session_link->guid;
							$post_content		= $session_link->post_content;

							echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";

							// SPEAKER RELATIONSHIP
							$speakers = get_field('speaker', $session_link);
							if( $speakers ):
								$resultstr = array();
								foreach( $speakers as $s ):
									$post_title = $s->post_title;
									$post_link = $s->guid;
									$resultstr[] = "<p><strong>Speaker(s):</strong> <a href=\"$post_link\">$post_title</a></p>";
								endforeach;
								$result = implode(", ",$resultstr);
								echo $result;
							endif;
							// END SPEAKER RELATIONSHIP

						}

						echo "</div>"; // end session-item div
					}








					// MULTIPLE ITEMS USING INDIVIDUAL ROWS
					if ( $session_type == 'Multiple' ) {






						// ROOM 1 SESSION
						if( have_rows('sessions_room_1') ):

							echo '<div class="multi-sessions">';
							echo "<p class=\"time\">$session_time &mdash; Room 1 (Middlesex College Room 110)</p>";

							if ( $session_room_1_heading != null ) {
								echo "<p class=\"multiheading\">$session_room_1_heading</p>";
							}

							while( have_rows('sessions_room_1') ): the_row();

								// VARIABLES
								$session_room_1		= get_sub_field('session_room_1');
								$post_title			= $session_room_1->post_title;
								$post_link			= $session_room_1->guid;

								echo '<div class="session-item">';
								echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";

								// SPEAKER RELATIONSHIP
								$speakers = get_field('speaker', $session_room_1);
								if( $speakers ):
									$resultstr = array();
									foreach( $speakers as $s ):
										$post_title = $s->post_title;
										$post_link = $s->guid;
										$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
									endforeach;
									$result = implode(", ",$resultstr);
									echo "<p class=\"speaker\">Speaker(s): $result</p>";
								endif;
								// END SPEAKER RELATIONSHIP

								the_terms( $session_room_1, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

								echo '</div>';
							endwhile;

							echo '</div>'; // END MULTI SESSION DIV
						endif;
						// END ROOM 1 SESSION






						// ROOM 2 SESSION
						if( have_rows('sessions_room_2') ):

							echo '<div class="multi-sessions">';
							echo "<p class=\"time\">$session_time &mdash; Room 2 (Middlesex College Room 105B)</p>";

							if ( $session_room_2_heading != null ) {
								echo "<p class=\"multiheading\">$session_room_2_heading</p>";
							}

							while( have_rows('sessions_room_2') ): the_row();

								// VARIABLES
								$session_room_2		= get_sub_field('session_room_2');
								$post_title			= $session_room_2->post_title;
								$post_link			= $session_room_2->guid;

								echo '<div class="session-item">';
								echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";

								// SPEAKER RELATIONSHIP
								$speakers = get_field('speaker', $session_room_2);
								if( $speakers ):
									$resultstr = array();
									foreach( $speakers as $s ):
										$post_title = $s->post_title;
										$post_link = $s->guid;
										$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
									endforeach;
									$result = implode(", ",$resultstr);
									echo "<p class=\"speaker\">Speaker(s): $result</p>";
								endif;
								// END SPEAKER RELATIONSHIP

								the_terms( $session_room_2, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

								echo '</div>';
							endwhile;

							echo '</div>'; // END MULTI SESSION DIV
						endif;
						// END ROOM 2 SESSION






						// ROOM 3 SESSION
						if( have_rows('sessions_room_3') ):

							//echo '<div class="multi-sessions">';
							//echo "<p class=\"time\">$session_time &mdash; Room 3</p>";

							if ( $session_room_3_heading != null ) {
								//echo "<p class=\"multiheading\">$session_room_3_heading</p>";
							}

							while( have_rows('sessions_room_3') ): the_row();

								// VARIABLES
								$session_room_3		= get_sub_field('session_room_3');
								$post_title			= $session_room_3->post_title;
								$post_link			= $session_room_3->guid;

								//echo '<div class="session-item">';
								//echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";

								// SPEAKER RELATIONSHIP
								$speakers = get_field('speaker', $session_room_3);
								if( $speakers ):
									$resultstr = array();
									foreach( $speakers as $s ):
										$post_title = $s->post_title;
										$post_link = $s->guid;
										$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
									endforeach;
									$result = implode(", ",$resultstr);
									//echo "<p class=\"speaker\">Speaker(s): $result</p>";
								endif;
								// END SPEAKER RELATIONSHIP

								the_terms( $session_room_3, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

								//echo '</div>';
							endwhile;

							//echo '</div>'; // END MULTI SESSION DIV
						endif;
						// END ROOM 3 SESSION






						// ROOM 3 SESSION
						if ( $session_rooms == 4 ) {
							if( have_rows('sessions_room_4') ):

								echo '<div class="multi-sessions">';
								echo "<p class=\"time\">$session_time &mdash; Room 4</p>";

								if ( $session_room_4_heading != null ) {
									echo "<p class=\"multiheading\">$session_room_4_heading</p>";
								}

								while( have_rows('sessions_room_4') ): the_row();

									// VARIABLES
									$session_room_4		= get_sub_field('session_room_4');
									$post_title			= $session_room_4->post_title;
									$post_link			= $session_room_4->guid;

									echo '<div class="session-item">';
									echo "<p class=\"title\"><a href=\"$post_link\">$post_title</a></p>";

									// SPEAKER RELATIONSHIP
									$speakers = get_field('speaker', $session_room_4);
									if( $speakers ):
										$resultstr = array();
										foreach( $speakers as $s ):
											$post_title = $s->post_title;
											$post_link = $s->guid;
											$resultstr[] = "<a href=\"$post_link\">$post_title</a>";
										endforeach;
										$result = implode(", ",$resultstr);
										echo "<p class=\"speaker\">Speaker(s): $result</p>";
									endif;
									// END SPEAKER RELATIONSHIP

									the_terms( $session_room_4, 'session-track', '<p class="track">Track: ', ', ', '</p>' );

									echo '</div>';
								endwhile;

								echo '</div>'; // END MULTI SESSION DIV
							endif;
						} // END ROOM 4 SESSION





					} // END OF MULTIPLE SESSIONS










				echo '</div>'; // end session-block div

			endwhile;
		echo '</div>';




























	endif; // end have_rows('session_items')

?>