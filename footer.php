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
						<a href="mailto: <?php echo esc_html( get_option( 'admin_email' ) ); ?>">
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
						<a href="tel: <?php echo esc_html( $phone_num ); ?>">
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

		<div class="site-copyright">
			<p>
				<?php
				echo esc_html( '&copy; Copyright ' );
				echo esc_html( date( 'Y ' ) );
				echo esc_html( get_option( 'blogname' ) );
				echo esc_html( '. All Rights Reserved' );
				?>
			</p>
		</div><!-- .site-copyright -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
