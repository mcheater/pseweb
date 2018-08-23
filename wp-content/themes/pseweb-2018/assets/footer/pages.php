<?php
	if( have_rows('page_items') ):
		while ( have_rows('page_items') ) : the_row();

			if ( get_row_layout() == 'speakers' ){
				include('components/speakers.php');
			}

			if ( get_row_layout() == 'sessions' ){
				include('components/sessions.php');
			}

			if ( get_row_layout() == 'blog_posts' ){
				include('components/blog-posts.php');
			}

			if ( get_row_layout() == 'sponsors' ){
				include('components/sponsors.php');
			}

		endwhile;
	endif;
?>