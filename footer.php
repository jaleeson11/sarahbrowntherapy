<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sarahbrowntherapy
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-contact-banner">
			<div class="container">
				<div class="site-contact-banner__inner">
					<div class="site-contact-banner__location">
						<h4 class="site-contact-banner__heading">
							<?php echo esc_html( get_theme_mod( 'contact_banner_location' ) ); ?>
						</h4>
						<p class="site-contact-banner__sub-heading">
							<?php echo esc_html( get_theme_mod( 'contact_banner_location_sub-heading' ) ); ?>
						</p>
					</div><!-- .site-contact-banner__location -->
					<div class="site-contact-banner__email">
						<a href="mailto: <?php echo esc_url( get_option( 'admin_email' ) ); ?>">
							<h4 class="site-contact-banner__heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_email' ) ); ?>
							</h4>
							<p class="site-contact-banner__sub-heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_email_sub-heading' ) ); ?>
							</p>
						</a>
					</div><!-- .site-contact-banner__email -->
					<div class="site-contact-banner__phone">
						<?php $phone_num = get_theme_mod( 'contact_banner_phone' ); ?>
						<a href="tel: <?php echo esc_url( $phone_num ); ?>">
							<h4 class="site-contact-banner__heading">
								<?php echo esc_html( $phone_num ); ?>
							</h4>
							<p class="site-contact-banner__sub-heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_phone_sub-heading' ) ); ?>
							</p>
						</a>
					</div><!-- .site-contact-banner__phone -->
				</div><!-- .site-contact-banner__inner -->
			</div><!-- .container -->
		</div><!-- .site-contact-banner -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sarahbrowntherapy' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'sarahbrowntherapy' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'sarahbrowntherapy' ), 'sarahbrowntherapy', '<a href="http://underscores.me/">Joe Leeson</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
