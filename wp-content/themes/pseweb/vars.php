<?php

	// ## - Theme Paths
	//--------------------------------------------------------------------------------------
	$theme_path						= get_bloginfo('template_directory');
	$site_name						= get_bloginfo('name');
	$site_url						= get_bloginfo('url');

	// ## - Homepage Options
	//--------------------------------------------------------------------------------------
	$homepage_identification		= get_field('homepage_identification', 'option');

	// ## - General Options
	//--------------------------------------------------------------------------------------
	$sponsor_highlight				= get_field('sponsor_highlight', 'option');
	$sponsor_highlighted			= get_field('sponsor_highlighted', 'option');
	$random_sponsor_title			= get_field('random_sponsor_title', 'option');

	// ## - Social Options
	//--------------------------------------------------------------------------------------
	$twitter						= get_field('twitter', 'option');
	$facebook						= get_field('facebook', 'option');
	$gplus							= get_field('google_plus', 'option');
	$instagram						= get_field('instagram', 'option');

	// ## - Section Titles
	//--------------------------------------------------------------------------------------
	$speakers_title					= get_field('speakers_title', 'option');
	$sessions_title					= get_field('sessions_title', 'option');
	$blog_title						= get_field('blog_title', 'option');
	$sponsors_title					= get_field('sponsors_title', 'option');

	// ## - Sidebar Options
	//--------------------------------------------------------------------------------------
	$speakers_title					= get_field('speakers_title', 'option');

	// ## - Footer Options
	//--------------------------------------------------------------------------------------
	$button_txt_left				= get_field('left_button_text', 'option');
	$button_link_left				= get_field('left_button_link', 'option');
	$button_txt_middle				= get_field('middle_button_text', 'option');
	$button_link_middle				= get_field('middle_button_link', 'option');
	$button_txt_right				= get_field('right_button_text', 'option');
	$button_link_right				= get_field('right_button_link', 'option');

	// ## - Year Options
	//--------------------------------------------------------------------------------------
	$speaker_year					= get_field('speaker_year', 'option');
	$session_year					= get_field('session_year', 'option');
	$sponsor_year					= get_field('sponsor_year', 'option');

	$title_year = get_field('title_year', 'option');
	if ( $title_year != null ) {
		$display_year = " $title_year";
	} else {
		$display_year = null;
	}

?>