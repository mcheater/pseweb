<?php
	if( have_rows('session_items', 'option') ):
		while ( have_rows('session_items', 'option') ) : the_row();

			if ( get_row_layout() == 'speakers' ) {
				include('components/speakers.php');
			}

			if ( (get_row_layout() == 'sessions') && (!is_post_type_archive('pse-sessions')) && (!is_tax('session-tags')) && (!is_tax('session-track')) && (!is_tax('session-year')) ) {
				include('components/sessions.php');
			}

			if ( get_row_layout() == 'blog_posts' ) {
				include('components/blog-posts.php');
			}

			if ( get_row_layout() == 'sponsors' ) {
				include('components/sponsors.php');
			}

		endwhile;
	endif;
?>