<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php underscores_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		$i = 0;
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		if ( 'post' === get_post_type() ) :
		?>

		<?php endif; ?>

			<div class="entry-content">
			<?php
			$i++;
			// the_content( sprintf(
			// 	wp_kses(
			// 		/* translators: %s: Name of current post. Only visible to screen readers */
			// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores' ),
			// 		array(
			// 			'span' => array(
			// 				'class' => array(),
			// 			),
			// 		)
			// 	),
			// 	get_the_title()
			// ) );
			echo '<p>'.substr(get_the_excerpt(),0,100) .'</p>';
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			) );
			?>
			<button id="<?php the_ID(); ?>" class="bn">Lire la suite...</button>
			<p class="cont" id="<?php the_ID(); ?>1"></p>
			</div><!-- .entry-content -->

	</header><!-- .entry-header -->

	

	<footer class="entry-footer">
		<?php underscores_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
