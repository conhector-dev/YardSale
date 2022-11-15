<?php

function chtk_assets () {
    wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap", array(),false,'all');
    wp_register_style("google-font-2", "https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap", array(),false,'all');
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), false, 'all');

    wp_enqueue_style("estilos", get_template_directory_uri()."/assets/css/style.css", array('google-font','google-font-2','bootstrap'),false, 'all',);

    wp_enqueue_script("yardsale-js",get_template_directory_uri()."/assets/js/script.js");
};
add_action("wp_enqueue_scripts","chtk_assets");

function chtk_theme_support() {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo",
    array(
        "width" => 170,
        "height" => 35,
        "flex-width" => true,
        "flex-height" => true,
    )
    );
};
add_action("after_setup_theme","chtk_theme_support");

function chtk_add_menus() {
    register_nav_menus(
        array(
            "main-menu" => "Menú Principal",
            "responsive-menu" => "Menú Responsivo"
        )
    );
};
add_action("after_setup_theme","chtk_add_menus");

function chtk_add_sidebar(){
    register_sidebar(
        array(
            "name" => "Pie de Página",
            "id" => "pie-pagina",
        )
    );
};
add_action("widgets_init","chtk_add_sidebar");

function chtk_add_custom_post_type() {

    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'producto',
        'all_items' => 'Todos los productos',

    );

    $args = array(
        'labels'                => $labels,
		'description'           => 'Productos para listar en un catalogo.',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => array('slug' => 'producto'),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_position'         => 5,
		'supports'              => array('title','author','thumbnail','editor'),
		'taxonomies'            => array('category'),
		'show_in_rest'          => true,
		'menu_icon'             => 'dashicons-cart',
    );

    register_post_type("producto", $args);
};
add_action("init","chtk_add_custom_post_type");

