<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ristars
 */
$custom_image = get_field('custom_image');
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="header-post-card">
			<?php
				if ( $custom_image ) : 
					echo '<img src="' . esc_url( $custom_image['url'] ) . '" alt="' . esc_attr( $custom_image['alt'] ) . '" class="custom-image">';
				endif;
			?>
			</header>

			<div class="post-card-content"> 
				<?php
					if ( is_singular() ) :
						the_title( '<h5 class="entry-title">', '</h5>' );
					else :
						the_title( '<h5 class="post-card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
				endif; ?>
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<div class="post-categories">';
					foreach ( $categories as $category ) {
						echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="category-link sonic-silver-color">' . esc_html( $category->name ) . '</a> ';
					}
					echo '</div>';
				}
				?>
			</div>

			<footer class="entry-footer">
				
			</footer>
		</article>
	
