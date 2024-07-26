<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ristars
 */

get_header();

$args = array(
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'taxonomy'     => 'category',
);
$projects_query = new WP_Query($args);

?>

<main class="main-content">


        <?php $terms = get_terms( 'category' );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            echo '<ul id="filters-all">';
            echo '<button class="filter-button" data-filter="*">Всі</button>';
            foreach ( $terms as $term ) {
            echo '<button data-filter=".' . $term->slug . '" >' . $term->name . '</button>';
            }
            echo '</ul>';
        }
        ?> 

    <div class="grid-container">
            <?php if ( $projects_query->have_posts() ) : ?> 

                <div class="all-projects-wrapper grid-x grid-margin-x"> 
                    <?php while ( $projects_query->have_posts() ) : $projects_query->the_post();
                        $custom_image = get_field('custom_image');
                        ?>
                        <?php $terms_2 = get_the_terms( get_the_ID() , 'category' );  ?>  
                        <div class="large-4 medium-6 small-12 cell mb-30 post-card-item <?php echo $terms_2[0]->slug; ?>" data-category="<?php echo $terms_2[0]->slug; ?>">
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
                                        endif; ?>
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
                    wp_reset_postdata(); ?>
                </div>

            <?php endif; ?>

    </div>
    
    <div class="text-center">
        <button class="resources-more">Показати більше</button>
    </div>

</main>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> 

<?php
get_footer();
