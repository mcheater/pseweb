<?php
	if( have_rows('blog_items', 'option') ):
		while ( have_rows('blog_items', 'option') ) : the_row();

			if ( get_row_layout() == 'speakers' ) {
				include('components/speakers.php');
			}

			if ( get_row_layout() == 'sessions' ) {
				include('components/sessions.php');
			}

			if ( (get_row_layout() == 'blog_posts') && (!is_page_template( 'pg-blog.php' )) && (!is_archive()) ) {
				include('components/blog-posts.php');
			}

			if ( get_row_layout() == 'sponsors' ) {
				include('components/sponsors.php');
			}

		endwhile;
	endif;
?>