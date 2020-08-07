<?php
/**
 * WP_Rig\WP_Rig\My_BusinessVA class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\My_BusinessVA;

use WP_Rig\WP_Rig\Component_Interface;
use function wp_enqueue_style;
use function wp_enqueue_scripts;
use function get_custom_logo;

/**
 * Class for My_BusinessVA Styles
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'mybva';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', [ $this, 'action_enqueue_bonn' ] );
	}

	/**
	 * Enqueues scripts.
	 */
	public function action_enqueue_bonn() {
		global $template;
		wp_enqueue_style( 'wp-rig-fa5', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'owl-css', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'owl-theme-css', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'animate-css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'wp-rig-navigation', get_theme_file_uri( '/assets/js/navigation.min.js' ), array(), '20151215', true );
		wp_enqueue_script( 'wp-rig-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.min.js' ), array(), '20151215', true );
		wp_enqueue_script( 'owl-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', [ 'jquery' ], '1.3.3', true );
		wp_enqueue_script( 'waypoint-js', '//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', [ 'jquery' ], '2.0.3', true );
		wp_enqueue_script( 'counterup-js', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), [ 'jquery' ], '2.0.3', true );
		wp_enqueue_script( 'classyloader-js', get_theme_file_uri( '/assets/js/jquery.classyloader.min.js' ), [ 'jquery' ], '1.2.3', true );
		wp_enqueue_script( 'wp-rig-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), [ 'jquery' ], [], true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'bonn_headroomjs', '//cdn.jsdelivr.net/npm/headroom.js/dist/headroom.min.js', [], [], false );
		wp_enqueue_script( 'wp-rig-theme-js', get_theme_file_uri( '/assets/js/theme.min.js' ), [], [], false );
		wp_register_style( 'wp-rig-swipercss', '//unpkg.com/swiper/swiper-bundle.min.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_script( 'wp-rig-swiper', '//unpkg.com/swiper/swiper-bundle.min.js', [], null, false ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_script( 'wp-rig-sharer', '//cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js', [], null, false ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'wp-rig-elegant', get_theme_file_uri( '/assets/css/elegant.min.css', [], null ) ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'wp-rig-swipercss' );
		wp_enqueue_script( 'wp-rig-swiper' );
		wp_enqueue_script( 'wp-rig-sharer' );
	}
}
