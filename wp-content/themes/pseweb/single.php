<?php
	include('header.php');
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$current_post = get_the_ID();
?>

<div class="section-headers">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if ( $blog_title != null ) {
						echo "<h2>$blog_title</h2>";
					} else {
						echo "<h2>From the Blog</h2>";
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-8 col-md-8 content">
			<h1><?php the_title(); ?></h1>
			<div class="postdate">
				<p>Posted on <?php the_date('l, F j, Y'); ?> by <?php the_author_posts_link(); ?></p>
			</div>
			<div class="postmeta">
				<p>Categorized as <?php the_category(', '); ?>
				<?php the_tags(' and tagged with ',', ', ''); ?>
				</p>
			</div>

			<?php
				the_content();
				include('sharing.php');
				comments_template('', true);
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
	endwhile;
	endif;
	wp_reset_query();

	$blog_footer_default = get_field('blog_footer_default', 'option');
	if ( $blog_footer_default == 'Custom' ) {
		include('assets/footer/blog.php');
	} else {
		include('assets/footer/global.php');
	}

	include('footer.php');
?>