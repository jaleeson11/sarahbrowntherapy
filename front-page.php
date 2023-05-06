<?php
/**
 * The home page template file
 *
 * @package sarahbrowntherapy
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>

		<div class="container">

			<div class="custom-content">

				<section>
					<div class="image-cta">
						<?php
						$image_url = get_theme_mod( 'about_me_image' );
						$image_id  = attachment_url_to_postid( $image_url );
						?>

						<div class="image-cta__content observe">
							<h2 class="image-cta__heading"><?php echo esc_html( get_theme_mod( 'about_me_heading' ) ); ?></h2>
							<p class="image-cta__text"><?php echo esc_html( get_theme_mod( 'about_me_text' ) ); ?></p>
							<a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'about_me_button_link' ) ) ); ?>" class="site-button"><?php echo esc_html( get_theme_mod( 'about_me_button_text' ) ); ?></a>
						</div>
						<img class="image-cta__image observe" src="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'medium_large' ) ); ?>" alt="<?php echo get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>">
					</div>
				</section>

				<section class="section">
					<header class="section__header observe">
						<h2 class="section__title">
							<?php echo esc_html( 'My Services' ); ?>
							<span class="section__wave" style="background-image: url( '<?php echo esc_url( get_template_directory_uri() ); ?>/images/wave.svg' );"></span>
						</h2>
					</header>
					<div class="flex-group flex-group--gap-lg">
						<?php
						$services = new WP_Query(
							array(
								'post_type'      => 'service',
								'posts_per_page' => 3,
							)
						);

						if ( $services->have_posts() ) {
							while ( $services->have_posts() ) {
								$services->the_post();
								?>

								<div class="card observe">
									<a href="<?php the_permalink(); ?>" class="card__link d-block">
										<div class="card__image" style="background-image: url( '<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium_large' ) ); ?>' );"></div>
									</a>
									<div class="card__body">
										<a href="<?php the_permalink(); ?>" class="card__link d-block">
											<h3 class="card__title h4"><?php the_title(); ?></h3>
										</a>
										<?php
										if ( get_field( 'service_sub-heading' ) ) :
											?>
											<p class="card__text">
												<?php echo esc_html( wp_trim_words( get_the_excerpt(), 15 ) ); ?>
											</p>
											<?php
										endif;
										?>
									</div>
								</div>

								<?php
							}
							
							?>
						</div>

						<footer class="section__footer observe">
							<a href="<?php the_permalink( get_page_by_path( 'services' ) ); ?>" class="site-button"><?php echo esc_html( 'All Services I Offer' ); ?></a>
						</footer>
						<?php
						} else {
							?>
							<h2><?php echo esc_html( 'Looks like there\'s no services to display...' ); ?></h2>
							<?php
						}
						?>
				</section>

				<section class="section">
					<header class="section__header observe">
						<h2 class="section__title">
							<?php echo esc_html( 'Testimonials' ); ?>
							<span class="section__wave" style="background-image: url( '<?php echo esc_url( get_template_directory_uri() ); ?>/images/wave.svg' );"></span>
						</h2>
					</header>
					<?php
					$testimonial = new WP_Query(
						array(
							'post_type'      => 'testimonial',
							'posts_per_page' => 1,
							'orderby'        => 'rand',
						)
					);

					if ( $testimonial->have_posts() ) {
						while ( $testimonial->have_posts() ) {
							$testimonial->the_post();
							?>

							<div class="testimonial testimonial--lg observe">
								<blockquote class="testimonial__quote">
									<?php echo esc_html( wp_trim_words( get_the_content(), 100 ) ); ?>
									<footer class="testimonial__footer">
										<span class="testimonial__client">
											<?php
											if ( get_field( 'client_name' ) ) {
												the_field( 'client_name' );
											} else {
												echo esc_html( 'Anonymous' );
											}
											?>
										</span>
									</footer>
								</blockquote>
							</div>

							<?php
						}

						?>
						<footer class="section__footer observe">
							<a href="<?php the_permalink( get_page_by_path( 'testimonials' ) ); ?>" class="site-button"><?php echo esc_html( 'More Client Reviews' ); ?></a>
						</footer>
						<?php
					} else {
						?>
						<h2><?php echo esc_html( 'Looks like there\'s no testimonials to display...' ); ?></h2>
						<?php
					}
					?>
				</section>

			</div><!-- .custom-content -->

		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
