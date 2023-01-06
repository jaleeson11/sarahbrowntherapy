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
				'posts_per_page' => 7,     
			)
		);

		?>
		<section class="site-section">

			<div class="container">
					<?php
					if ( $testimonials->have_posts() ) {
						?>
						<div class="testimonials-grid">
							<?php
							while ( $testimonials->have_posts() ) {
								$testimonials->the_post();

								get_template_part( 'template-parts/content', get_post_type() . '-list-item' );
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
			</div><!-- .container -->

		</section><!-- .site-section -->

	</main><!-- #main -->

<?php
get_footer();
