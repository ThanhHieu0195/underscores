<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			// the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$_s_description = get_bloginfo( 'description', 'display' );
			if ( $_s_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $_s_description; /* WPCS: xss ok. */ ?></p>
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
		<header class="header trans_300">
		<!-- Top Navigation-->
		<div class="top_nav">
			<div class="container">
			<div class="row">
				<div class="col-md-6">
				<div class="top_nav_left">free shipping on all u.s orders over $50</div>
				</div>
				<div class="col-md-6 text-right">
				<div class="top_nav_right">
					<ul class="top_nav_menu">
					<!-- Currency / Language / My Account-->
					<li class="currency"><a href="#">usd<i class="fa fa-angle-down"></i></a>
						<ul class="currency_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
						</ul>
					</li>
					<li class="language"><a href="#">English<i class="fa fa-angle-down"></i></a>
						<ul class="language_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
						</ul>
					</li>
					<li class="account"><a href="#">My Account<i class="fa fa-angle-down"></i></a>
						<ul class="account_selection">
						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					</ul>
				</div>
				</div>
			</div>
			</div>
		</div>
		<!-- Main Navigation-->
		<div class="main_nav_container">
			<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
				<div class="logo_container"><a href="#">colo<span>shop</span></a></div>
				<nav class="navbar">
					<?= clean_custom_menus() ?>
					<ul class="navbar_user">
					<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
					<li class="checkout"><a href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="checkout_items" id="checkout_items"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a></li>
					</ul>
					<div class="hamburger_container"><i class="fa fa-bars" aria-hidden="true"></i></div>
				</nav>
				</div>
			</div>
			</div>
		</div>
		</header>
		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
			<li class="menu_item has-children"><a href="#">usd<i class="fa fa-angle-down"></i></a>
				<ul class="menu_selection">
				<li><a href="#">cad</a></li>
				<li><a href="#">aud</a></li>
				<li><a href="#">eur</a></li>
				<li><a href="#">gbp</a></li>
				</ul>
			</li>
			<li class="menu_item has-children"><a href="#">English<i class="fa fa-angle-down"></i></a>
				<ul class="menu_selection">
				<li><a href="#">French</a></li>
				<li><a href="#">Italian</a></li>
				<li><a href="#">German</a></li>
				<li><a href="#">Spanish</a></li>
				</ul>
			</li>
			<li class="menu_item has-children"><a href="#">My Account<i class="fa fa-angle-down"></i></a>
				<ul class="menu_selection">
				<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
				<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
				</ul>
			</li>
			<li class="menu_item"><a href="#">home</a></li>
			<li class="menu_item"><a href="#">shop</a></li>
			<li class="menu_item"><a href="#">promotion</a></li>
			<li class="menu_item"><a href="#">pages</a></li>
			<li class="menu_item"><a href="#">blog</a></li>
			<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
		</div>
