<?php
	if( have_rows('global_items', 'option') ):
		while ( have_rows('global_items', 'option') ) : the_row();

			if ( (get_row_layout() == 'speakers') && (!is_post_type_archive('pse-speakers')) && (!is_tax('speaker-year')) ) {
				include('components/speakers.php');
			}

			if ( (get_row_layout() == 'sessions') && (!is_post_type_archive('pse-sessions')) && (!is_tax('session-tags')) && (!is_tax('session-track')) && (!is_tax('session-year')) ) {
				include('components/sessions.php');
			}

			if ( (get_row_layout() == 'blog_posts') && (!is_page_template( 'pg-blog.php' )) && (!is_archive()) ) {
				include('components/blog-posts.php');
			}

			if ( (get_row_layout() == 'sponsors') && (!is_post_type_archive('pse-sponsors')) ) {
				include('components/sponsors.php');
			}

		endwhile;
	endif;
?>