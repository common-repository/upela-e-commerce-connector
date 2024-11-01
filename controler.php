<?php

/*

Plugin Name: Upela Connector
Plugin URI: http://www.upela.com 
Description: Upela connector for Wordpress build a bridge between your E-Commerce sites on Wordpress (such as WooCommerce) and Upela.
Version: 1.0.0
Author: Hexalogic
Author URI: http://www.hexalogic.fr
License: GPL2

*/

if (!defined('UPELAWORDPRESS_VERSION')) define('UPELAWORDPRESS_VERSION','1.0.0');
if (!defined('PLUGIN_PATH_UPELAWORDPRESS')) define('PLUGIN_PATH_UPELAWORDPRESS', plugin_dir_path( __FILE__ )); 
if (!defined('PLUGIN_URL_UPELAWORDPRESS')) define('PLUGIN_URL_UPELAWORDPRESS', plugin_dir_url( __FILE__ ));

/*
$i = strlen( PLUGIN_PATH_UPELAWORDPRESS ) - 2 ;
while ( substr( PLUGIN_PATH_UPELAWORDPRESS, $i, 1 ) != '/' ) {
	$i--;
}
define('PLUGINS_PATH', substr( PLUGIN_PATH_UPELAWORDPRESS, 0, $i ) );
*/
define('PLUGINS_PATH', dirname( dirname( __FILE__ ) ));
//echo PLUGINS_PATH; exit;

if (!defined('THEMES_PATH')) define('THEMES_PATH', get_theme_root());
//if (!defined('ROOT_URL')) define('ROOT_URL', get_option('siteurl') . '/');
if(is_ssl()) {
	$url = site_url( '/', 'https' );
	if (!defined('ROOT_URL')) define('ROOT_URL', $url);
} else {
	$url = site_url( '/', 'http' );
	if (!defined('ROOT_URL')) define('ROOT_URL', $url);
}

if (!defined('UPELAWORDPRESS_URL')) define('UPELAWORDPRESS_URL',ROOT_URL . 'wp-admin/admin.php?page=upela-wordpress');

/* Les hook pour l'activation du plugin */

register_activation_hook( __FILE__, 'db_upela_install' );

register_activation_hook( __FILE__, 'db_upela_init' );

/* Création de la base de donnée */

function db_upela_install() {
   global $wpdb;
   $table = $wpdb->prefix . "upela_connector";
   $sql = "CREATE TABLE IF NOT EXISTS $table (
				  id int(1) NOT NULL AUTO_INCREMENT,
				  username_upela varchar(255) NOT NULL,
				  password_upela varchar(255) NOT NULL,
				  company_name varchar(255) NOT NULL,
				  street1 varchar(255) NOT NULL,
				  street2 varchar(255) NOT NULL,
				  street3 varchar(255) NOT NULL,
				  city varchar(255) NOT NULL,
				  state varchar(50) NOT NULL,
				  zip varchar(50) NOT NULL,
				  country varchar(255) NOT NULL,
				  phone varchar(50) NOT NULL,
				  support varchar(255) NOT NULL,
				  PRIMARY KEY (id)
				);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	dbDelta( $sql );
}

function db_upela_init() {
	 global $wpdb;
	 $table = $wpdb->prefix . "upela_connector";
  	 $rows_affected = $wpdb->insert( $table, array( 
		 'username_upela' => '', 
		 'password_upela' => '', 
		 'company_name' => '',
		 'street1' => '', 
		 'street2' => '', 
		 'street3' => '', 
		 'city' => '',
		 'state' => '',
		 'zip' => '', 
		 'country' => '',
		 'phone' => '',
		 'support' => '',
		 ) 
	 );	
}



/* Ajout du menu et de la page */

// Ajout de la fonction au menu

add_action('admin_menu', 'upela_admin_menu');

//Définition du menu dans les options
function upela_admin_menu() {

		add_menu_page(__('Upela WordPress', 'upela'), __('Upela', 'upela'),'manage_options','upela-wordpress', 'upela_admin',PLUGIN_URL_UPELAWORDPRESS.'img/logo.png');
		add_submenu_page('upela-wordpress',__('Set Up | Upela WordPress', 'upela'),__('Set Up', 'upela'),'manage_options','set-up','upela_set_up');

		global $submenu;
		if (isset($submenu['upela-wordpress'])) {
			$submenu['upela-wordpress'][0][0] =	__('Settings', 'upela');
		}
}
// Contenu de la page à afficher

function upela_admin() {  
   		// On affiche la page de base
		require_once('control/controlAdmin.php');
		wp_enqueue_style( 'UpelaCss', plugins_url( 'upela-e-commerce-connector/css/admin.css' , dirname(__FILE__) ));
}

function upela_set_up() {
		require_once('control/controlSetUp.php');
		wp_enqueue_style( 'UpelaCss', plugins_url( 'upela-e-commerce-connector/css/admin.css' , dirname(__FILE__) ));
}


/****************************************/
/************* Partie Upela *********/
/****************************************/

add_action( 'plugins_loaded', 'load_translations' );

function load_translations() {
	load_plugin_textdomain('upela', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

add_action( 'plugins_loaded', 'upela_connection' );

function upela_connection() {
	if ( isset($_REQUEST['action']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) ) {
		include_once('connection.php');
		exit;
	}
}


/*  Copyright 2016  Upela  (email : contact@upela.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

?>