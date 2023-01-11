<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sarahbrowntherapy
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sarahbrowntherapy_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sarahbrowntherapy_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sarahbrowntherapy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sarahbrowntherapy_pingback_header' );

/**
 * Returns html for post hero.
 * 
 * @return bool.
 */
function sarahbrowntherapy_hero() {
	$post_type = get_post_type();
	$image_url = $post_type === 'page' ? get_field( 'banner_image' ) : get_the_post_thumbnail_url();

	if ( ! $image_url ) {
		return false;
	} 
	?>

	<div class="entry-hero" style="background-image: url( '<?php echo esc_url( $image_url ); ?>' );">

		<div class="entry-hero__content">

			<h1 class="entry-hero__heading">
				<?php
				if ( get_field( 'banner_heading' ) ) {
					the_field( 'banner_heading' );
				} else {
					echo wp_kses_post( get_the_title() );
				}
				?>
				<span class="entry-hero__wave" style="background-image: url( '<?php echo esc_url( get_template_directory_uri() ); ?>/images/wave-white.svg' );"></span>
			</h1><!-- .entry-hero__heading -->

			<?php $subheading_field = $post_type === 'service' ? 'service_sub-heading' : 'banner_sub-heading'; ?>

			<?php if ( get_field( $subheading_field ) ) : ?>
				<p class="entry-hero__sub-heading">
					<?php the_field( $subheading_field ); ?>
				</p><!-- .entry-hero__sub-heading -->
			<?php endif; ?>

		</div><!-- .entry-hero__content -->

	</div><!-- .entry-hero -->
	<?php

	return true;
}
