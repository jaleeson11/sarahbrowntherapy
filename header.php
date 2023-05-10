<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sarahbrowntherapy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php if ( is_single() ) {
		single_post_title( '', true );
	} else {
		bloginfo( 'name' ); echo " - "; bloginfo( 'description' );
	} ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	$fonts = [
		'SourceSansPro-Regular',
		'LibreBaskerville-Regular',
		'LibreBaskerville-Italic',
		'SourceSansPro-SemiBold',
		'SourceSansPro-Bold',
		'SourceSansPro-Italic',
	];

	foreach ($fonts as $font) {
		?>
		<link rel="preload" href="<?php echo get_template_directory_uri() . '/fonts/' . $font . '.woff' ?>" as="font" type="font/woff" crossorigin>
		<?php
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sarahbrowntherapy' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-header__inner">
				<div class="site-branding">
					<?php
					the_custom_logo();
					?>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-label="Menu Toggle" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .site-header__inner -->
		</div><!-- .container -->
	</header><!-- #masthead -->
