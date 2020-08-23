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
		add_action('wp_print_scripts', [ $this, 'dequeue_cf7' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'action_enqueue_bonn' ] );
		add_filter( 'use_block_editor_for_post_type', [ $this, 'prefix_disable_gutenberg' ], 10, 2 );
		add_filter( 'wp_check_filetype_and_ext', [ $this, 'wpse_file_and_ext_webp' ], 10, 4 );
		add_filter( 'upload_mimes', [ $this, 'wpse_mime_types_webp' ] );
	}

	/**
	 * Enqueues scripts.
	 */
	public function dequeue_cf7() {
		wp_dequeue_script('google-recaptcha');
	}

	/**
	 * Enqueues scripts.
	 */
	public function action_enqueue_bonn() {
		global $template;
		wp_enqueue_style( 'tinyslider-css', get_theme_file_uri( '/assets/css/tiny-slider.min.css' ), [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'tinyslider-js', get_theme_file_uri( '/assets/js/tiny-slider.min.js' ), [], '2.9.3', false );
		wp_enqueue_style( 'owl-css', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ), [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'owl-theme-css', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ), [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'owl-transition-css', get_theme_file_uri( '/assets/css/owl.transitions.min.css' ), [], null );  // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'wp-rig-navigation', get_theme_file_uri( '/assets/js/navigation.min.js' ), array(), '20151215', true );
		wp_enqueue_script( 'wp-rig-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.min.js' ), array(), '20151215', true );
		wp_enqueue_script( 'owl-js', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), [ 'jquery' ], '1.3.3', true );
		wp_enqueue_script( 'waypoint-js', get_theme_file_uri( '/assets/js/jquery.waypoints.min.js' ), [ 'jquery' ], '2.0.3', true );
		wp_enqueue_script( 'counterup-js', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), [ 'jquery' ], '2.0.3', true );
		wp_enqueue_script( 'classyloader-js', get_theme_file_uri( '/assets/js/jquery.classyloader.min.js' ), [ 'jquery' ], '1.2.3', true );
		wp_enqueue_script( 'wp-rig-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), [ 'jquery' ], [], true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'bonn_headroomjs', get_theme_file_uri( '/assets/js/headroom.min.js' ), [], [], false );
		wp_enqueue_script( 'wp-rig-theme-js', get_theme_file_uri( '/assets/js/theme.min.js' ), [], [], false );
		wp_register_style( 'wp-rig-swipercss', '//unpkg.com/swiper/swiper-bundle.min.css', [], null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_script( 'wp-rig-swiper', '//unpkg.com/swiper/swiper-bundle.min.js', [], null, false ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_script( 'wp-rig-sharer', '//cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js', [], null, false ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_script( 'wp-rig-recaptchadefer', get_theme_file_uri( '/assets/js/recaptchadefer.min.js' ), array( 'jquery' ), '1.0', true );
	}


	/**
	 * Add disable gutenberg on mla ang page post type.
	 *
	 * @param string $current_status status.
	 * @param string $post_type post type.
	 */
	public function prefix_disable_gutenberg( $current_status, $post_type ) {
		// Use your post type key instead of 'mla_portfolio'.
		if ( 'page' ===  $post_type ) return false;
		return $current_status;
	}

	/**
	 * Sets the extension and mime type for .webp files.
	 *
	 * @param array  $wp_check_filetype_and_ext File data array containing 'ext', 'type', and
	 *                                          'proper_filename' keys.
	 * @param string $file                      Full path to the file.
	 * @param string $filename                  The name of the file (may differ from $file due to
	 *                                          $file being in a tmp directory).
	 * @param array  $mimes                     Key is the file extension with value as the mime type.
	 */

	public function wpse_file_and_ext_webp( $types, $file, $filename, $mimes ) {
		if ( false !== strpos( $filename, '.webp' ) ) {
			$types['ext'] = 'webp';
			$types['type'] = 'image/webp';
		}

		return $types;
	}


	/**
	 * Adds webp filetype to allowed mimes
	 *
	 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
	 *
	 * @param array $mimes Mime types keyed by the file extension regex corresponding to
	 *                     those types. 'swf' and 'exe' removed from full list. 'htm|html' also
	 *                     removed depending on '$user' capabilities.
	 *
	 * @return array
	 */
	public function wpse_mime_types_webp( $mimes ) {
		$mimes['webp'] = 'image/webp';

		return $mimes;
	}

}
