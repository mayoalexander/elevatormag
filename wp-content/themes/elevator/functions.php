<?php

//Initiate the localization of the theme domain

load_theme_textdomain( 'organicthemes', TEMPLATEPATH.'/languages' );


//Turn a category ID to a Name

/*function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}*/



//	Register Sidebars and Widgets

if ( function_exists('register_sidebars') )

	register_sidebar(array('name'=>'Sidebar','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h2>','after_title'=>'</h2>'));





// Add Custom Meta Box To Posts

$prefix = 'custom_meta_';



$meta_box = array(

    'id' => 'my-meta-box',

    'title' => 'Featured Video',

    'page' => 'post',

    'context' => 'normal',

    'priority' => 'high',

    'fields' => array(

        array(

            'name' => __("Paste Video Embed Code", 'organicthemes'),

            'desc' => __("Enter Vimeo, YouTube or other embed code to display a featured video. (600px by 340px Featured Slider)", 'organicthemes'),

            'id' => $prefix . 'video',

            'type' => 'textarea',

            'std' => ''

        ),

    )

);



add_action('admin_menu', 'mytheme_add_box');



// Add meta box

function mytheme_add_box() {

    global $meta_box;

    

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);

}



// Callback function to show fields in meta box

function mytheme_show_box() {

    global $meta_box, $post;

    

    // Use nonce for verification

    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    

    echo '<table class="form-table">';



    foreach ($meta_box['fields'] as $field) {

        // get current post meta data

        $meta = get_post_meta($post->ID, $field['id'], true);

        

        echo '<tr>',

                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',

                '<td>';

        switch ($field['type']) {

            case 'textarea':

                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="8" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];

                break;

        }

        echo     '<td>',

            '</tr>';

    }

    

    echo '</table>';

}



add_action('save_post', 'mytheme_save_data');



// Save data from meta box

function mytheme_save_data($post_id) {

    global $meta_box;

    

    // verify nonce

    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {

        return $post_id;

    }



    // check autosave

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

        return $post_id;

    }



    // check permissions

    if ('page' == $_POST['post_type']) {

        if (!current_user_can('edit_page', $post_id)) {

            return $post_id;

        }

    } elseif (!current_user_can('edit_post', $post_id)) {

        return $post_id;

    }

    

    foreach ($meta_box['fields'] as $field) {

        $old = get_post_meta($post_id, $field['id'], true);

        $new = $_POST[$field['id']];

        

        if ($new && $new != $old) {

            update_post_meta($post_id, $field['id'], $new);

        } elseif ('' == $new && $old) {

            delete_post_meta($post_id, $field['id'], $old);

        }

    }

}


// Add navigation support

if ( function_exists('add_theme_support') )

add_theme_support( 'menus' );


// Display home page link in custom menu

function home_page_menu_args( $args ) {

$args['show_home'] = true;

return $args;

}

add_filter('wp_page_menu_args', 'home_page_menu_args');



// Add default posts and comments RSS feed links to head

if ( function_exists('add_theme_support') )

add_theme_support( 'automatic-feed-links' );



// Add thumbnail support

if ( function_exists('add_theme_support') )

add_theme_support('post-thumbnails');

add_image_size( 'home-feature', 960, 530, true ); // Homepage Slider Image

add_image_size( 'home-thumbnail-one', 460, 260, true ); // Homepage 1 Column Featured Image

add_image_size( 'home-thumbnail-two', 600, 600, true ); // Homepage 2 Column Featured Image

add_image_size( 'home-thumbnail-three', 290, 165, true ); // Homepage 3 Column Featured Image

add_image_size( 'archive-thumbnail', 600, 480, true ); // Archive Featured Image


// Add Infinite Scroll



function elevator_infinite_scroll_init() {
add_theme_support( 'infinite-scroll', array(
'type' => 'click',
'container' => 'content',
'render' => 'elevator_infinite_scroll_render',
'footer' => false,
'wrapper' => false,
'posts_per_page' => '9',
) );
}
add_action( 'init', 'elevator_infinite_scroll_init' );

function elevator_infinite_scroll_render() {

get_template_part( 'more-content');


}


function filter_jetpack_infinite_scroll_js_settings( $settings ) {
    $settings['text'] = __( 'more', 'l18n' );
    return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'filter_jetpack_infinite_scroll_js_settings' );


// Add custom excerpt 

function custom_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
	return '';
}

add_filter('excerpt_more', 'new_excerpt_more');

function excerpt_read_more_link($output) {
	global $post;
	return $output;
}

add_filter('the_excerpt', 'excerpt_read_more_link');

remove_filter ('the_excerpt', 'wpautop');




//Add Twitter Card Type

add_filter( 'wpseo_twitter_card_type', 'change_card_type', 20 );

function change_card_type(  ) {

	return 'summary_large_image';

}



// Add Custom Login Logo

function my_login_logo() { ?>

    <style type="text/css">

        body.login div#login h1 a {

            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/elevator-header-logo.png);

            padding-bottom: 30px;

	    background-size: 260px 80px;

	    width: 260px;

        }

	body.login {

		background-image: url(http://www.elevatormag.com/wp-content/uploads/2014/10/brickwall-dark.png);

	}

    </style>

<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );



function my_login_logo_url() {

    return home_url();

}

add_filter( 'login_headerurl', 'my_login_logo_url' );



function my_login_logo_url_title() {

    return 'ELEVATOR';

}

add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// Add Custom Post Type Slider
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => "Slider",
		"singular_name" => "Slider",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slider", "with_front" => true ),
		"query_var" => true,
						"supports" => array( "title", "thumbnail" ),			);
	register_post_type( "slider", $args );
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


// DISPLAY THE AUTHOR ROLE FUCKING PROPER
function display_author_role()
{
    //get the post author's ID
    $auth_id = get_the_author_meta( 'ID' ); //assume we are in The Loop

    $auth_obj = get_userdata( $auth_id );

    if( !empty( $auth_obj->roles ) ){
        foreach( $auth_obj->roles as $role ){
            if ( $role == 'administrator'){
                echo "Editor In Chief";
            }
            elseif ( $role == 'staff_writer') {
                echo "Staff Writer";
            }
            elseif ( $role == 'contributor') {
                echo "Contributor";
            }
        }
    }
    
}

// GET SPECIFIC AD TEMPLATE PART
function display_ad($ad_template){
    if ($ad_template == 'top'){
        get_template_part('ad-top');
    }
    elseif ($ad_template == 'mid') {
        get_template_part('ad-mid');
    }
    elseif ($ad_template == 'content') {
        get_template_part('ad-content');
    }
    elseif ($ad_template == 'bottom') {
        get_template_part('ad-bottom');
    }
    elseif ($ad_template == 'halfpage'){
        get_template_part('ad-halfpage');
    }
}


// hyperlink submission entry field links for field 3 in form 1 only
add_filter( 'gform_entries_field_value', 'hyperlink_link', 10, 4);
function hyperlink_link( $value, $form_id, $field_id, $entry ) {


    if ( $form_id == 1 && $field_id == 3 ) {
        GFCommon::log_debug( __METHOD__ . '(): Matched form ID 1 and field ID 3.' );
        GFCommon::log_debug( __METHOD__ . "(): Original value: {$value}." );
        $value = "<a href='{$value}' target='_blank'>{$value}</a>";
        GFCommon::log_debug( __METHOD__ . "(): Modified value: {$value}." );
    }
    GFCommon::log_debug( __METHOD__ . "(): Returning {$value} for form ID {$form_id} and field ID {$field_id}." );
    return $value;
}


?>