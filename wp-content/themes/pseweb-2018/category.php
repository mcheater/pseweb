<?php
	$catName	= single_term_title("", false);
	$catID		= get_cat_ID( $catName );
	include('header.php');
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php echo "<h1>Posts Category: $catName</h1>"; ?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8 content">
			<div class="post-reload">

				<?php

					$args=array(
						'post_type'			=> 'post',
						'posts_per_page'	=> 5,
						'cat'				=> $catID,
					);

					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post();

					$post_title		= get_the_title();
					$post_link		= get_permalink();
					$post_date		= get_the_date('l, F j, Y');
					$excerpt		= get_custom_excerpt(310, '... ', 'More');

				?>

				<div class="post-item">
					<h2><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></h2>
					<div class="postdate"><p><?php echo $post_date; ?>, posted in <?php the_category(', '); ?></p></div>
					<?php
						if ( has_post_thumbnail()) {
							echo get_the_post_thumbnail($post->ID, 'post-featured');
						}
					?>
					<p><?php echo $excerpt; ?></p>
				</div>

				<?php
					endwhile;
					wp_reset_query();
				?>

			</div> <!-- END POST RELOAD -->

			<?php $ajax_more_nonce = wp_create_nonce("ajax_more"); ?>
			<div class="more-button">
				<p><a class="load-more" data-catid="<?php echo $catID; ?>" data-nonce="<?php echo $ajax_more_nonce; ?>">Load More News</a></p>
			</div>

		</div>

		<?php
			$blog_sidebar_default = get_field('blog_sidebar_default', 'option');
			if ( $blog_sidebar_default == 'Custom' ) {
				include('assets/sidebars/blog.php');
			} else {
				include('assets/sidebars/global.php');
			}
		?>

	</div>
</div> <!-- end container -->

<?php

	$blog_footer_default = get_field('blog_footer_default', 'option');
	if ( $blog_footer_default == 'Custom' ) {
		include('assets/footer/blog.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');

?>