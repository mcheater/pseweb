<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar">

	<?php

		if( have_rows('global_sidebar', 'option') ):
			while ( have_rows('global_sidebar', 'option') ) : the_row();

				if ( get_row_layout() == 'content_block' ){
					include('components/content.php');
				}

				if ( get_row_layout() == 'button' ){
					include('components/button.php');
				}

				if ( get_row_layout() == 'signup_form' ){
					include('components/subscribe.php');
				}

				if ( get_row_layout() == 'speakers' ){
					include('components/speakers.php');
				}

				if ( get_row_layout() == 'sessions' ){
					 include('components/sessions.php');
				}

				if ( get_row_layout() == 'blog_posts' ){
					include('components/blog-posts.php');
				}

				if ( get_row_layout() == 'categories' ){
					include('components/categories.php');
				}

				if ( get_row_layout() == 'sponsors' ){
					include('components/sponsors.php');
				}

			endwhile;
		endif;

	?>

</div>