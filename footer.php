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
		<div class="contact-banner">
			<div class="container">
				<div class="flex-group flex-group--gap-xl">
					<div class="contact-banner__item contact-banner__item--location">
						<h2 class="contact-banner__heading">
							<?php echo esc_html( get_theme_mod( 'contact_banner_location' ) ); ?>
						</h2>
						<small class="contact-banner__sub-heading">
							<?php echo esc_html( get_theme_mod( 'contact_banner_location_sub-heading' ) ); ?>
						</small>
					</div><!-- .contact-banner__item -->
					<div class="contact-banner__item contact-banner__item--email">
						<a href="mailto: <?php echo esc_html( get_option( 'admin_email' ) ); ?>" class="contact-banner__link">
							<h2 class="contact-banner__heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_email' ) ); ?>
							</h2>
							<small class="contact-banner__sub-heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_email_sub-heading' ) ); ?>
							</small>
						</a>
					</div><!-- .contact-banner__item -->
					<div class="contact-banner__item contact-banner__item--phone">
						<?php $phone_num = get_theme_mod( 'contact_banner_phone' ); ?>
						<a href="tel: <?php echo esc_html( $phone_num ); ?>" class="contact-banner__link">
							<h2 class="contact-banner__heading">
								<?php echo esc_html( $phone_num ); ?>
							</h2>
							<small class="contact-banner__sub-heading">
								<?php echo esc_html( get_theme_mod( 'contact_banner_phone_sub-heading' ) ); ?>
							</small>
						</a>
					</div><!-- .contact-banner__item -->
				</div><!-- .contact-banner__inner -->
			</div><!-- .container -->
		</div><!-- .contact-banner -->

		<span class="site-copyright">
			<?php
			echo esc_html( '&copy; Copyright ' );
			echo esc_html( date( 'Y ' ) );
			echo esc_html( get_option( 'blogname' ) );
			echo esc_html( '. All Rights Reserved' );
			?>
		</span><!-- .site-copyright -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
