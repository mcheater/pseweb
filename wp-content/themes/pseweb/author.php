<?php
	include('header.php');
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

	$first_name		= $curauth->first_name;
	$last_name		= $curauth->last_name;
	$user_bio		= $curauth->user_description;
	$user_id		= $curauth->ID;
	$user_facebook	= $curauth->facebook;
	$user_twitter	= $curauth->twitter;
	$user_google	= $curauth->googleplus;
	$user_website	= $curauth->user_url;
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Author</h2>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-8 col-md-8 content">
			<h1><?php echo "$first_name $last_name"; ?></h1>

			<?php
				if ( $user_bio != null ) {
					echo "<p>$user_bio</p>";
				}

				if ( $user_facebook != null || $user_twitter != null || $user_google != null || $user_website != null ) {
					echo '<ul>';
				}

					if ( $user_facebook != null ) {
						echo "<li><a href=\"$user_facebook\">Facebook</a></li>";
					}

					if ( $user_twitter != null ) {
						echo "<li><a href=\"http://twitter.com/$user_twitter\">Twitter</a></li>";
					}

					if ( $user_google != null ) {
						echo "<li><a href=\"$user_google\">Google Plus</a></li>";
					}

					if ( $user_facebook != null ) {
						echo "<li><a href=\"$user_website\">Website</a></li>";
					}

				if ( $user_facebook != null || $user_twitter != null || $user_google != null || $user_website != null ) {
					echo '</ul>';
				}
			?>


			<?php

				$args=array(
						'post_type'			=> 'post',
						'posts_per_page'	=> -1,
						 'author'			=> $user_id,
				);

				$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) : $the_query->the_post();

				$post_title		= get_the_title();
				$post_link		= get_permalink();
				$post_date		= get_the_date('l, F j, Y');
				$excerpt		= get_custom_excerpt(310, '... ', 'More');

			?>

				<div class="author-item">
					<h2><a href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a></h2>
					<div class="postdate"><p><?php echo $post_date; ?>, posted in <?php the_category(', '); ?></p></div>
					<p><?php echo $excerpt; ?></p>
				</div>

			<?php
				endwhile;
				wp_reset_query();
			?>


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