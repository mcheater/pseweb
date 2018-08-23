<tr>
	<td align="center" valign="top">
		<!-- BEGIN COLUMNS // -->
		<table border="0" cellpadding="20" cellspacing="0" width="100%" id="templateSponsors">
			<tr>
				<td valign="top" class="sponsorHeading" mc:edit="sponsor_content">
					<h1>Our Sponsors</h1>
				</td>
			</tr>

			<?php

				// PLATINUM SPONSORS
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
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
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
					echo '<td align="left" valign="top" class="newsletterSponsors">';

					echo '<h2><span>Platinum Sponsor</span></h2>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_title		= get_the_title();
						$post_content	= get_the_content();
						$sponsor_link	= get_field('sponsor_link');
						$sponsor_logo	= get_field('sponsor_logo');

						echo '<div class="sponsorItem primeSponsors">';
						if ($sponsor_logo != null) {
							echo '<div class="image equalheight-gold-img">';
								echo "<a href=\"$sponsor_link\">";
									echo wp_get_attachment_image($sponsor_logo, 'full');
								echo "</a>";
							echo '</div>';
						}
						echo '</div>';

					}

					echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();

				// GOLD SPONSORS
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'tax_query'		=> array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'sponsor-type',
							'field'		=> 'slug',
							'terms'		=> 'gold',
						),
						array(
							'taxonomy'	=> 'sponsor-year',
							'field'		=> 'id',
							'terms'		=> $sponsor_year,
						),
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
					echo '<td align="left" valign="top" class="newsletterSponsors" bgcolor="white">';

					echo '<h2><span>Gold Sponsors</span></h2>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_title		= get_the_title();
						$post_content	= get_the_content();
						$sponsor_link	= get_field('sponsor_link');
						$sponsor_logo	= get_field('sponsor_logo');

						echo '<div class="sponsorItem primeSponsors">';
						if ($sponsor_logo != null) {
							echo '<div class="image equalheight-gold-img">';
								echo "<a href=\"$sponsor_link\">";
									echo wp_get_attachment_image($sponsor_logo, 'full');
								echo "</a>";
							echo '</div>';
						}
						echo '</div>';

					}

					echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();

				// SILVER SPONSORS
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'tax_query'		=> array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'sponsor-type',
							'field'		=> 'slug',
							'terms'		=> 'silver',
						),
						array(
							'taxonomy'	=> 'sponsor-year',
							'field'		=> 'id',
							'terms'		=> $sponsor_year,
						),
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
						echo '<td align="left" valign="top" class="newsletterSponsors">';

							echo '<h2><span>Silver Sponsors</span></h2>';

							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$post_title		= get_the_title();
								$post_content	= get_the_content();
								$sponsor_link	= get_field('sponsor_link');
								$sponsor_logo	= get_field('sponsor_logo');

								echo '<div class="sponsorItem">';
									if ($sponsor_logo != null) {
										echo '<div class="image equalheight-gold-img">';
											echo "<a href=\"$sponsor_link\">";
												echo wp_get_attachment_image($sponsor_logo, 'full');
											echo "</a>";
										echo '</div>';
									}
								echo '</div>';

							}

						echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();

				// BRONZE SPONSORS
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'tax_query'		=> array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'sponsor-type',
							'field'		=> 'slug',
							'terms'		=> 'bronze',
						),
						array(
							'taxonomy'	=> 'sponsor-year',
							'field'		=> 'id',
							'terms'		=> $sponsor_year,
						),
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
					echo '<td align="left" valign="top" class="newsletterSponsors" bgcolor="white">';

					echo '<h2><span>Bronze Sponsors</span></h2>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_title		= get_the_title();
						$post_content	= get_the_content();
						$sponsor_link	= get_field('sponsor_link');
						$sponsor_logo	= get_field('sponsor_logo');

						echo '<div class="sponsorItem">';
						if ($sponsor_logo != null) {
							echo '<div class="image equalheight-gold-img">';
								echo "<a href=\"$sponsor_link\">";
									echo wp_get_attachment_image($sponsor_logo, 'full');
								echo "</a>";
							echo '</div>';
						}
						echo '</div>';

					}

					echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();
			
			// MISC
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'tax_query'		=> array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'sponsor-type',
							'field'		=> 'slug',
							'terms'		=> 'misc',
						),
						array(
							'taxonomy'	=> 'sponsor-year',
							'field'		=> 'id',
							'terms'		=> $sponsor_year,
						),
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
					echo '<td align="left" valign="top" class="newsletterSponsors" bgcolor="white">';

					echo '<h2><span></span></h2>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_title		= get_the_title();
						$post_content	= get_the_content();
						$sponsor_link	= get_field('sponsor_link');
						$sponsor_logo	= get_field('sponsor_logo');

						echo '<div class="sponsorItem">';
						if ($sponsor_logo != null) {
							echo '<div class="image equalheight-gold-img">';
								echo "<a href=\"$sponsor_link\">";
									echo wp_get_attachment_image($sponsor_logo, 'full');
								echo "</a>";
							echo '</div>';
						}
						echo '</div>';

					}

					echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();
			
			// PARTNER INSTITUTIONS
				$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'tax_query'		=> array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'sponsor-type',
							'field'		=> 'slug',
							'terms'		=> 'partners',
						),
						array(
							'taxonomy'	=> 'sponsor-year',
							'field'		=> 'id',
							'terms'		=> $sponsor_year,
						),
						array(
							'taxonomy'	=> 'sponsor-newsletter',
							'field'		=> 'slug',
							'terms'		=> 'yes',
						),
					),
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

					echo '<tr mc:repeatable>';
					echo '<td align="left" valign="top" class="newsletterSponsors" bgcolor="white">';

					echo '<h2><span>Partner Institutions</span></h2>';

					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$post_title		= get_the_title();
						$post_content	= get_the_content();
						$sponsor_link	= get_field('sponsor_link');
						$sponsor_logo	= get_field('sponsor_logo');

						echo '<div class="sponsorItem">';
						if ($sponsor_logo != null) {
							echo '<div class="image equalheight-gold-img">';
								echo "<a href=\"$sponsor_link\">";
									echo wp_get_attachment_image($sponsor_logo, 'full');
								echo "</a>";
							echo '</div>';
						}
						echo '</div>';

					}

					echo '</td>';
					echo '</tr>';
				}
				wp_reset_postdata();

			?>

		</table>
		<!-- // END COLUMNS -->
	</td>
</tr>