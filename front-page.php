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

			<section id="about-me" class="site-section">
				<?php
				$image_url = get_theme_mod( 'about_me_image' );
				$image_id  = attachment_url_to_postid( $image_url );
				?>

				<img class="about-me__image" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>">
				<div class="about-me__content">
					<h2 class="about-me__heading"><?php echo esc_html( get_theme_mod( 'about_me_heading' ) ); ?></h2>
					<p class="about-me__text"><?php echo esc_html( get_theme_mod( 'about_me_text' ) ); ?></p>
					<a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'about_me_button_link' ) ) ); ?>" class="site-button"><?php echo esc_html( get_theme_mod( 'about_me_button_text' ) ); ?></a>
				</div>
			</section><!-- #about-me -->


			<section id="services" class="site-section">
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

						<div class="service">
							<a href="<?php the_permalink(); ?>">
								<div class="service__image" style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url() ); ?>' );"></div>
								<div class="service__body">
									<h4 class="service__title">
										<?php the_title(); ?>
										<span class="title__wave" style="background-image: url( '<?php echo esc_url( get_template_directory_uri() ); ?>/images/wave.svg' );"></span>
									</h4>
									<?php
									if ( get_field( 'service_sub-heading' ) ) :
										?>
										<p class="service__sub-heading">
											<?php the_field( 'service_sub-heading' ); ?>
										</p>
										<?php
									endif;
									?>
								</div>
							</a>
						</div>

						<?php
					}
					
					?>
					<footer class="services__footer">
						<a href="<?php the_permalink( get_page_by_path( 'services' ) ); ?>" class="site-button"><?php echo esc_html( 'See More' ); ?></a>
					</footer>
					<?php
				} else {
					?>
					<h2><?php echo esc_html( 'Looks like there\'s no services to display...' ); ?></h2>
					<?php
				}
				?>

			</section><!-- #services -->

			<section id="testimonial" class="site-section">
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

						<div class="testimonial__body">
							<blockquote class="quote">
								<?php echo esc_html( wp_trim_words( get_the_content(), 100 ) ); ?>
								<footer class="quote__footer">
									<?php
									if ( get_field( 'client_name' ) ) :
										?>
										<span class="quote__client">
											<?php the_field( 'client_name' ); ?>
										</span>
										<?php
									endif;
									?>
								</footer>
							</blockquote>
						</div>

						<?php
					}

					?>
					<footer class="testimonial__footer">
						<a href="<?php the_permalink( get_page_by_path( 'testimonials' ) ); ?>" class="site-button"><?php echo esc_html( 'See More' ); ?></a>
					</footer>
					<?php
				} else {
					?>
					<h2><?php echo esc_html( 'Looks like there\'s no testimonials to display...' ); ?></h2>
					<?php
				}
				?>
			</section>

		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
