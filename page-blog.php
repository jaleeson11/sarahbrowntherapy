<?php
/**
 * The template for displaying the blog page
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

		$posts = new WP_Query(
			array(
				'post_type'      => 'post',
				'paged'          => $paged,
				'posts_per_page' => 5,     
			)
		);

		?>
		<div class="container">

			<div class="custom-content">
				<?php
				if ( $posts->have_posts() ) {
					while ( $posts->have_posts() ) {
						$posts->the_post();
						
						get_template_part( 'template-parts/content', 'list-item' );
					}

					$total_pages = $posts->max_num_pages;
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
					<h2><?php echo esc_html( 'Looks like there\'s no posts to display...' ); ?></h2>
					<?php
				}

				wp_reset_postdata();
				?>

			</div><!-- .custom-content -->

		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
