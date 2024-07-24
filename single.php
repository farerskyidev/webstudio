<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ristars
 */

get_header();
?>

<main class="main-content">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
						<h1 class="page-title entry__title"><?php the_title(); ?></h1>
						<?php if ( has_post_thumbnail() ) : ?>
							<div title="<?php the_title_attribute(); ?>" class="entry__thumb">
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
						<?php endif; ?>
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
