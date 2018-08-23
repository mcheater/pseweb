<?php
	include('header.php');

	$sponsor_intro					= get_field('sponsor_intro', 'option');
	$sponsor_backup_text			= get_field('sponsor_backup_text', 'option');
	$sponsor_intro_text				= get_field('sponsor_intro_text', 'option');
	$sponsor_intro_button_text		= get_field('sponsor_intro_button_text', 'option');
	$sponsor_intro_button_link		= get_field('sponsor_intro_button_link', 'option');
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if ( $sponsors_title != null ) {
						echo "<h1>$sponsors_title</h1>";
					} else {
						echo "<h1>Our Sponsors</h1>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<?php

		// INTRO CONTENT
		if ( $sponsor_intro == 'Yes' ) {

			echo '<div class="row">';
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">';
					echo $sponsor_intro_text;
					echo "<p><a href=\"$sponsor_intro_button_link\">$sponsor_intro_button_text</a></p>";
				echo '</div>';
			echo '</div>';

		}

		// PLATINUM SPONSORS
		$args=array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				'relation'		=> 'AND',
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

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			echo '<div class="sponsors content">';
				echo '<div class="row">';
					echo '<div class="col-lg-12">';
						echo '<h2 class="heading"><span>Platinum Sponsors</span></h2>';
					echo '</div>';
				echo '</div>';

				echo '<div class="row">';

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-8 col-md-8 col-sm-12">';
						echo '<div class="platinum-sponsor equalheight-platinum">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-platinum-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
								if ( $sponsor_link != null) {
									echo "<a href=\"$sponsor_link\">";
								}
								echo $post_title;
								if ( $sponsor_link != null) {
									echo '</a>';
								}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';

				}

				echo '</div>';
			echo '</div>';
		}
		wp_reset_postdata();

		// GOLD SPONSORS
		$args=array(
			'post_type'		=> 'pse-sponsors',
			'posts_per_page'		=> -1,
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
			),
		);

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			echo '<div class="sponsors content">';
				echo '<div class="row">';
					echo '<div class="col-lg-12">';
						echo '<h2 class="heading"><span>Gold Sponsors</span></h2>';
					echo '</div>';
				echo '</div>';

				echo '<div class="row">';

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-4 col-md-6 col-sm-6">';
						echo '<div class="gold-sponsor equalheight-gold">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-gold-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
								if ( $sponsor_link != null) {
									echo "<a href=\"$sponsor_link\">";
								}
								echo $post_title;
								if ( $sponsor_link != null) {
									echo '</a>';
								}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';

				}

				echo '</div>';
			echo '</div>';
		}
		wp_reset_postdata();

		// SILVER SPONSORS
		$args=array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				'relation'		=> 'AND',
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
			),
		);

		$the_query = new WP_Query( $args );


		

			if ( $the_query->have_posts() ) {
				
				echo '<div class="sponsors content">';

			echo '<div class="row">';
				echo '<div class="col-lg-12">';
					echo '<h2 class="heading"><span>Silver Sponsors</span></h2>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row">';

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-3 col-md-4 col-sm-4">';
						echo '<div class="silver-sponsor equalheight-silver">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-silver-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
								if ( $sponsor_link != null) {
									echo "<a href=\"$sponsor_link\">";
								}
								echo $post_title;
								if ( $sponsor_link != null) {
									echo '</a>';
								}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';
					
					echo '</div>'; // end row
		echo '</div>'; // end sponsors

				}
			}

			else {
				// echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					// echo '<div class="sponsors-missing">';
						// echo $sponsor_backup_text;
						// echo "<p><a href=\"$sponsor_intro_button_link\">$sponsor_intro_button_text</a></p>";
					// echo '</div>';
				// echo '</div>';
			}

			

		wp_reset_postdata();

		// BRONZE SPONSORS
		$args=array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				'relation'		=> 'AND',
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
			),
		);

		$the_query = new WP_Query( $args );


		

			if ( $the_query->have_posts() ) {
				
				echo '<div class="sponsors content">';

			echo '<div class="row">';
				echo '<div class="col-lg-12">';
					echo '<h2 class="heading"><span>Bronze Sponsors</span></h2>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row">';

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-3 col-md-4 col-sm-4">';
						echo '<div class="bronze-sponsor equalheight-bronze">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-bronze-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
							if ( $sponsor_link != null) {
								echo "<a href=\"$sponsor_link\">";
							}
							echo $post_title;
							if ( $sponsor_link != null) {
								echo '</a>';
							}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';
					
						echo '</div>'; // end row
		echo '</div>'; // end sponsors

				}
			}

			else {
				// echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					// echo '<div class="sponsors-missing">';
						// echo $sponsor_backup_text;
						// echo "<p><a href=\"$sponsor_intro_button_link\">$sponsor_intro_button_text</a></p>";
					// echo '</div>';
				// echo '</div>';
			}

		

		wp_reset_postdata();
	
	// MISC SPONSORS
		$args=array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				'relation'		=> 'AND',
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
			),
		);

		$the_query = new WP_Query( $args );


		echo '<div class="sponsors content">';

			echo '<div class="row">';
				echo '<div class="col-lg-12">';
					echo '<h2 class="heading"><span></span></h2>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row">';

			if ( $the_query->have_posts() ) {

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-3 col-md-4 col-sm-4">';
						echo '<div class="silver-sponsor equalheight-silver">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-silver-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
								if ( $sponsor_link != null) {
									echo "<a href=\"$sponsor_link\">";
								}
								echo $post_title;
								if ( $sponsor_link != null) {
									echo '</a>';
								}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';

				}
			}

			else {
				echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					echo '<div class="sponsors-missing">';
						echo $sponsor_backup_text;
						echo "<p><a href=\"$sponsor_intro_button_link\">$sponsor_intro_button_text</a></p>";
					echo '</div>';
				echo '</div>';
			}

			echo '</div>'; // end row
		echo '</div>'; // end sponsors

		wp_reset_postdata();
	
	// PARTNER INSTITUTIONS
		$args=array(
			'post_type'			=> 'pse-sponsors',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				'relation'		=> 'AND',
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
			),
		);

		$the_query = new WP_Query( $args );


		echo '<div class="sponsors content">';

			echo '<div class="row">';
				echo '<div class="col-lg-12">';
					echo '<h2 class="heading"><span>Partner Institutions</span></h2>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row">';

			if ( $the_query->have_posts() ) {

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_title		= get_the_title();
					$post_content	= get_the_content();
					$sponsor_link	= get_field('sponsor_link');
					$sponsor_logo	= get_field('sponsor_logo');

					echo '<div class="col-lg-3 col-md-4 col-sm-4">';
						echo '<div class="silver-sponsor equalheight-silver">';
							if ($sponsor_logo != null) {
								echo '<div class="image equalheight-silver-img">';
									echo "<a href=\"$sponsor_link\">";
										echo wp_get_attachment_image($sponsor_logo, 'full');
									echo "</a>";
								echo '</div>';
							}
							echo '<h3>';
								if ( $sponsor_link != null) {
									echo "<a href=\"$sponsor_link\">";
								}
								echo $post_title;
								if ( $sponsor_link != null) {
									echo '</a>';
								}
							echo '</h3>';
							echo "<p>$post_content</p>";
						echo '</div>';
					echo '</div>';

				}
			}

			else {
				echo '<div class="col-lg-12 col-md-12 col-sm-12">';
					echo '<div class="sponsors-missing">';
						echo $sponsor_backup_text;
						echo "<p><a href=\"$sponsor_intro_button_link\">$sponsor_intro_button_text</a></p>";
					echo '</div>';
				echo '</div>';
			}

			echo '</div>'; // end row
		echo '</div>'; // end sponsors

		wp_reset_postdata();

		

		


		include('sharing.php');
	?>

</div> <!-- end container -->

<?php

	$sponsor_footer_default = get_field('sponsor_footer_default', 'option');
	if ( $sponsor_footer_default == 'Custom' ) {
		include('assets/footer/sponsors.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>