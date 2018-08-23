<?php
	if( have_rows('speaker_items', 'option') ):
		while ( have_rows('speaker_items', 'option') ) : the_row();

			if ( (get_row_layout() == 'speakers') && (!is_post_type_archive('pse-speakers')) && (!is_tax('speaker-year')) ) {
				include('components/speakers.php');
			}

			if ( get_row_layout() == 'sessions' ) {
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