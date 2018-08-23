<?php include('header.php'); ?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Search Results</h1>
			</div>
		</div>
	</div>
</div>

<div class="container content">
	<div class="row">

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-item equalheight">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php
				$post_title		= get_the_title();
				$post_link		= get_permalink();
				$excerpt		= strip_tags(get_the_excerpt());
				$title_len		= strlen($post_title);

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
	<?php endwhile; endif; wp_reset_query(); ?>

	</div>
</div> <!-- end container -->

<?php

	include('assets/includes/sponsors.php');
	include('assets/includes/tweets.php');
	include('footer.php');
?>