<?php
	$blog_title			= get_sub_field('blog_title', 'option');
	$blog_shown			= get_sub_field('blog_shown', 'option');
	$blog_category		= get_sub_field('blog_category', 'option');
?>

<aside class="blog-posts">
	<h3><?php echo $blog_title; ?></h3>

	<?php

		// GET SELECTED CATEGORIES
		foreach( $blog_category as $categories ):
			$results[] = $categories->term_id;
		endforeach;
		$cats = implode(", ",$results);

		$args=array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $blog_shown,
			'cat'				=> $cats
		);

		$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) : $the_query->the_post();

		$post_title			= get_the_title();
		$post_link			= get_permalink();
		$post_date			= get_the_date('l, F j, Y');
		$excerpt			= get_custom_excerpt(120, '... ', 'More');

	?>

	<div class="blog-post">
		<?php
			echo "<h4><a href=\"$post_link\">$post_title</a></h4>";
			echo "<div class=\"postdate\"><p>$post_date</p></div>";
			echo "<p>$excerpt</p>";
		?>
	</div>

	<?php
		endwhile;
		wp_reset_query();
	?>

</aside>