<?php
/**
 * ristars functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ristars
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ristars_setup() {
    load_theme_textdomain( 'ristars', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'ristars' ),
        )
    );
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    add_theme_support(
        'custom-background',
        apply_filters(
            'ristars_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'ristars_setup' );

function ristars_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'ristars_content_width', 640 );
}
add_action( 'after_setup_theme', 'ristars_content_width', 0 );

function ristars_scripts() {
    wp_style_add_data( 'ristars-style', 'rtl', 'replace' );
    wp_enqueue_style( 'ristars-style', get_stylesheet_directory_uri() . '/assets/css/main.css' ); 
    wp_enqueue_style('foundation-css', get_template_directory_uri() . '/assets/css/foundation.min.css');
    wp_enqueue_script('jquery');

    wp_enqueue_script('isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), null, true);


    wp_enqueue_script( 'ristars_scripts', get_template_directory_uri() . '/js/navigation.js', array('jquery'), null, true );
    wp_enqueue_script('foundation-js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), null, true);
    wp_add_inline_script('foundation-js', 'jQuery(document).ready(function($) { $(document).foundation(); });');
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  
        wp_enqueue_script( 'comment-reply' );
    }

    wp_localize_script( 'ristars_scripts', 'lex_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'site_url' => site_url('/')
    ) );

}
add_action( 'wp_enqueue_scripts', 'ristars_scripts' );





function load_resources_posts() {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $loaded_posts = isset($_GET['loaded_posts']) ? array_map('intval', $_GET['loaded_posts']) : array();

    $query_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => $page,
        'orderby' => 'title',
        'post__not_in' => $loaded_posts,
    );

    $projects_query = new WP_Query($query_args);

    if ($projects_query->have_posts()) {
            while ($projects_query->have_posts()) : $projects_query->the_post();
                $custom_image = get_field('custom_image');
                $post_id = get_the_ID();
                ?>
                <?php $terms_2 = get_the_terms($post_id, 'category'); ?>
                <div class="large-4 medium-6 small-12 cell mb-30 post-card-item <?php echo $terms_2[0]->slug; ?>" data-category="<?php echo $terms_2[0]->slug; ?>" data-id="<?php echo $post_id; ?>">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="header-post-card">
                            <?php
                                if ($custom_image) :
                                    echo '<img src="' . esc_url($custom_image['url']) . '" alt="' . esc_attr($custom_image['alt']) . '" class="custom-image">';
                                endif;
                            ?>
                        </header>
                        <div class="post-card-content">
                            <?php
                                if (is_singular()) :
                                    the_title('<h5 class="entry-title">', '</h5>');
                                else :
                                    the_title('<h5 class="post-card-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                                endif;
                            ?>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo '<div class="post-categories">';
                                foreach ($categories as $category) {
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-link sonic-silver-color">' . esc_html($category->name) . '</a> ';
                                }
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </article>
                </div>
            <?php endwhile;
            wp_reset_postdata();
    }
    die;
}
add_action('wp_ajax_load_resources_posts', 'load_resources_posts');
add_action('wp_ajax_nopriv_load_resources_posts', 'load_resources_posts');



if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
} 
