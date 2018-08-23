<div class="container sections section-posts">

	<div class="row heading">
		<div class="col-lg-12">
			<h3><span>Recent Blog Posts</span></h3>
			<p class="headinglink"><a href="<?php echo $site_url; ?>/blog/">View more posts</a></p>
		</div>
	</div>

	<div class="row">

		<?php

			if (isset($current_post)) {
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page'	=> 3,
					'post__not_in'		=> array( $current_post ),
				);
			} else {
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page'	=> 3,
				);
			}

			$the_query = new WP_Query( $args );
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$i++;

			if ($i > 2) {
				$postsHide = 'col-lg-4 col-sm-4 col-xs-6 hide-below-768';
			} else {
				$postsHide = 'col-lg-4 col-sm-4 col-xs-6';
			}

			$post_title		= get_the_title();
			$post_link		= get_permalink();
			$post_date		= get_the_date('l, F j, Y');
			$excerpt		= get_custom_excerpt(240, '... ', 'Read more');

		?>

		<div class="<?php echo $postsHide; ?>">
			<h4><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></h4>
			<div class="postdate"><p><?php echo $post_date; ?>, posted in <?php the_category(', '); ?></p></div>
			<p><?php echo $excerpt; ?></p>
		</div>

		<?php
			endwhile;
			wp_reset_query();
		?>

	</div>
</div> <!-- end container -->