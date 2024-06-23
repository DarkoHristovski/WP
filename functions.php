<?php

$includes = [
	'inc/acf-contents.php',
	'inc/menu-walker.class.inc.php'
];

foreach($includes as $file){
	include_once($file);
}

function website_setup(){
	load_theme_textdomain( 'astorius', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'responsive-embeds' );
}

add_post_type_support( 'update', 'excerpt' );
add_post_type_support( 'whitepapers', 'excerpt' );

/**
 * Add a sidebar.
 */
function footer_text_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer-Text'),
        'id'            => 'footer-text',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'footer_text_widgets_init' );


function newsletter_text_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Newsletter-Text'),
        'id'            => 'newsletter-text',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'newsletter_text_widgets_init' );


function get_website_menu($type = 'Left'){
	return wp_nav_menu(
		[
			'menu' => $type,
			'theme_location' => $type,
			'container' => '',
			'echo' => false,
			'item_spacing' => 'discard',
			'walker' => new Website_Menu_Walker,
			'link_after' => '',
			'fallback_cb' => function() { return ''; }
		]
	);
}

function website_menus(){
	$locations = array(
		'Main'  => __( 'Main', 'astorius' ),
		'Footer' => __( 'Footer', 'astorius' ),
	);
	register_nav_menus( $locations );
}

function website_styles_and_scripts(){
	$styles = [
		'website' => ['file' => '/assets/css/styles.css']
	];
	$scripts = [
		//'jquery' => ['file' => '/assets/js/jquery-3.4.1.min.js', 'dependencies' => []],
		//'jquery-ui' => ['file' => '/assets/js/jquery-ui.min.js', 'dependencies' => ['jquery']],
			'javascript'=> ['file' => '/assets/js/script.js', 'dependencies' => []]
	
	];
	if ( !is_admin() ) {
		foreach($styles as $key => $style){
			wp_enqueue_style( $key, get_template_directory_uri() . $style['file'] );
		}
		wp_deregister_script('jquery');
		foreach($scripts as $key => $script){
			wp_enqueue_script( $key, get_template_directory_uri() . $script['file'], $script['dependencies'], wp_get_theme()->get( 'Version' ), true );
		}
		
	}
}

function get_image_by_id($attachment_id, $size = 'full'){
	$image = wp_get_attachment_image_src($attachment_id, $size);
	$image['src'] = $image[0];
	$image['alt'] = htmlspecialchars(get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ));
	return $image;
}

function normalize_characters($content){
	$content = str_replace( "a\xCC\x88", "ä", $content );
	$content = str_replace( "o\xCC\x88", "ö", $content );
	$content = str_replace( "u\xCC\x88", "ü", $content );
	$content = str_replace( "A\xCC\x88", "Ä", $content );
	$content = str_replace( "O\xCC\x88", "Ö", $content );
	$content = str_replace( "U\xCC\x88", "Ü", $content );
	return $content;
}

function website_mce_buttons($buttons){
	array_unshift( $buttons, 'styleselect' );
	$buttons[] = 'sup';
	$buttons[] = 'sub';
	return $buttons;
}

function website_custom_mce_styles($init_array){

	$style_formats = array(
		// These are the custom styles
		
		array(
			'title' => 'kein Umbruch',
			'inline' => 'span',
			'classes' => 'no-line-break',
			'wrapper' => true
		),
		array(
			'title' => '"Mehr-Text"-Absatz',
			'inline' => 'span',
			'classes' => 'more-text',
			'wrapper' => true
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}

// allow svg upload
function kb_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}

function kb_ignore_upload_ext($checked, $file, $filename, $mimes){
	if(!$checked['type']){
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;

		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
			$ext = $type = false;
		}

		$checked = compact('ext','type','proper_filename');
	}

	return $checked;
}

function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

add_filter('wp_check_filetype_and_ext', 'kb_ignore_upload_ext', 10, 4);
add_filter( 'upload_mimes', 'kb_svg' );

// tiny mce
add_filter( 'mce_buttons_2', 'website_mce_buttons' );
add_filter( 'tiny_mce_before_init', 'website_custom_mce_styles' );

add_action( 'init', 'website_menus' );
add_action( 'after_setup_theme', 'website_setup' );
add_action( 'wp_enqueue_scripts', 'website_styles_and_scripts' );

do_shortcode( '[cf7-db-display-ip]' );

add_filter('show_admin_bar', '__return_false');

if(isset($_REQUEST['css-compile'])){
	define('WP_SCSS_ALWAYS_RECOMPILE', true);
}



