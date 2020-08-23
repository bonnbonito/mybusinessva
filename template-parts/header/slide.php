<?php
/**
 * Template part for displaying the header slide
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( have_rows( 'front_slider' ) ) :
	?>
<script type="text/javascript">
	jQuery(function($){
		$('#ed-slider').owlCarousel({
			autoPlay: true,
			nav: true,
			pagination: false,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			singleItem:true,
			autoPlay: 9000000,
			autoHeight:true,
			loop: true,
			items: 1,
			navText: ['prev', 'next'],
			paginationNumbers: true,
			afterAction: function(el){
			//remove class active
				this.$owlItems.removeClass('active')
				//add class active
				this.$owlItems //owl internal $ object containing items
				.eq(this.currentItem).addClass('active')
			}
		});

	});
</script>
<div id="ed-slider" class="slider owl-carousel">
	<?php
		while ( have_rows( 'front_slider' ) ) :
			the_row();
			?>
			<div class="slides">
				<img src="<?php echo esc_url( get_sub_field( 'image' )['url'] ); ?>" alt="<?php echo esc_attr( get_sub_field( 'image' )['alt'] ); ?>" loading="lazy" />
				<div class="caption-wrapper">
					<div class="slider-caption">
						<div class = "slider-content"><?php the_sub_field( 'content' ); ?></div>
						<a href="<?php the_sub_field( 'learn_more_link' ); ?>" style="margin-top:40px;" class='slider-viewmore ed-bttn'>Learn More</a>
					</div>
				</div>
			</div>
		<?php
		endwhile;
	?>
</div>
<div id="front-slider" class="front-slider slider">
	<?php
		while ( have_rows( 'front_slider' ) ) :
			the_row();
			?>
			<div class="slides">
				<img src="<?php echo esc_url( get_sub_field( 'image' )['url'] ); ?>" alt="<?php echo esc_attr( get_sub_field( 'image' )['alt'] ); ?>" loading="lazy" />
				<div class="caption-wrapper">
					<div class="slider-caption">
						<div class = "slider-content"><?php the_sub_field( 'content' ); ?></div>
						<a href="<?php the_sub_field( 'learn_more_link' ); ?>" style="margin-top:40px;" class='slider-viewmore ed-bttn'>Learn More</a>
					</div>
				</div>
			</div>
		<?php
		endwhile;
	?>
</div>
<script>
	const slider = tns({
		container: '#front-slider',
		mode: 'gallery',
		autoPlay: true,
		controls: true,
		nav: false,
		pagination: false,
		speed: 1000,
		autoPlay: 9000,
		loop: true,
		items: 1,
	});
</script>
	<?php
endif;
?>
