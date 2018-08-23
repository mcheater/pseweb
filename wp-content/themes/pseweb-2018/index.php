<?php
	include('header.php');

	$banner_text			= get_field('banner_text', $homepage_identification);
	$banner_image_type		= get_field('banner_image_type', $homepage_identification);
	$banner_preset			= get_field('banner_preset', $homepage_identification);
	$banner_custom			= get_field('banner_custom', $homepage_identification);
	$banner_link			= get_field('banner_link', $homepage_identification);
?>

	<div class="banner">

		<?php

			if ( $banner_image_type == 'Custom' && $banner_custom != null ) {
				echo wp_get_attachment_image($banner_custom, 'homepage-banner');
			}

			elseif ( $banner_image_type == 'Custom' && $banner_custom == null ) {
				echo "<img src=\"$theme_path/assets/images/default-banner.jpg\" alt=\"$banner_text\" />";
			}

			elseif ( $banner_image_type == 'Preset' ) {
				echo "<img src=\"$theme_path/assets/images/$banner_preset.jpg\" alt=\"$banner_text\" />";
			}

		?>

		<div class="container">
			<div class="row">
				<?php
					echo '<div class="text">';
					// echo "<p>";

					// IF LINK IS SET
					if ( $banner_link != null ) {
						echo "<p>";
						echo "<a href=\"$banner_link\">";
					} else {
						echo '<p class="no-link">';
					}

					echo $banner_text;

					// IF LINK IS SET
					if ( $banner_link != null ) {
						echo "</a>";
					}

					echo "</p>";
					echo '</div>';
				?>
			</div>
		</div>
	</div>

<?php

	if( have_rows('homepage_blocks', $homepage_identification) ):
		while ( have_rows('homepage_blocks', $homepage_identification) ) : the_row();

			if ( get_row_layout() == 'announcements' ){
				include('assets/footer/components/announcements.php');
			}

			if ( get_row_layout() == 'speakers' ){
				include('assets/footer/components/speakers.php');
			}

			if ( get_row_layout() == 'sessions' ){
				include('assets/footer/components/sessions.php');
			}

			if ( get_row_layout() == 'blog_posts' ){
				include('assets/footer/components/blog-posts.php');
			}

			if ( get_row_layout() == 'sponsors' ){
				include('assets/footer/components/sponsors.php');
			}

			if ( get_row_layout() == 'tweets' ){
				include('assets/footer/components/tweets.php');
			}

		endwhile;
	endif;

	include('footer.php'); ?>