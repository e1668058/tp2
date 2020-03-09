<?php
/**
 * The template for displaying evenements pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */
    
get_header();
?>
    
	<div id="primary" class="content-area">
   <h1>Nos événements importants cette année</h1>
		<main id="main" class="site-main" style="display:grid;grid-template-columns: repeat(3, 2fr);grid-template-rows: repeat(31, 2fr);">

         <header class="page-header">
				<!-- <?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				// the_archive_description( '<div class="archive-description">', '</div>' );
            ?> -->
            
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) {
               the_post();
               $jour = get_the_date('j');
               $mois = (int)get_the_date('m');
               $gridArea = $jour. '/' . ($mois%3+1) . '/' . ($jour+1) . '/' . (($mois%3+1)+1);
               echo '<h3 style=grid-area:'.$gridArea.'; ><a href='.get_permalink(). '>' . get_the_title() . ' ' .  get_the_date('j m y') . '</a></h3>';
               
             }

		    ?>

       <!-- div class="grille" style="grid-area:<?php echo $gridArea ?>">
                <?php 
                   //    the_title( '<h2><a href="' . esc_url(get_permalink() ) . '"rel="bookmark">' .'</a>' . get_the_date('j m y'). ' - ' . $gridArea . ' </h2>' ); 
                ?>
                </div -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();