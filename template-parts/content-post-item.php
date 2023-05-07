<?php
/**
 * Template part for displaying post items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ['post-item'] ); ?>>

	<?php
	if ( has_post_thumbnail() ) :
		?>
		<a href="<?php the_permalink(); ?>" class="post-item__link">
			<div class="post-item__thumbnail observe" style="background-image: url( '<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium_large' ) ); ?>' );"></div>
		</a>
		<?php
	endif;
	?>

	<section class="post-item__body observe">
		<header class="post-item__header">
			<a href="<?php the_permalink(); ?>" class="post-item__link">
				<h2 class="post-item__title h3">
					<?php the_title(); ?>
				</h2><!-- .post-item__title -->
			</a><!-- post-item__link -->

			<?php if ( get_post_type() === 'post' ) : ?>
				<div class="post-item__meta">
					<?php sarahbrowntherapy_posted_on(); ?>
				</div><!-- .post-item__meta -->
			<?php endif; ?>
		</header><!-- .post-item__header -->

		<p class="post-item__excerpt">
			<?php echo esc_html( wp_trim_words( get_the_excerpt(), 50 ) ); ?>
		</p><!-- .post-item__excerpt -->
		
		<a href="<?php the_permalink(); ?>" class="site-button post-item__link">
			<?php 
			if ( get_post_type() === 'post' ) {
				echo esc_html( 'Read More' );
			} else {
				echo esc_html( 'More On ' . get_the_title() );
			}
			?>
		</a><!-- post-item__link -->
	</section><!-- .post-item__body -->

</article><!-- .post-item__item -->
