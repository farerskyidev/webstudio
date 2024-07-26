<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ristars
 */

get_header();
<<<<<<< HEAD
$custom_image = get_field('custom_image');
=======
>>>>>>> d197c3cc9b3811d6a91eb48842dc454deebc4e5a
?>

<main class="main-content">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
						<h1 class="page-title entry__title"><?php the_title(); ?></h1>
<<<<<<< HEAD
						<div class='single-post__image'>
						<?php
							if ( $custom_image ) : 
								echo '<img src="' . esc_url( $custom_image['url'] ) . '" alt="' . esc_attr( $custom_image['alt'] ) . '" class="custom-image">';
							endif;
						?>
						</div>
=======
						<?php if ( has_post_thumbnail() ) : ?>
							<div title="<?php the_title_attribute(); ?>" class="entry__thumb">
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
						<?php endif; ?>
>>>>>>> d197c3cc9b3811d6a91eb48842dc454deebc4e5a
						<div class="entry__content clearfix">
							<?php the_content( '', true ); ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php
get_footer();
