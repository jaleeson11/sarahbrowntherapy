<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sarahbrowntherapy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
	$post_hero = sarahbrowntherapy_hero();
	if ( ! $post_hero ) :
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<?php 
	else : 
		$post_hero; 
	endif;
	?>

    <div class="container">

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">',
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

    </div><!-- .container -->

</article><!-- #post-<?php the_ID(); ?> -->
