<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ristars
 */
$logo_footer = get_field('logo_footer', 'option'); 
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');

?>

	<footer id="colophon" class="footer">
		<div class="grid-container">
			<?php if ( ! empty( $logo_footer ) ): ?>
				<div class='mb-20'><a href='<?php echo get_home_url(); ?>' ><img src="<?php echo esc_url( $logo_footer ); ?>" alt="logo"></a></div>
			<?php endif ?>
			<?php if( ! empty( $address ) ): ?>
				<div class='white-color mb-9'>
					<?php echo esc_html($address); ?>
				</div>
			<?php endif; ?>
			<?php if( ! empty( $email ) ): ?>
				<div class='mb-9'>
					<a class='white-color' href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
				</div>
			<?php endif; ?>
			<?php if( ! empty( $phone ) ): ?>
				<div><a class='white-color' href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></div>
			<?php endif; ?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
