<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

	<footer id="colophon" class="site-footer">
		<div class="ed-container">
			<?php get_template_part( 'template-parts/footer/info' ); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div id="back-to-top"><span class="icon-long-arrow-up"></span></div>
<div id="email-popup" class="email-popup popup-trigger"  data-popup-trigger="consultation-popup">
	<div class="email-popup__container">
		<div class="email-popup__message">
			Request Free Consultation
		</div>
		<div class="email-popup__icon">
			<span class="icon-envelope"></span>
		</div>
	</div>
</div>
<div class="body-blackout"></div>
<div class="popup-modal shadow" data-popup-modal="consultation-popup">
	<span class="icon-close popup-modal__close"></span>
	<div class="pop-up-content">
		<h2>Request Free Consultation</h3>
		<!-- Calendly inline widget begin -->
		<div id="calendly-iframe" class="calendly-inline-widget" data-url="https://calendly.com/marianne-bo/15-minute-meeting" style="min-width:320px;height:700px;">
		<h1>Please Wait...</h1>
		</div>
		<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
		<!-- Calendly inline widget end -->
	</div>
</div>
<div class="popup-modal popup-modal-small shadow" data-popup-modal="package-form-popup">
	<span class="icon-close popup-modal__close"></span>
		<div class="pop-up-content">
		<h2 style="max-width: 320px;">Thank you for choosing My Business VA</h3>
		<?php echo do_shortcode( '[contact-form-7 id="704" title="Sign Up Form"]' ); ?>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
