<?php
/**
 * The template for displaying the services page
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

		$services = new WP_Query(
			array(
				'post_type'      => 'service',
				'paged'          => $paged,
				'posts_per_page' => 2,     
			)
		);

		?>
		<section class="site-section">
			<div class="container">
				<?php
				if ( $services->have_posts() ) {
					while ( $services->have_posts() ) {
						$services->the_post();

						get_template_part( 'template-parts/content', get_post_type() );
					}

					$total_pages = $services->max_num_pages;
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
						</div>
						<?php
					endif;
				} else {
					?>
					<h2><?php echo esc_html( 'Looks like there\'s no services to display...' ); ?></h2>
					<?php
				}

				wp_reset_postdata();
				?>

			</div><!-- .container -->
		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
