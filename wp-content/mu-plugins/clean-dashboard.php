<?php

// add_filter('show_admin_bar', '__return_false');

// update toolbar
function update_adminbar($wp_adminbar) {

  // remove unnecessary items
  $wp_adminbar->remove_node('wp-logo');
  $wp_adminbar->remove_node('customize');
  $wp_adminbar->remove_node('comments');
  $wp_adminbar->remove_node('updates');
  $wp_adminbar->remove_node('new-content');
  $wp_adminbar->remove_node('edit');
  $wp_adminbar->remove_node('my-account');

}

// admin_bar_menu hook
add_action('admin_bar_menu', 'update_adminbar', 999);
// function redirect_to_nonexistent_page(){

//     $new_login=  'helping-hand';
//     if(strpos($_SERVER['REQUEST_URI'], $new_login) === false){
//                 wp_safe_redirect( home_url( 'NonExistentPage' ), 302 );
//       exit(); 
//     }
//  }
// add_action( 'login_head', 'redirect_to_nonexistent_page');

// function redirect_to_actual_login(){
 
//   $new_login =  'helping-hand';
//   if(parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY) == $new_login&& ($_GET['redirect'] !== false)){ 
//     echo "fhsk".$new_login. "sdf";    
//                  wp_safe_redirect(home_url("wp-login.php?". $new_login . "&redirect=false"));
//      exit();
 
//   }
// }
// add_action( 'init', 'redirect_to_actual_login');



add_action('admin_init', 'remove_dashboard_widgets');

function remove_dashboard_widgets()
{
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

}

add_action('wp_dashboard_setup', 'add_dashboard_widgets');

function add_dashboard_widgets()
{
	// id, name, fuc=nction,
	wp_add_dashboard_widget( 'all-pages', 'Recent pages', 'display_recent_pages', null, null );
}

function display_recent_pages()
{
	echo "Namaste!!";
}

/* Minimum navigation links */
add_action( 'admin_menu', 'add_or_remove_admin_menu');

function add_or_remove_admin_menu()
{
	// if(!current_user_can( 'administrator' ){
		// remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit.php' ); //Post
		remove_menu_page( 'users.php' );
		// remove_menu_page( 'index.php' );
		remove_menu_page( 'update-core.php' );
		remove_menu_page( 'upload.php' );
		// remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'admin.php' );
		remove_menu_page( 'plugins.php' );
		remove_menu_page( 'options-general.php' );
	// }
}

// add_action('wp_dashboard_setup', 'add_dashboard_widgets');

// function add_dashboard_widgets()
// {
// 	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
// 	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
// 	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
// 	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
// 	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

// 	// id, name, fuc=nction,
// 	wp_add_dashboard_widget( 'all-pages', 'Recent pages', 'display_recent_pages', null, null );
// }

// function display_recent_pages()
// {
// 	echo "Namaste!!";
// }


