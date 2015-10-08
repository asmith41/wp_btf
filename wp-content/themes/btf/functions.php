<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


//theme support for thumbnail
$feature='post-thumbnails';
add_theme_support($feature);

// registering nav menu
register_nav_menus( array(
	'navbar' => 'top navbar',
	));


// custom post type for slilder 
add_action("init","register_slider");
function register_slider() {
	$labels = array( 
		'name'               => __( 'Myslider' ),
		'singular_name'      => __( 'single post type name', 'text_domain' ),
		'add_new'            => __( 'add new post' ),
		'add_new_item'       => __( 'Add new slider' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New single post' )
		);

	$args = array( 
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-format-image',
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array( 'category' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post', 
		'supports'            => array( 
			'thumbnail', 
			'custom-fields', 'trackbacks', 'comments', 
			'revisions', 'page-attributes', 'post-formats','title'
			),
		);

	register_post_type( 'slider', $args );
}



//adding meta box for home page slider (note:: make for custom post not page, right now it appeats in all the pages)

// adding meta box for home page slider
  // meta box for text in slider
add_action("add_meta_boxes","add_meta_slider");
function add_meta_slider(){
    //--> add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args ); 
	add_meta_box( "home_slider", "Text for slider", "display_meta_home" ,"slider", "normal", "default"); 
    // add_meta_box( "home_slider", "Text for slider", "display_meta_home" ,"slider", "normal", "default"); 
}
  //callback function
function display_meta_home($post){

	$values=get_post_custom($post->ID);
	$text = isset( $values['slider_text'] ) ? esc_attr( $values['slider_text'][0] ) : "" ;
	?>

	<h4>Choose images for the slider</h4>
	<?php $slider=get_post_meta($post->ID,'imageslider',true);
	?><img width="200px" src="<?php echo $slider['url'];?>"/>
	<input type="file" id="imageslider" name="imageslider" value="asdf"/><br>

	<?php $slider1=get_post_meta($post->ID,'imageslider1',true);?>
	<img width="200px" src="<?php echo $slider1['url'];?>"/>
	<input type="file" id="imageslider1" name="imageslider1" /><br>

	<?php $slider2=get_post_meta($post->ID,'imageslider2',true);?>
	<img width="200px"  src="<?php echo $slider2['url'];?>"/>
	<input type="file" id="imageslider2" name="imageslider2" /><br>

	<h4>Enter the text caption for the image</h4><br>
	<textarea class="large-text" name="slider_text"><?php echo $text; ?></textarea>



	<?php
}

 //save meta value
add_action('save_post','save_meta_slider');
function save_meta_slider($post_id){
	$chk = isset( $_POST['slider_text'] )  ? $_POST['slider_text'] : "" ;
	update_post_meta( $post_id, 'slider_text', $chk );

	if(!empty($_FILES['imageslider']['name'])){
		$upload = wp_upload_bits($_FILES['imageslider']['name'], null, file_get_contents($_FILES['imageslider']['tmp_name']));
		update_post_meta( $post_id, 'imageslider' , $upload);
	}
	elseif(!empty($_FILES['imageslider1']['name'])){
		$upload1 = wp_upload_bits($_FILES['imageslider1']['name'], null, file_get_contents($_FILES['imageslider1']['tmp_name']));
		update_post_meta( $post_id, 'imageslider1' , $upload1);
	}
	elseif(!empty($_FILES['imageslider2']['name'])){	
		$upload2 = wp_upload_bits($_FILES['imageslider2']['name'], null, file_get_contents($_FILES['imageslider2']['tmp_name']));
		update_post_meta( $post_id, 'imageslider2' , $upload2);	
	}
}

function update_edit_form() {
	echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');



// adding theme options here
	function add_theme_menu_item(){
		add_menu_page("THEME","THEME OPTIONS","manage_options","theme-panel","theme_settings_page",null,99);
	}
	add_action("admin_menu","add_theme_menu_item");
	//call back function
	function theme_settings_page(){
    	?>
		<div class="wrap">
			<h1>Theme Panel</h1>
			<form method="post" action="options.php">
	      	<?php
	            	settings_fields("section");
	            	do_settings_sections("theme-options");      
	            	submit_button(); 
	       	?>          
	    		</form>
		</div>
	<?php
	}

	function display_contact(){
	?>
    		<input type="number" name="contact_num" id="contact" value="<?php echo get_option('contact_num'); ?>" />
    	<?php
	}
	function display_logo(){
	?>	<input type="file" name="logo" id="logo"/>
	<?php
	}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	    add_settings_field("contact_num", "Contact Number", "display_contact", "theme-options", "section");
	    add_settings_field("logo","New Logo","display_logo","theme-options","section");

        register_setting("section", "contact_num");
        register_setting("section","logo");
}

add_action("admin_init", "display_theme_panel_fields");