<?php
/**
 * Template part for displaying the custom header media
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<div class="top-header">
	<div class="ed-container">
		<div class="header-social">
			<p class="header-social-text">Follow Us</p>
			<div class="social-icons ">
				<a href="https://www.facebook.com/mybusinessva" class="facebook" data-title="Facebook" target="_blank"><span class="icon-facebook"></span></a>
				<a href="https://www.linkedin.com/company/mybusinessva" class="linkedin" data-title="Linkedin" target="_blank"><span class="icon-linkedin"></span></a>
			</div>
		</div>
		<div class="header-call-to">
			Call Us:  <a href="tel:+44 20 3286 2879">+44 20 3286 2879</a>
		</div>
		<div class="header-contact-us">
			<div class="menu-topbar-menu-container">
				<ul id="topnav">
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-448">
						<a href="#contactus">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="front-header-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home"><img width="487" height="337" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.webp' ) ) ?>" class="custom-logo" alt="MyBusinessVA"></a>
		</div>
	</div>
</div>


