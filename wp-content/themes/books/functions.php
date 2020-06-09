<?php

//Add New ROles for client So that they cannot mess things ups
add_action( 'after_setup_theme', function () {

    if( ! get_option( 'wpc_roles_created' ) ) {

        //Get All capabilites of Adminstrator
        $site_owner_caps = get_role( 'administrator' )->capabilities;

        //Unwanted capabillities
        $unwanted_caps = [
            'activate_plugins' => 1,
            'delete_plugins'   => 1,
            'install_plugins'  => 1,
            'update_plugins'   => 1,
        ];

        //Get all CAPABILITIES  minus ( - ) the all administator caps
        $site_owner_caps = array_diff_key($site_owner_caps, $unwanted_caps);

        // print_r($site_owner_caps);
        //Add new Role
        add_role( 'site_owner', 'Site Owner', $site_owner_caps );

        //Update Option as true
        update_option( 'wpc_roles_created', true );
    }

} );



add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            // 'default_rows'    => 3,
            // 'min_rows'        => 2,
            // 'max_rows'        => 8,
            'default_columns' => 1,
            // 'min_columns'     => 2,
            // 'max_columns'     => 3,
        ),
    ) );

    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}


/*  Register Scripts and Style */

function theme_register_scripts() {
    wp_enqueue_style( 'main', get_stylesheet_uri() );
    wp_enqueue_script( 'books-app-js', get_theme_file_uri( '/js/app.js' ), array( '' ), true, true );
    // wp_enqueue_script( 'books-app-js', esc_url( trailingslashit( get_template_directory_uri() ) . 'js/olympos.min.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );



//Deffering JS
function defer_parsing_of_js($url) //Get the scripts
{
    if(is_admin()) return $url; //Donot do stupid with WP Admin
    if( false === strpos($url, '.js')) return $url;    //If not javascript files
    if (strpos($url, 'jquery.js')) return $url; //IF jquery.js
    //if (strpos($url, 'app.js')) return $url; //IF jquery.js
    return str_replace('src', 'defer src', $url); //Replace src with defer src to all 3rd party js

}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*Custom Fields*/
//global array to reposition the elements to display as you want (e.g. kept 'title' before 'first_name' )
$wdm_address_fields = array('country',
        'title', //new field
        'first_name',
        'last_name',
        //'company',
        'address_2',
        'address_1',
        'city',
        'state',
        'postcode');

//global array only for extra fields
$wdm_ext_fields = array('title',
        'address_3',
        'address_4');

add_filter( 'woocommerce_default_address_fields' , 'wdm_override_default_address_fields' );

function wdm_override_default_address_fields( $address_fields ){
    
     $temp_fields = array();

     $address_fields['title'] = array(
    'label'     => __('Title', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row-wide'),
    'type'  => 'select',
    'options'   => array('Mr' => __('Mr', 'woocommerce'), 'Mrs' => __('Mrs', 'woocommerce'), 'Miss' => __('Miss', 'woocommerce'))
     );
     
    $address_fields['address_1']['placeholder'] = '';
    $address_fields['address_1']['label'] = __('Street', 'woocommerce');
    
    $address_fields['address_2']['placeholder'] = '';
    $address_fields['address_2']['label'] = __('Building', 'woocommerce');
    
    $address_fields['address_3'] = array(
    'label' => __('House No / Name', 'woocommerce'),
    'placeholder'=> '',
    'required'   => true,
    'class'      => array('form-row-wide', 'address-field'),
    'type'  => 'text'
     );
      
    $address_fields['address_4'] = array(
    'label' => __('Area', 'woocommerce'),
    'placeholder'=> '',
    'class'     => array('form-row-wide', 'address-field'),
    'type'  => 'text'
     );
           
    global $wdm_address_fields;

    foreach($wdm_address_fields as $fky){       
    $temp_fields[$fky] = $address_fields[$fky];
    }
    
    $address_fields = $temp_fields;
    
    return $address_fields;
}
/**

* Add custom field to the checkout page

*/

add_action('woocommerce_after_order_notes', 'custom_checkout_field');

function custom_checkout_field($checkout)

{

    echo '<div id="custom_checkout_field"><h2>' . __('New Heading') . '</h2>';

    woocommerce_form_field('test_field', array(

    'type' => 'text',

    'class' => array(

    'my-field-class form-row-wide'

    ) ,

    'label' => __('Custom Additional Field') ,

    'placeholder' => __('New Custom Field') ,

    ) ,

    $checkout->get_value('test_field'));

    echo '</div>';

}

/**

* Checkout Process

*/

add_action('woocommerce_checkout_process', 'customised_checkout_field_process');

function customised_checkout_field_process()

{

// Show an error message if the field is not set.

    if (!$_POST['test_field']) wc_add_notice(__('Please enter value!') , 'error');

}


add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');

function custom_checkout_field_update_order_meta($order_id)

{

    if (!empty($_POST['test_field'])) {

        update_post_meta($order_id, 'Some Field',sanitize_text_field($_POST['test_field']));

    }

}



function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_theme_file_uri('/css/admin-login.css')  );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


function custom_login_error_message()
{
return 'Please enter valid login credentials.';
}
add_filter('login_errors', 'custom_login_error_message');

function custom_login_head() {
remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'custom_login_head');


// function custom_login_redirect( $redirect_to, $request, $user )
// {
//     global $user;
//     if( isset( $user->roles ) && is_array( $user->roles ) ) {
//         if( in_array( "administrator", $user->roles ) ) {
//             return $redirect_to;
//         } else {
//             return home_url();
//         }
//     }
//     else{
//         return $redirect_to;
//     }
// }
// add_filter("login_redirect", "custom_login_redirect", 10, 3);

//Check remember to checked
// add_filter( 'login_footer', 'default_rememberme_checked' );

// add_action( 'init', 'default_checked_remember_me' );
// function default_rememberme_checked() {
//     echo "<script>document.getElementById('rememberme').checked = true;</script>";
// }

function my_login_logo_url_title() {
    return 'Everyday with action.';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );



/* Add menu support */
// if (function_exists('add_theme_support')) {
//     add_theme_support('menus');
// }

/* Add post image support */
// add_theme_support( 'post-thumbnails' );


/* Add custom thumbnail sizes */
// if ( function_exists( 'add_image_size' ) ) {
//     //add_image_size( 'custom-image-size', 500, 500, true );
// }

/* Add widget support */
// if ( function_exists('register_sidebar') )
//     register_sidebar(array(
//         'name' => 'SidebarOne',
// 	    'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
//         'after_widget' => '</div>',
//         'before_title' => '<h4 class="widgettitle">',
//         'after_title' => '</h4>',
//     ));
    
// if ( function_exists('register_sidebar') )
//     register_sidebar(array(
//         'name' => 'SidebarTwo',
// 	    'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
//         'after_widget' => '</div>',
//         'before_title' => '<h4 class="widgettitle">',
//         'after_title' => '</h4>',
//     ));


/*  EXCERPT 
    Usage:
    
    <?php echo excerpt(100); ?>
*/

// function excerpt($limit) {
//     $excerpt = explode(' ', get_the_excerpt(), $limit);
//     if (count($excerpt)>=$limit) {
//     array_pop($excerpt);
//     $excerpt = implode(" ",$excerpt).'...';
//     } else {
//     $excerpt = implode(" ",$excerpt);
//     } 
//     $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
//     return $excerpt;
// }
