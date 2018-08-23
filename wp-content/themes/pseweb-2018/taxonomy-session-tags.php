<?php

	$queried_object		= get_queried_object();
	$tax_name			= $queried_object->taxonomy;
	$term_name			= $queried_object->name;
	$term_id			= $queried_object->term_id;
//	$term_slug			= $queried_object->slug;
//	$term_desc			= $queried_object->description;

	include('header.php');

?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1><?php echo $term_name; ?> Sessions</h1>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row sessions-list">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 content">

			<?php

				$args=array(
					'post_type'			=> 'pse-sessions',
					'posts_per_page'	=> -1,
					'order'				=> 'ASC',
					'orderby'			=> 'title',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy'	=> 'session-tags',
							'field'		=> 'id',
							'terms'		=> $term_id,
						),
						array(
							'taxonomy'	=> 'session-track',
							'field'		=> 'id',
							'terms'		=> array( 112 ),
							'operator' => 'NOT IN',
						),
					),
				);

				$the_query = new WP_Query( $args );
				$i = 0;
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$i++;

					if ($i % 2 == 0) {
						$session_space = 'session-right';
					} else {
						$session_space = 'session-left';
					}

					$post_title			= get_the_title();
					$post_link			= get_permalink();
					$date				= get_field('date');
					$new_date			= DateTime::createFromFormat('d/m/Y', $date);
					$start_hour			= get_field('start_hour');
					$start_min			= get_field('start_minute');
					$start_time			= "$start_hour:$start_min";

					$excerpt = strip_tags(get_the_excerpt());
					$title_len = strlen($post_title);

					?>

					<div class="session <?php echo $session_space; ?>">
						<div class="speaker-item equalheight">
							<?php
								echo "<h2><a href=\"$post_link\">$post_title</a></h2>";

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

								if ($title_len <= 30){
									$limit = 270; //calc space remaining for excerpt
								}
								elseif ($title_len <= 60){
									$limit = 230; //calc space remaining for excerpt
								}
								elseif ($title_len <= 75){
									$limit = 180;
								}
								elseif ($title_len <= 90){
									$limit = 140;
								}
								else {
									$limit = 100;
								}
								$summary = substr($excerpt, 0, strrpos(substr($excerpt, 0, $limit), ' ')) . '...';

								echo "<p>$summary <a href=\"$post_link\">More</a></p>";
							?>
						</div>
					</div>

				<?php
				endwhile;
				wp_reset_query();
			?>

		</div>

		<?php
			$sessions_sidebar_default = get_field('sessions_sidebar_default', 'option');
			if ( $sessions_sidebar_default == 'Custom' ) {
				include('assets/sidebars/sessions.php');
			} else {
				include('assets/sidebars/global.php');
			}
		?>

	</div>
</div> <!-- end container -->

<?php

	$session_footer_default = get_field('session_footer_default', 'option');
	if ( $session_footer_default == 'Custom' ) {
		include('assets/footer/sessions.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>