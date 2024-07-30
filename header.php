<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ristars
 */
$logo = get_field('logo', 'option'); 
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');  

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="profile" href="style.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ristars' ); ?></a>

	<header id="masthead" class="header">
		<div class="grid-container">
			<div class="header__wrapper">
				<div class="gap-95">
				<?php if ( ! empty( $logo ) ): ?>
					<div class="site-branding">
						<a href='<?php echo get_home_url(); ?>' ><img src="<?php echo esc_url( $logo ); ?>" alt="logo"></a>	
					</div>
				<?php endif ?>
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(

							'theme_location' => 'menu-1',
							'menu_id'        => 'menu', 
						)
					);
					?>
				</nav>
				</div>
				<div class='gap-50 header__info'>
					<?php if( ! empty( $email ) ): ?>
						<a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
					<?php endif; ?>
					<?php if( ! empty( $phone ) ): ?>
						<a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>	
	</header>
