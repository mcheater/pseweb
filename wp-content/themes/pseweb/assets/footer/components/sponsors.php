<div class="container sections section-sponsors">

	<div class="row heading">
		<div class="col-lg-12">
			<?php
				if ( $sponsors_title != null ) {
					echo "<h3><span>$sponsors_title</span></h3>";
				} else {
					echo "<h3><span>Our Sponsors</span></h3>";
				}
			?>
			<p class="headinglink"><a href="<?php echo $site_url; ?>/sponsors/">View more sponsors</a></p>
		</div>
	</div>

	<div class="row">

		<?php

			$args=array(
					'post_type'		=> 'pse-sponsors',
					'showposts'		=> 6,
					'orderby'		=> 'rand',
			);

			$the_query = new WP_Query( $args );
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i > 4) {
				$sponsorsHide = 'col-lg-2 col-md-2 col-sm-3 col-xs-4 hide-below-992';
			} elseif ($i > 3) {
				$sponsorsHide = 'col-lg-2 col-md-2 col-sm-3 col-xs-4 hide-below-768';
//				} elseif ($i > 2) {
//					$sponsorsHide = 'col-lg-2 col-md-2 col-sm-3 col-xs-4 hide-below-640';
			} else {
				$sponsorsHide = 'col-lg-2 col-md-2 col-sm-3 col-xs-4';
			}

			$sponsor_link	= get_field('sponsor_link');
			$sponsor_logo	= get_field('sponsor_logo');

		?>

		<div class="<?php echo $sponsorsHide; ?>">
			<?php
				if ($sponsor_logo != null) {
					echo '<div class="image equalheight-sponsors">';
						echo "<a href=\"$sponsor_link\">";
							echo wp_get_attachment_image($sponsor_logo, 'full');
						echo "</a>";
					echo '</div>';
				}
			?>
		</div>

		<?php
			endwhile;
			wp_reset_query();
		?>

	</div>
</div> <!-- end container -->