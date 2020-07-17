<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package halloween
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Eater&family=Jolly+Lodger&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button style="font-family: Eater" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php esc_html_e( 'Menu', 'spooky' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		
		
		<div class="site-branding">
			
			
			
				<p style="font-family: Eater;font-size:28px;color:red" class="site-description">JOYEUX HALLOWEEN <?php if(isset($_SESSION['nom'])) echo 'Taslima'; ?></p>
			
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
