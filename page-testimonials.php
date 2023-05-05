<?php
/**
 * The template for displaying the testimonials page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$testimonials = new WP_Query(
			array(
				'post_type'      => 'testimonial',
				'paged'          => $paged,
				'posts_per_page' => 10,     
			)
		);

		?>
		<div class="container">

			<div class="custom-content">
					<?php
					if ( $testimonials->have_posts() ) {
						?>
						<div class="testimonials-grid">
							<?php
							while ( $testimonials->have_posts() ) {
								$testimonials->the_post();
								?>

								<div class="testimonial">

									<blockquote class="testimonial__quote">
										<?php the_content(); ?>

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
										</footer><!-- .testimonial__footer -->

									</blockquote><!-- .testimonial__quote -->

								</div><!-- .testimonial -->

								<?php
							}
							?>
						</div><!-- .testimonials-grid -->

						<?php
						$total_pages = $testimonials->max_num_pages;
						if ( $total_pages > 1 ) :
							$current_page = max( 1, get_query_var( 'paged' ) );
							?>
							<div class="pagination-links">
								<?php
								echo wp_kses_post( 
									paginate_links(
										array(
											'current'      => $current_page,
											'total'        => $total_pages,
											'prev_text'    => 'prev',
											'next_text'    => 'next',
										)
									) 
								)
								?>
							</div><!-- .pagination-links -->
							<?php
						endif;

					} else {
						?>
						<h2><?php echo esc_html( 'Looks like there\'s no testimonials to display...' ); ?></h2>
						<?php
					}
					?>
			</div><!-- .custom-content -->

		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
