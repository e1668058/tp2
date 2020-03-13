<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<!-- Le menu -->
				<nav id='menu'>
					<input id="checkMenu" type="checkbox">
					<label id="btnMenu" for="checkMenu">&#9776;</label>
					<ul  id='bar' class='global'>
						<li class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Accueil</a></li>
						<li><a href="http://localhost/allen_veille2/category/nouvelle/" rel="nouvelle">Nouvelles</a></li>
						<li><a href="http://localhost/allen_veille2/category/evenement/" rel="evenement">Événements</a></li>
					</ul>
					<div id='recherche' class='global'>
						<input id="chkRecherche" type="checkbox">
						<input type='text' id='txtRecherche' placeholder='Recherche'> 
						<label id="btnRecherche" for="chkRecherche"></label>
					</div>
				</nav>

				<?php
			endif;
			$underscores_description = get_bloginfo( 'description', 'display' );
			if ( $underscores_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $underscores_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'underscores' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
