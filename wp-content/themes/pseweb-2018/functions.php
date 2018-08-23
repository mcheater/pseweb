<?php

//
// #######################################################################
//	TABLE OF CONTENTS
// #######################################################################
//
// 		1 - Global Variables
//			1.1 - Something Variables
//
//		2 - Remove WP Head Junk
//
//		3 - jQuery Load Check
//
//		4 - Enqueue Styles and Scripts
//			4.1 - Load Stylesheets
//			4.2 - Load Modernizr
//			4.3 - Load Scripts
//
//		5 - Register Custom Post Types
//			5.1 - Register Homepage
//			5.2 - Register Speakers
//			5.3 - Register Presentations
//			5.4 - Register Sponsors
//			5.5 - Register Newsletter
//			5.6 - Flush rewrites on admin
//			5.7 - Sort Post Types in Admin Area
//
//		6 - Register Custom Taxonomies
//
//		7 - Dashboard Customization
//			7.1 - Reorder the admin menu
//			7.2 - Customize the admin panel widgets
//			7.3 - Remove Meta Boxes (trackbacks) from posts and pages
//			7.4 - Remove update notices for non-admin users
//			7.5 - Register Homepage Menu
//			7.6 - Register Options Menu
//			7.7 - Add ID columns to pages and posts (including customs)
//			7.8 - Add ID columns to taxonomies
//
//		8 - TinyMCE Customization
//			8.1 - Prevent TinyMCE from stripping iframe
//			8.2 - Customize Paragraph Types
//
//		9 - Theme Function
//			9.1 - Custom excerpt
//			9.2 - Custom Excerpt for Ajax Loading
//			9.3 - Fix the admin bar CSS
//			9.4 - Override posts_per_page on search template
//			9.5 - Remove Forced Image Inline Style
//			9.6 - Add div to oembed to force responsiveness
//			9.7 - Remove Yoast from post columns, and re-order the metabox
//			9.8 - Customize Admin Bar
//			9.9 - Remove automatically generated rel="category tag"
//			9.10 - Remove the ability to link attachments to themselves
//			9.11 - Remove search Class from body class
//			9.12 - Get top post ancestor ID
//			9.13 - Echo top post ancestor title
///			9.14 - Get top post ancestor title
///			9.15 - Check if page has children
///			9.16 - Add "is child"
//
//		10 - Post 2 Post Relationships
//
//		11 - Register Theme Options
//
//		12 - Post Thumbnail Support
//
//		13 - Register Image Sizes
//
//		14 - Register WP Menu
//
//		15 - Gravity Forms Post Submission
//			15.1 - Employer Type
//			15.2 - Alternate Topics Checklist
//
//		16 - Load More Posts with Ajax
//
//		17 - Post Comments






//
// #######################################################################
//	1 - Global Variables
// -----------------------------------------------------------------------

	// ## - 1.1 - Something Variables
	//--------------------------------------------------------------------

	$theme_path		= get_bloginfo('template_directory');






//
// #######################################################################
//	2 - Remove WP Head Junk
// -----------------------------------------------------------------------

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');






//
// #######################################################################
//	3 - jQuery Load Check
// -----------------------------------------------------------------------

	$googleURL = 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';
	$checkURL = @fopen($googleURL,'r');

	if( $checkURL !== false ) {
		// Use Google CDN if url is available
		function load_external_jQuery() {
			wp_deregister_script( 'jquery' );
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
			wp_enqueue_script('jquery');
		}
		add_action('wp_enqueue_scripts', 'load_external_jQuery');
	} else {
		// Use local if url is not available
		function load_local_jQuery() {
			wp_enqueue_script('jquery');
		}
		add_action('wp_enqueue_scripts', 'load_local_jQuery');
	}






//
// #######################################################################
//	4 - Enqueue Styles and Scripts
// -----------------------------------------------------------------------

	function pseweb_enqueue() {

		// ## - 4.1 - Load Stylesheets
		wp_enqueue_style( 'styles', get_stylesheet_uri() );
		wp_enqueue_style( 'styles-min', get_template_directory_uri() . '/assets/css/styles-min.css' );

		// ## - 4.2 - Load Modernizr
		wp_register_script('modernizr-min', get_template_directory_uri() . '/assets/js/modernizr-min.js', array('jquery'), false, false);
		wp_enqueue_script('modernizr-min');

		// ## - 4.3 - Load Scripts
		wp_register_script( 'scripts-min', get_template_directory_uri() . '/assets/js/scripts-min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'scripts-min' );
	}

	add_action( 'wp_enqueue_scripts', 'pseweb_enqueue' );






//
// #######################################################################
//	5 - Register Custom Post Types
// -----------------------------------------------------------------------

	function pseweb_post_types() {

		// ## - 5.1 - Register Homepage
		register_post_type('pse-homepage',
			array(
				'label' => 'Homepage',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'page',
				'hierarchical' => false,
				'rewrite' => false,
				'query_var' => true,
				'menu_position' => 3,
				'supports' => array( 'title' ),
				'labels' => array(
					'name' => 'Homepage',
					'singular_name' => 'Homepage',
					'menu_name' => 'Homepage',
					'add_new' => 'Add Homepage',
					'add_new_item' => 'Add New Homepage',
					'edit' => 'Edit',
					'edit_item' => 'Edit Homepage',
					'new_item' => 'New Homepage',
					'view' => 'View Homepage',
					'view_item' => 'View Homepage',
					'search_items' => 'Search Homepage',
					'not_found' => 'No Homepage Found',
					'not_found_in_trash' => 'No Homepage Found in Trash',
					'parent' => 'Parent Homepage',
				),
			)
		);

		// ## - 5.2 - Register Speakers
		register_post_type('pse-speakers',
			array(
				'label' => 'Speakers',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array( 'slug'=>'speakers', 'with_front'=>true ),
				'query_var' => true,
				'menu_position' => 6,
				'supports' => array( 'title', 'editor' ),
				'labels' => array(
					'name' => 'Speakers',
					'singular_name' => 'Speaker',
					'menu_name' => 'Speakers',
					'add_new' => 'Add Speaker',
					'add_new_item' => 'Add New Speaker',
					'edit' => 'Edit',
					'edit_item' => 'Edit Speaker',
					'new_item' => 'New Speaker',
					'view' => 'View Speaker',
					'view_item' => 'View Speaker',
					'search_items' => 'Search Speakers',
					'not_found' => 'No Speakers Found',
					'not_found_in_trash' => 'No Speakers Found in Trash',
					'parent' => 'Parent Speaker',
				),
			)
		);

		// ## - 5.3 - Register Presentations
		register_post_type('pse-sessions',
			array(
				'label' => 'Sessions',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array( 'slug'=>'sessions', 'with_front'=>true ),
				'query_var' => true,
				'menu_position' => 7,
				'supports' => array( 'title', 'editor' ),
				'labels' => array(
					'name' => 'Sessions',
					'singular_name' => 'Session',
					'menu_name' => 'Sessions',
					'add_new' => 'Add Session',
					'add_new_item' => 'Add New Session',
					'edit' => 'Edit',
					'edit_item' => 'Edit Session',
					'new_item' => 'New Session',
					'view' => 'View Session',
					'view_item' => 'View Session',
					'search_items' => 'Search Sessions',
					'not_found' => 'No Sessions Found',
					'not_found_in_trash' => 'No Sessions Found in Trash',
					'parent' => 'Parent Session',
				),
			)
		);

		// ## - 5.4 - Register Sponsors
		register_post_type('pse-sponsors',
			array(
				'label' => 'Sponsors',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array( 'slug'=>'sponsors', 'with_front'=>true ),
				'query_var' => true,
				'menu_position' => 7,
				'supports' => array( 'title', 'editor' ),
				'labels' => array(
					'name' => 'Sponsors',
					'singular_name' => 'Sponsor',
					'menu_name' => 'Sponsors',
					'add_new' => 'Add Sponsor',
					'add_new_item' => 'Add New Sponsor',
					'edit' => 'Edit',
					'edit_item' => 'Edit Sponsor',
					'new_item' => 'New Sponsor',
					'view' => 'View Sponsor',
					'view_item' => 'View Sponsor',
					'search_items' => 'Search Sponsors',
					'not_found' => 'No Sponsors Found',
					'not_found_in_trash' => 'No Sponsors Found in Trash',
					'parent' => 'Parent Sponsor',
				),
			)
		);

		// ## - 5.5 - Register Newsletter
		register_post_type('pse-newsletter',
			array(
				'label' => 'Newsletters',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array( 'slug'=>'newsletter', 'with_front'=>true ),
				'query_var' => true,
				'menu_position' => 7,
				'supports' => array( 'title' ),
				'labels' => array(
					'name' => 'Newsletters',
					'singular_name' => 'Newsletter',
					'menu_name' => 'Newsletters',
					'add_new' => 'Add Newsletter',
					'add_new_item' => 'Add New Newsletter',
					'edit' => 'Edit',
					'edit_item' => 'Edit Newsletter',
					'new_item' => 'New Newsletter',
					'view' => 'View Newsletter',
					'view_item' => 'View Newsletter',
					'search_items' => 'Search Newsletters',
					'not_found' => 'No Newsletters Found',
					'not_found_in_trash' => 'No Newsletters Found in Trash',
					'parent' => 'Parent Newsletter',
				),
			)
		);

	}
	add_action('init', 'pseweb_post_types', 1);

	// ## - 5.6 - Flush rewrites on admin
	function reflush_rules() {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	add_action('admin_init', 'reflush_rules');

	// ## - 5.7 - Sort Post Types in Admin Area
	add_action( 'pre_get_posts', 'pse_cpt_order' );
	function pse_cpt_order( $query ) {
		$post_type = $query->get('post_type');

	if ( $post_type == 'pse-speakers' || $post_type == 'pse-sponsors' ) {
		if ( $query->get( 'orderby' ) == '' ) {
				$query->set( 'orderby', 'title' );
			}
			if( $query->get( 'order' ) == '' ){
				$query->set( 'order', 'ASC' );
			}
		}
	}

//
// #######################################################################
//  6 - Register Custom Taxonomies
// -----------------------------------------------------------------------

	// ## - 6.1 -  Sponsor Taxonomy
	function register_sponsor_taxonomies() {

		// Sponsorship Level
		register_taxonomy( 'sponsor-type',
			array( 'pse-sponsors'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sponsors-by-level','with_front'=>true),
				'labels' => array(
					'name' => __( 'Sponsors by Level' ),
					'singular_name' => __( 'Sponsors by Level' )
				),
			)
		);

		// Sponsorship Year
		register_taxonomy( 'sponsor-year',
			array( 'pse-sponsors'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sponsors-by-year','with_front'=>true),
				'labels' => array(
					'name' => __( 'Sponsors by Years' ),
					'singular_name' => __( 'Sponsors by Year' )
				),
			)
		);

		// Sponsorship Inclusion
		register_taxonomy( 'sponsor-newsletter',
			array( 'pse-sponsors'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sponsors-newsletter','with_front'=>false),
				'labels' => array(
					'name' => __( 'Include in Newsletter' ),
					'singular_name' => __( 'Include in Newsletter' )
				),
			)
		);

	}
	add_action( 'init', 'register_sponsor_taxonomies', 0 );

	// ## - 6.2 -  Speaker Taxonomy
	function register_speaker_taxonomies() {

		// Speaking Year
		register_taxonomy( 'speaker-year',
			array( 'pse-speakers'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'speakers-by-year','with_front'=>true),
				'labels' => array(
					'name' => __( 'Speakers by Year' ),
					'singular_name' => __( 'Speaker by Year' )
				),
			)
		);

	}
	add_action( 'init', 'register_speaker_taxonomies', 0 );

	// ## - 6.3 -  Session Taxonomy
	function register_session_taxonomies() {

		// Session Year
		register_taxonomy( 'session-year',
			array( 'pse-sessions'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sessions-by-year','with_front'=>true),
				'labels' => array(
					'name' => __( 'Sessions by Year' ),
					'singular_name' => __( 'Session by Year' )
				),
			)
		);

		// Session Track
		register_taxonomy( 'session-track',
			array( 'pse-sessions'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sessions-by-track','with_front'=>true),
				'labels' => array(
					'name' => __( 'Sessions by Track' ),
					'singular_name' => __( 'Session by Track' )
				),
			)
		);

		// Session Tag
		register_taxonomy( 'session-tags',
			array( 'pse-sessions'),
			array(
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug'=>'sessions-by-tags','with_front'=>true),
				'labels' => array(
					'name' => __( 'Sessions by Tag' ),
					'singular_name' => __( 'Session by Tag' )
				),
			)
		);

	}
	add_action( 'init', 'register_session_taxonomies', 0 );






//
// #######################################################################
//  7 - Dashboard Customization
// -----------------------------------------------------------------------

	// ## - 7.1 - Reorder the admin menu
	function custom_menu_order($menu_ord) {
		if ( !$menu_ord ) return true;
		return array(
				'index.php',
				'edit.php?post_type=pse-homepage',
				'edit.php',
				'edit.php?post_type=page',
				'edit.php?post_type=pse-speakers',
				'edit.php?post_type=pse-sessions',
				'edit.php?post_type=pse-sponsors',
				'edit.php?post_type=pse-newsletter',
		);
	}
	add_filter('custom_menu_order', 'custom_menu_order');
	add_filter('menu_order', 'custom_menu_order');

	// ## - 7.2 - Customize the admin panel widgets
	function cu_remove_dashboard_widgets() {
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['feedwordpress_dashboard']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}
	add_action('wp_dashboard_setup', 'cu_remove_dashboard_widgets' );

	// ## - 7.3 - Remove Meta Boxes (trackbacks) from posts and pages
	function customize_meta_boxes() {
		remove_meta_box('trackbacksdiv','post','normal'); // remove trackbacks module
		remove_meta_box('trackbacksdiv','page','normal'); // remove trackbacks module
	}
	add_action('admin_init','customize_meta_boxes');

	// ## - 7.4 - Remove update notices for non-admin users
	global $user_login;
	get_currentuserinfo();
	if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
		add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
	}

	// ## - 7.5 - Register Homepage Menu
	if (function_exists('get_field')) {
		$cu_homemenu_id = get_field( 'homepage_id', 'option' );
		function register_homepage_options_menu() {
			global $cu_homemenu_id;
			add_menu_page('Homepage', 'Homepage', 'edit_posts', "post.php?post=$cu_homemenu_id&action=edit", '', '');
		}
	}
	if (isset($cu_homemenu_id)) {
		add_action('admin_menu', 'register_homepage_options_menu');
	}

	// ## - 7.6 - Register Options Menu
//	if (function_exists('get_field')) {
//		$cu_asidemenu_id = get_field( 'options_id', 'option' );
//		function register_asides_options_menu() {
//			global $cu_asidemenu_id;
//			add_menu_page('Options', 'Options', 'edit_posts', "post.php?post=$cu_asidemenu_id&action=edit", '', '');
//		}
//	}
//	if ($cu_asidemenu_id != "") {
//		add_action('admin_menu', 'register_asides_options_menu');
//	}

	// ## - 7.7 - Add ID columns to pages and posts (including customs)
	function posts_columns_id($defaults)  {
		$defaults['wps_post_id'] = __('ID');
		return $defaults;
	}
	function posts_custom_id_columns($column_name, $id) {
		if($column_name === 'wps_post_id'){
			echo $id;
		}
	}
	add_filter('manage_posts_columns', 'posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

	// ## - 7.8 - Add ID columns to taxonomies
	function id_columns($defaults) {
		$defaults['id_columns'] = __('ID');
		return $defaults;
	}
	function id_custom_columns($value, $column_name, $id) {
		if( $column_name == 'id_columns' ) {
			return (int)$id;
		}
	}
	add_filter('manage_edit-category_columns', 'id_columns', 5);
	add_action('manage_category_custom_column', 'id_custom_columns', 5, 3);
	add_filter('manage_edit-daevent-type_columns', 'id_columns', 5);
	add_action('manage_daevent-type_custom_column', 'id_custom_columns', 5, 3);
	add_filter('manage_edit-people-type_columns', 'id_columns', 5);
	add_action('manage_people-type_custom_column', 'id_custom_columns', 5, 3);
	add_filter('manage_edit-photo-type_columns', 'id_columns', 5);
	add_action('manage_photo-type_custom_column', 'id_custom_columns', 5, 3);
	add_filter('manage_edit-video-type_columns', 'id_columns', 5);
	add_action('manage_video-type_custom_column', 'id_custom_columns', 5, 3);






//
// #######################################################################
//  8 - TinyMCE Customization
// -----------------------------------------------------------------------

	// ## - 8.1 - Prevent TinyMCE from stripping iframe
	add_filter('tiny_mce_before_init', create_function('$a', '$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;'));

	// ## - 8.2 - Customize Paragraph Types
	function delete_editor_styles($arr){
		$arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
		return $arr;
	}
	add_filter('tiny_mce_before_init', 'delete_editor_styles');






//
// #######################################################################
//  9 - Theme Function
// -----------------------------------------------------------------------

	// ## - 9.1 - Custom excerpt
	function custom_excerpt($length, $link_prefix = "... ", $linktext = "More") {
		$link	= get_permalink();
		$input	= get_the_excerpt();
		$title	= get_the_title();

		if (empty($input)) {
			$input = get_the_content();
		}

		$input = strip_tags($input);

		// ## - No need to trim, already shorter than trim length
		if (strlen($input) <= $length) {
			echo $input . $link_prefix . '<a title="Read More: ' . $title .'" href="'. $link . '">' . $linktext . '</a>';
		}

		if (strlen($input) > $length) {
			// ## - Find last space within length
			$last_space		= strrpos(substr($input, 0, $length), ' ');
			$trimmed_text	= substr($input, 0, $last_space);
			$trimmed_text .= $link_prefix;
			echo $trimmed_text . '<a title="Read More: ' . $title .'" href="'. $link . '">' . $linktext . '</a>';
		}
	}

	function new_excerpt_more($more) {
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// ## - 9.2 - Custom Excerpt for Ajax Loading
	function get_custom_excerpt($length, $link_prefix = "... ", $linktext = "More") {
		$html	= '';
		$link	= get_permalink();
		$input	= get_the_excerpt();

		if (empty($input)) {
			$input = get_the_content();
		}

		$input = strip_tags($input);

		// ## - No need to trim, already shorter than trim length
		if (strlen($input) <= $length) {
			$html = $input . $link_prefix . '<a href="'. $link . '">' . $linktext . '</a>';
		}

		if (strlen($input) > $length) {
			// ## - Find last space within length
			$last_space		= strrpos(substr($input, 0, $length), ' ');
			$trimmed_text	= substr($input, 0, $last_space);
			$trimmed_text .= $link_prefix;
			$html = $trimmed_text . '<a href="'. $link . '">' . $linktext . '</a>';
		}

		return $html;
	}

	// ## - 9.3 - Fix the admin bar CSS
	function adminbarfix()  {
		if ( is_user_logged_in() ) {
			echo '<style  type="text/css" media="screen">body { position: relative!important; }</style>';
		}
	};
	add_action ( 'wp_head', 'adminbarfix');

	// ## - 9.4 - Override posts_per_page on search template
	function change_wp_search_size($query) {
		if ( $query->is_search )
			$query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show
		return $query;
	}
	add_filter('pre_get_posts', 'change_wp_search_size');

	// ## - 9.5 - Remove Forced Image Inline Style
	function fixed_img_caption_shortcode($attr, $content = null) {
		if ( ! isset( $attr['caption'] ) ) {
			if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
				$content = $matches[1];
				$attr['caption'] = trim( $matches[2] );
			}
		}
		$output = apply_filters('img_caption_shortcode', '', $attr, $content);
		if ( $output != '' )
			return $output;
		extract(shortcode_atts(array(
				'id'	=> '',
				'align'	=> 'alignnone',
				'width'	=> '',
				'caption' => ''
		), $attr));
		if ( 1 > (int) $width || empty($caption) )
			return $content;
		if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
		return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
		. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
	}
	add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
	add_shortcode('caption', 'fixed_img_caption_shortcode');

	// ## - 9.6 - Add div to oembed to force responsiveness
	add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
	function my_embed_oembed_html($html, $url, $attr, $post_id) {
		return '<div class="video-container">' . $html . '</div>';
	}

	// ## - 9.7 - Remove Yoast from post columns, and re-order the metabox
	add_action('admin_init', 'cols_fix_init');
	function cols_fix_init() {
		global $wpseo_metabox;
		foreach(get_post_types() as $pt) {
			add_filter("manage_{$pt}_posts_columns", 'fix_admin_columns', 20);
		}
	}

	function fix_admin_columns($cols) {
		$nope = array('wpseo-focuskw', 'wpseo-title', 'wpseo-metadesc', 'custom-fields');
		foreach($nope as $n) {
			if(isset($cols[$n]))
				unset($cols[$n]);
		}
		return $cols;
	}
	add_filter( 'wpseo_metabox_prio', function() { return 'low';});

	// ## - 9.8 - Customize Admin Bar
	function mytheme_admin_bar_render() {
		global $wp_admin_bar;
		add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('wpseo-menu');
		$wp_admin_bar->remove_menu('new-cu-asides', 'new-content');
		$wp_admin_bar->remove_menu('new-cu-homepage', 'new-content');

		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->add_menu( array(
						'parent' => 'new-content',
						'id' => 'new_media',
						'title' => __('Media'),
						'href' => admin_url( 'media-new.php'))
		);

		if (is_home()) {
			$wp_admin_bar->add_menu( array(
							'id' => 'cu_edit',
							'title' => __( 'Edit Homepage'),
							'href' => get_edit_post_link(get_theme_mod( 'homepage_id', '' )))
			);
		}
	}
	add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');

	// ## - 9.9 - Remove automatically generated rel="category tag"
	function replace_cat_tag($text) {
		$text = str_replace('rel="category tag"', "", $text); return $text;
	}
	add_filter( 'the_category', 'replace_cat_tag' );

	// ## - 9.10 - Remove the ability to link attachments to themselves
	function remove_imagelink_setup() {
		$image_set = get_option( 'image_default_link_type' );

		if ($image_set !== 'none') {
			update_option('image_default_link_type', 'none');
		}
	}
	add_action('admin_init', 'remove_imagelink_setup', 10);

	// ## - 9.11 - Remove search Class from body class
	add_filter('body_class', 'remove_a_body_class', 20, 2);
	function remove_a_body_class($wp_classes) {
		if( is_search() ) :
			foreach($wp_classes as $key => $value) {
				if ($value == 'search') unset($wp_classes[$key]);
			}
		endif;
		return $wp_classes;
	}

	// ## - 9.12 - Get top post ancestor ID - http://codex.wordpress.org/Function_Reference/wp_list_pages
	if(!function_exists('get_post_top_ancestor_id')){
		function get_post_top_ancestor_id(){
			global $post;

			if($post->post_parent){
				$ancestors = array_reverse(get_post_ancestors($post->ID));
				return $ancestors[0];
			}
			return $post->ID;
		}
	}

	// ## - 9.13 - Echo top post ancestor title
	function the_top_level_parent_title() {
		global $post;
		if ( empty($post->post_parent) )
		{ the_title(); }
		else {
			$ancestors = get_post_ancestors($post->ID);
			end($ancestors);
			echo get_the_title($ancestors[0]);
		}
	}

	// ## - 9.14 - Get top post ancestor title
	function get_top_level_parent_title() {
		global $post;
		if ( empty($post->post_parent) ) {
			$value = get_the_title();
		}
		else {
			$ancestors = get_post_ancestors($post->ID);
			end($ancestors);
			$value = get_the_title($ancestors[0]);
		}
		return $value;
	}

	// ## - 9.15 - Check if page has children
	function has_children($post_id) {
		$children = get_pages("child_of=$post_id");
		if ( count( $children ) != 0 ) {
			return true;
		}
		else {
			return false;
		}
	}

	// ## - 9.16 - Add "is child"
	function is_child($pageID) {
		global $post;
		if (is_page() && ($post->post_parent==$pageID)) {
			return true;
		} else {
			return false;
		}
	}






//
// #######################################################################
//  10 - Post 2 Post Relationships
// -----------------------------------------------------------------------

//	function my_connection_types() {
//		p2p_register_connection_type(
//			array(
//				'name'			=> 'sessions_speakers',
//				'from'			=> 'pse-sessions',
//				'to'			=> 'pse-speakers',
//				'reciprocal'	=> true,
//				'title'			=> 'Speaker / Session Relation',
//				'sortable'		=> 'any'
//			)
//		);
//	}
//	add_action( 'p2p_init', 'my_connection_types' );






//
// #######################################################################
//  11 - Register Theme Options
// -----------------------------------------------------------------------

//	if( function_exists('acf_add_options_page') ) {
//		acf_add_options_page();
//	}

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
				'page_title' 	=> 'Theme Options',
				'menu_title'	=> 'Theme Options',
				'menu_slug' 	=> 'theme-options',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
		));

		acf_add_options_sub_page(array(
				'page_title' 	=> 'Section Titles',
				'menu_title'	=> 'Section Titles',
				'parent_slug'	=> 'theme-options',
		));

		acf_add_options_sub_page(array(
				'page_title' 	=> 'Year Options',
				'menu_title'	=> 'Year Options',
				'parent_slug'	=> 'theme-options',
		));

		acf_add_options_sub_page(array(
				'page_title' 	=> 'Sidebar Options',
				'menu_title'	=> 'Sidebar Options',
				'parent_slug'	=> 'theme-options',
		));

		acf_add_options_sub_page(array(
				'page_title' 	=> 'Footer Options',
				'menu_title'	=> 'Footer Options',
				'parent_slug'	=> 'theme-options',
		));

	}






//
// #######################################################################
//  12 - Post Thumbnail Support
// -----------------------------------------------------------------------

	add_theme_support( 'post-thumbnails', array( 'post' ) );






//
// #######################################################################
//  13 - Register Image Sizes
// -----------------------------------------------------------------------

	add_image_size( 'post-featured', 150, 150, true );
	add_image_size( 'speaker-photo', 350, 350, true );
	add_image_size( 'homepage-banner', 1200, 500, true );
	add_image_size( 'newsletter-image', 600 );






//
// #######################################################################
//  14 - Register WP Menu
// -----------------------------------------------------------------------

	// ## 11.1 - Register Site Menu
	register_nav_menus (
			array(
					'top-nav' => __( 'Top Nav', 'pseweb' ),
			)
	);






//
// #######################################################################
//  15 - Gravity Forms Post Submission
// -----------------------------------------------------------------------

	// ## 15.1 - Employer Type
	add_action("gform_after_submission_1", "acf_employer_type", 10, 2);
	function acf_employer_type ($entry, $form) {
		$post_id = $entry["post_id"];
		$values = get_post_custom_values("speaker_employer_type", $post_id);
		update_field("speaker_employer_type", $values, $post_id);
	}

	// ## 15.2 - Alternate Topics Checklist
	add_action("gform_after_submission_1", "acf_alternate_topics", 10, 2);
	function acf_alternate_topics ($entry, $form) {
		$post_id = $entry["post_id"];
		$values = get_post_custom_values("speaker_alternate_topics", $post_id);
		update_field("speaker_alternate_topics", $values, $post_id);
	}






//
// #######################################################################
//  16 - Load More Posts with Ajax
// -----------------------------------------------------------------------

	add_action('wp_ajax_nopriv_more_ajax', 'get_more_posts');
	add_action('wp_ajax_more_ajax', 'get_more_posts');

	function get_more_posts(){

		if ( !wp_verify_nonce( $_REQUEST['nonce'], "ajax_more")) {
			exit("Tsk. Tsk. Tsk.");
		}

		switch($_REQUEST['name']){
			case 'getmoreposts':
				$output = ajax_get_more_posts($_REQUEST['offset'], $_REQUEST['catid'], $_REQUEST['numposts'], $_REQUEST['selector']);
				break;
			default:
				$output = 'No function specified, check your jQuery.ajax() call';
				break;
		}
		echo $output;
		die;
	}

	function ajax_get_more_posts($offset, $catid, $numposts, $selector){
		global $dapostID;
		$posts		= '';

		// SET ARGS FOR NEWS POSTS
		if (($selector == 'news') || ($selector == 'tag')) {
			if ($selector == 'news') {
				$args = array(
						'post_type'	=> 'post',
						'post_status' => 'publish',
						'cat'		=> $catid,
						'offset'	=> $offset,
						'posts_per_page' => $numposts,
				);
			}
			if ($selector == 'tag') {
				$args = array(
						'post_type'	=> 'post',
						'post_status' => 'publish',
						'tag'		=> $catid,
						'offset'	=> $offset,
						'posts_per_page' => $numposts,
				);
			}
		}

		// LOADING MORE NEWS POSTS
		if (($selector == 'news') || ($selector == 'tag')) {

			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();

					$post_title		= get_the_title();
					$post_link		= get_permalink();
					$post_date		= get_the_date('l, F j, Y');
					$cats			= '';
					$excerpt		= get_custom_excerpt(310, '... ', 'More');

					$posts .= '<div class="post-item">';
					$posts .= "<h2><a href=\"$post_link\">$post_title</a></h2>";

					foreach((get_the_category()) as $category) {
						$cat_link = get_category_link($category->term_id);
						$cats .= "<a href=\"$cat_link\">";
						$cats .= $category->cat_name;
						$cats .= "</a>" . ', ';
					}
					$cats_final = rtrim($cats, ', ');

					$posts .= "<div class=\"postdate\"><p>$post_date, posted in $cats_final</p></div>";

					if ( '' != get_the_post_thumbnail() ) {
						$posts .= get_the_post_thumbnail($dapostID, array(140,140) );
					}

					$posts .= "<p>$excerpt</p>";
					$posts .= '</div>';

				endwhile;
			endif;

			wp_reset_postdata();
		}

		return $posts;
	}






//
// #######################################################################
//  17 - Post Comments
// -----------------------------------------------------------------------

	// ## - Custom callback to list comments in the your-theme style
	// ## - Ian Stewart - http://themeshaper.com/2009/07/01/wordpress-theme-comments-template-tutorial/

	function custom_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		$GLOBALS['comment_depth'] = $depth;
		?>

		<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
		<div class="comment-author vcard"><?php commenter_link() ?></div>
		<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to comment ID: %4$s">Permalink</a>', 'your-theme'),
					get_comment_date(),
					get_comment_time(),
					'#comment-' . get_comment_ID(),
					get_comment_ID()
			);
				edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
		</div>

		<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'your-theme') ?>

		<div class="comment-content">
			<?php comment_text() ?>
		</div>

		<?php // echo the comment reply link
		if($args['type'] == 'all' || get_comment_type() == 'comment') :
			$comment_ID = get_comment_ID();
			comment_reply_link(array_merge($args, array(
					'reply_text' => __('Reply <span class="hidden-text">' . $comment_ID . '</span>' ,'123'),
					'login_text' => __('Log in to reply.','your-theme'),
					'depth' => $depth,
					'before' => '<div class="comment-reply-link">',
					'after' => '</div>'
			)));
		endif;
	}

	comment_reply_link();

	// Custom callback to list pings
	function custom_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>

	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
		<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
					get_comment_author_link(),
					get_comment_date(),
					get_comment_time() );
				edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
		</div>

		<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>

		<div class="comment-content">
			<?php comment_text() ?>
		</div>

	<?php } // end custom_pings

	// Produces an avatar image with the hCard-compliant photo class
	function commenter_link() {
		$commenter = get_comment_author_link();
		$avatar_email = get_comment_author_email();
		$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 100, '', 'Commenter Avatar') );
		echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	} // end commenter_link

add_theme_support( 'eventbrite' );

?>