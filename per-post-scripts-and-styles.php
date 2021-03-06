<?php
/**
 * Plugin Name: Per Post Scripts & Styles (davidosomething fork)
 * Plugin URI: http://philipwalton.com/2011/09/25/per-post-scripts-and-styles/
 * Description: Add specific scripts and stylesheets to posts, pages, and custom post types.
 * Version: 1.2-fork
 * Author: Philip Walton, @davidosomething
 * Author URI: http://philipwalton.com
 */

function ppss_init()
{
	require_once('PPSS_Model.php');
	require_once('PPSS_Controller.php');	
	
	$PPSS = new PPSS_Controller();
	$PPSS->model = new PPSS_Model;
	$PPSS->view = dirname(__FILE__) . '/PPSS_View.php';
	
}
add_action( 'pw_framework_loaded', 'ppss_init' );

require_once('PW_Framework/bootstrap.php');
