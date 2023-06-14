<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define('CB_THEME_DIR', WP_CONTENT_DIR . '/themes/cb-saascada');

require_once CB_THEME_DIR . '/inc/cb-posttypes.php';
require_once CB_THEME_DIR . '/inc/cb-taxonomies.php';
require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';
require_once CB_THEME_DIR . '/inc/cb-news.php';


// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


// Remove comment-reply.min.js from footer
function remove_comment_reply_header_hook(){
	wp_deregister_script( 'comment-reply' );
}
add_action('init','remove_comment_reply_header_hook');

add_action('admin_menu', 'remove_comments_menu');
function remove_comments_menu()
{
    remove_menu_page('edit-comments.php');
}

add_filter('theme_page_templates', 'child_theme_remove_page_template');
function child_theme_remove_page_template($page_templates)
{
    // unset($page_templates['page-templates/blank.php'],$page_templates['page-templates/empty.php'], $page_templates['page-templates/fullwidthpage.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php']);
    unset($page_templates['page-templates/blank.php'],$page_templates['page-templates/empty.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php']);
    return $page_templates;
}
add_action('after_setup_theme', 'remove_understrap_post_formats', 11);
function remove_understrap_post_formats()
{
    remove_theme_support('post-formats', array( 'aside', 'image', 'video' , 'quote' , 'link' ));
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}

function widgets_init()
{

    register_sidebar(
        array(
            'name'          => __('Footer Col 1', 'cb-saascada'),
            'id'            => 'footer-1',
            'description'   => __('Footer Col 1', 'cb-saascada'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
        )
    );

    register_nav_menus(array(
        'primary_nav' => __('Primary Nav', 'cb-saascada'),
    ));

    register_nav_menus(array(
        'footer_menu1' => __('Footer Menu 1', 'cb-saascada'),
    ));
    register_nav_menus(array(
        'footer_menu2' => __('Footer Menu 2', 'cb-saascada'),
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => 'Black',
                'slug'  => 'black',
                'color' => '#000000',
            ),
            array(
                'name'  => 'Magenta',
                'slug'  => 'magenta',
                'color' => '#DB00BE',
            ),
            array(
                'name'  => 'Teal',
                'slug'  => 'teal',
                'color' => '#0D6591',
            ),
            array(
                'name'  => 'Mint',
                'slug'  => 'mint',
                'color' => '#2AD6DF',
            ),
        )
    );

}
add_action('widgets_init', 'widgets_init', 11);


remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


//Custom Dashboard Widget
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );
function register_cb_dashboard_widget() {
	wp_add_dashboard_widget(
		'cb_dashboard_widget',
		'Chillibyte',
		'cb_dashboard_widget_display'
	);

}

function cb_dashboard_widget_display() {
   ?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;" src="<?= get_stylesheet_directory_uri().'/img/cb-full.jpg'; ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer" href="mailto:hello@www.chillibyte.co.uk/">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Chillibyte!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
   <?php
}