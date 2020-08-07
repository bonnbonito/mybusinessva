<?php
/**
 * Template part for displaying the header slide
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

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
			loop: true,
			items: 1,
			navText: ['prev', 'next'],
			paginationNumbers: true,
			afterAction: function(el){
			//remove class active
				this .$owlItems .removeClass('active')
				//add class active
				this .$owlItems //owl internal $ object containing items
				.eq(this.currentItem) .addClass('active')
			}
		});

	});
</script>
<?php
$query = new WP_Query(
	array(
		'category_name'  => 'slider',
		'posts_per_page' => -1,
	)
);
?>
<div id="ed-slider" class="slider owl-carousel">
	<?php
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
			?>
			<div class="slides">
				<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" />
				<div class="caption-wrapper">
					<div class="slider-caption">
						<div class="slider-title"> <?php the_title(); ?></div>
						<div class = "slider-content"><?php the_excerpt();?></div>
						<a <?php if ( ! has_excerpt() ) { ?> style="margin-top:40px;" <?php } ?> class='slider-viewmore ed-bttn' href="#" >Learn More</a>
					</div>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
	endif;
	?>
</div>
