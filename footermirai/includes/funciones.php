<?php

function foo_menu_admin(){
    add_menu_page("FootMirai", "FootMirai", "manage_options", FOO_RUTA . '/admin/configuraciones.php');
}

function add_styles(){

    // modificar ruta (segundo parametro) si las carpetas de instalacion han sido modificadas
    wp_enqueue_style( 'styles', '/wp-content/plugins/footermirai/admin/styles.css');
}
add_action( 'wp_enqueue_scripts', 'add_styles' );


function foo_anadir_contenido() {
    $page_id = get_queried_object_id();
    echo '<div class="site-footer foo_footer">
            <div class="foo_tittle">
                Titulo del sitio: '. get_bloginfo( "blogname" ) . '<br />
                Ruta: '.get_bloginfo( "siteurl" ).'  
            </div>
            <div class="foo_admin_mail">Mail del admin: '. get_bloginfo( "admin_email" ) . '</div> 
            <div class="foo_post_info">
                Titulo del post: ' . get_the_title(). '<br /> 
                ID del post: ' . $page_id.
            '</div>
        </div>'
    ;
}


function short_code_footer(){
    $page_id = get_queried_object_id();
    $html='<div class="site-footer foo_footer">
    <div class="foo_tittle">
        Titulo del sitio: '. get_bloginfo( "blogname" ) . '<br />
        Ruta: '.get_bloginfo( "siteurl" ).'  
    </div>
    <div class="foo_admin_mail">Mail del admin: '. get_bloginfo( "admin_email" ) . '</div> 
    <div class="foo_post_info">
        Titulo del post: ' . get_the_title(). '<br /> 
        ID del post: ' . $page_id.
    '</div>
    </div>'
    ;
    return $html;
}   

add_shortcode('info_site', 'short_code_footer');
add_action('wp_footer', 'foo_anadir_contenido');
?>