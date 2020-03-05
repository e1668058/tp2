<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */
// The Query

        //Utiliser ca pour afficher la description : term_description( $category );
        $args = array(
            "category_name" => "conferences",
            "posts_per_page"=> 5,
            "orderby"=>'date',
            'order' => 'ASC'
        );
        $query1 = new WP_Query( $args );


        /* The 2nd Query (without global var) */
        $args2 = array(
            "category_name" => "nouvelles",
            'posts_per_page' => 4
        );
        $query2 = new WP_Query( $args2 );

        $args3 = array(
            "category_name" => "evenements",
            'posts_per_page' => 10,
            "orderby"=>'date',
            'order' => 'DESC'
        );
        $query3 = new WP_Query( $args3 );
       
get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">
    
		<?php
        
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
        ?>

        <div class="content-conference">
        <h1>Nos dernières conférences</h1>
        <?php
        //Pour les conferences
        while ( $query1->have_posts() ) {
            $query1->the_post();
            echo '<div class="conference">';
            echo '<div class="thumbnailConference">';
            echo get_the_post_thumbnail('thumbnail');
            echo '</div>';
            echo '<div class="infoConference">';
            //pour avoir le lien quand tu click le titre
            $link = get_permalink();
            $title = get_the_title();
            echo '<h4><a href='.$link.'>'.$title .' - ' .get_the_date() .  '</a></h4>';
            echo '<p>'.substr(get_the_excerpt(),0,200) .'</p>';
            echo '</div>';
            echo '</div>';
        }
        
        /* Restore original Post Data 
        * NB: Because we are using new WP_Query we aren't stomping on the 
        * original $wp_query and it does not need to be reset with 
        * wp_reset_query(). We just need to set the post data back up with
        * wp_reset_postdata().
        */
        wp_reset_postdata();
        ?>
        </div>
        <h1>Voici les dernières nouvelles</h1>
        <div class="content-nouvelle">
        
        <?php
        // // The 2nd Loop
        while ( $query2->have_posts() ) {
        $query2->the_post();
        echo '<div class="nouvelle">';
        echo '<div class="containNews">';
        //pour avoir le lien quand tu click le titre
        $linkNouvelle = get_permalink($query2->post->ID);
        echo '<h3><a href='.$linkNouvelle.'>' . get_the_title( $query2->post->ID ) . '</a></h3>';
        // echo '<p>'.get_the_excerpt() .'</p>';
        echo '<div class="thumbnailNouvelle">';
        echo get_the_post_thumbnail($post, "thumbnail");
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }

        
        // // Restore original Post Data
        wp_reset_postdata();
        
        ?>

        
        </div>

        <h1>Nos événements importants cette année</h1>
        <div class="content-eve">
        
        <?php
        // // The 2nd Loop
        while ( $query3->have_posts() ) {
        $query3->the_post();
        echo '<div class="eve">';
        //pour avoir le lien quand tu click le titre
        $linkEve = get_permalink($query3->post->ID);
        echo '<h4><a href='.$linkEve.'>' . get_the_title( $query3->post->ID ) .  ' - </a> '.get_the_date().' </h4>';
        // echo '<p>'.get_the_excerpt() .'</p>';
        echo '</div>';
        }

        // // Restore original Post Data
        wp_reset_postdata();
        
        ?>   
        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
