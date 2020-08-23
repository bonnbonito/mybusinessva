<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use Description_Walker;

if ( ! wp_rig()->is_primary_nav_menu_active() ) {
	return;
}

?>

<section data-anchor="menu" class="header menu-section">
	<div class="ed-container">
		<nav id="site-navigation" class="main-navigation nav__primary" role="navigation">
			<div class="mobile-site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" ><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/mobile-logo.webp' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			</div>
			<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-rig' ); ?></button>
			<?php
			wp_nav_menu( array(
				'container'       => 'ul',
				'container_class' => 'menu-header',
				'menu_id'         => 'menu-topnav',
				'menu_class'	  => 'menu nav-menu',
				'theme_location'  => 'primary',
				'walker' => new Description_Walker() ) );
			?>
		</nav><!-- #site-navigation -->
	</div>
</section>
