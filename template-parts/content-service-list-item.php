<?php
/**
 * Template part for displaying service list items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<div class="entry-service">

	<?php
	if ( has_post_thumbnail() ) :
		?>
		<a href="<?php the_permalink(); ?>">
			<div class="entry-thumbnail observe" style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url() ); ?>' );"></div>
		</a>
		<?php
	endif;
	?>

	<div class="entry-service__body observe">
		<a href="<?php the_permalink(); ?>">
			<h3 class="entry-title">
				<?php the_title(); ?>
			</h3><!-- .entry-title -->
		</a>

		<div class="entry-excerpt">
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 50 ) ); ?></p>
		</div><!-- .entry-content -->

		<a href="<?php the_permalink(); ?>" class="site-button"><?php echo esc_html( 'Find Out More' ); ?></a>
	</div><!-- .entry-body -->

</div><!-- .entry-service -->
