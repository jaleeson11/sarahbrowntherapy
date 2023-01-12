<?php
/**
 * Template part for displaying post list items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<div class="entry-list-item">

	<?php
	if ( has_post_thumbnail() ) :
		?>
		<a href="<?php the_permalink(); ?>">
			<div class="entry-thumbnail observe" style="background-image: url( '<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium_large' ) ); ?>' );"></div>
		</a>
		<?php
	endif;
	?>

	<div class="entry-list-item__body observe">
		<header class="entry-header">
			<a href="<?php the_permalink(); ?>">
				<h3 class="entry-title">
					<?php the_title(); ?>
				</h3><!-- .entry-title -->
			</a>

			<?php if ( get_post_type() === 'post' ) : ?>
				<div class="entry-meta">
					<?php sarahbrowntherapy_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-excerpt">
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 50 ) ); ?></p>
		</div><!-- .entry-excerpt -->

		<a href="<?php the_permalink(); ?>" class="site-button">
			<?php 
			if ( get_post_type() === 'post' ) {
				echo esc_html( 'Read More' );
			} else {
				echo esc_html( 'Find Out More' );
			}
			?>
		</a>
	</div><!-- .entry-body -->

</div><!-- .entry-list-item -->
