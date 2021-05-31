<?php
/*
Plugin Name: FooterMirai
Description: Plugin creado para la modificación del footer en todos los sitios del multisite
Version:0.01
Author:Carlos
*/

defined('ABSPATH') or die("Bye bye");

define('FOO_RUTA',plugin_dir_path(__FILE__));

include(FOO_RUTA . 'includes/funciones.php');

add_action('admin_menu', 'foo_menu_admin');



register_activation_hook( __FILE__, 'footermirai' );
function footermirai($networkwide) {
    global $wpdb;
                 
    if (function_exists('is_multisite') && is_multisite()) {
        // check if it is a network activation - if so, run the activation function for each blog id
        if ($networkwide) {
                    $old_blog = $wpdb->blogid;
            // Get all blog ids
            $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
            foreach ($blogids as $blog_id) {
                switch_to_blog($blog_id);
            }
            switch_to_blog($old_blog);
            return;
        }   
    } 
}
 


?>