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
?>

	<main id="primary" class="site-main">
		<div class="grid-container">
<<<<<<< HEAD
			
			<?php the_content(); ?>
			
=======
			<div class="grid-x grid-margin-x">
				<?php the_content(); ?>
			</div>
>>>>>>> d197c3cc9b3811d6a91eb48842dc454deebc4e5a
		</div>
	</main>

<?php
get_footer();
