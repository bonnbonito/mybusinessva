<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-front-page' );

?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content/entry', 'front' );
		}
		?>
		<section id="skills" class='ed-counterPro-section'>
			<div class="counterPro-image">
				<?php
					$services_img = get_field( 'services_image' ) ? get_field( 'services_image' )['url'] : get_bloginfo( 'url ' ) . '/wp-content/uploads/2018/03/Executives-skills-lis.jpg';
				?>
				<img src="<?php echo esc_url( $services_img ); ?>"  />
			</div>
			<div class="ed-container">
				<div class="counterPro-content">
					<div class="counterPro-content-text">
						<h2 class="counterPro-title section-title"><?php the_field( 'services_title' ); ?></h2>
						<h4 class="counterPro-subtitle section-subtitle"><?php the_field( 'services_subtitle' ); ?></h4>
						<div class="counterPro-desc section-desc"><?php the_field( 'services_content' ); ?></div>
					</div>
					<?php if ( have_rows( 'services' ) ) : ?>
						<div class="toggle-box-container">
							<?php while ( have_rows( 'services' ) ) :
									the_row();
								?>
								<div class="toggle-box service-toggle">
									<div class="js-toggle"  data-container="toggle-<?php echo esc_attr( get_row_index() ); ?>">
										<div class="js-toggle__left">
											<?php if ( get_sub_field( 'icon' ) ) : ?>
											<div style="margin-right: 10px;">
												<i class="fa <?php the_sub_field( 'icon' ); ?>"></i>
											</div>
											<?php endif; ?>
											<div>
												<?php the_sub_field( 'title' ); ?>
											</div>
										</div>
										<div class="arrow">
											<i class="fa fa-caret-down"></i>
										</div>
									</div>
									<?php if ( get_sub_field( 'content' ) ) : ?>
									<div class="toggle-container" id="toggle-<?php echo esc_attr( get_row_index() ); ?>">
										<?php the_sub_field( 'content' ); ?>
									</div>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="aboutus" class='ed-skillPro-section'>
			<figure class="skillPro-image">
				<?php
					$skills_img = get_field( 'skills_section_image' ) ? get_field( 'skills_section_image' )['url'] : get_bloginfo( 'url ' ) . '/wp-content/uploads/2018/03/Our-Team-Work2.jpg';
				?>
				<img src="<?php echo esc_url( $skills_img ); ?>"  />
			</figure>
			<div class="ed-container">
				<div class="skillPro-content">
					<div class="skillPro-content-text">
						<h2 class="skillPro-title section-title"><?php echo esc_attr( get_field( 'skills_section_title' ) ? get_field( 'skills_section_title' ) : 'Our Team Work' ) ?></h2>

						<div class="skillPro-desc section-desc"><?php the_field( 'skills_section_content' ); ?></div>
					</div>
					<div class="skillPro-content-icon">
						<div class="skillPro-bar-wrap skill-one">
							<canvas class="skill-loader" data-percentage="100" width="120" height="120"></canvas>
							<p class="skill-text"></p>
						</div>
						<div class="skillPro-bar-wrap skill-two">
							<canvas class="skill-loader" data-percentage="100" width="120" height="120"></canvas>
							<p class="skill-text"></p>
						</div>
						<div class="skillPro-bar-wrap skill-three">
							<canvas class="skill-loader" data-percentage="100" width="120" height="120"></canvas>
							<p class="skill-text"></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if ( have_rows( 'team_members' ) ) : ?>
		<section id="ourteam" class="our-team">
			<div class="ed-container">
				<h2 class="our-team__title section-title">Meet Our Team</h2>
				<div class="our-team__grid">
					<?php while ( have_rows( 'team_members' ) ) :
							the_row();
						?>
						<div class="our-team__box">
							<div class="our-team__box__image">
								<img src="<?php echo esc_url( get_sub_field( 'image' )['sizes'][ 'medium' ] ); ?>" alt="<?php the_sub_field( 'name' ); ?>">
							</div>
							<div class="our-team__box__content">
								<h2><?php the_sub_field( 'name' ); ?></h2>
								<h3><?php the_sub_field( 'job' ); ?></h3>
								<?php the_sub_field( 'content' ); ?>
							</div>
							<?php if ( get_sub_field( 'social_links' ) ) : ?>
							<div class="our-team__box__links">
								<?php if ( get_sub_field( 'social_links' )['linkedin'] ) : ?>
									<a href="<?php echo esc_url( get_sub_field( 'social_links' )['linkedin'] ); ?>" target="_blank" title="Visit <?php the_sub_field( 'name' ); ?> LinkedIn account">
										<i class="fab fa-linkedin-in"></i>
									</a>
								<?php endif; ?>
								<?php if ( get_sub_field( 'social_links' )['facebook'] ) : ?>
									<a href="<?php echo esc_url( get_sub_field( 'social_links' )['facebook'] ); ?>" target="_blank" title="Visit <?php the_sub_field( 'name' ); ?> Facebook account">
										<i class="fab fa-facebook-f"></i>
									</a>
								<?php endif; ?>
								<?php if ( get_sub_field( 'social_links' )['twitter'] ) : ?>
									<a href="<?php echo esc_url( get_sub_field( 'social_links' )['twitter'] ); ?>" target="_blank" title="Visit <?php the_sub_field( 'name' ); ?> Twitter account">
										<i class="fab fa-twitter"></i>
									</a>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<section id="pricing" class='ed-testimonial-section ed-pricing-section'>
			<div class="ed-container">
				<h2 class="testimonial-title section-title"><?php the_field( 'pricing_section_title' );?></h2>
				<?php
				$featured_table = get_field( 'featured_pricing_table' );
				$pricing_table = get_field( 'pricing_table' );
				$pricing_table2 = get_field( 'pricing_table_2' );
				?>

				<div class="pricing-table-wrap">
				<div class="pricing-table featured">
					<div class="pricing-heading">
						<h2 class="pricing-title"><?php echo $featured_table['title']; ?></h2>
						<p class="pricing-subtitle"><?php echo $featured_table['sub_title']; ?></p>
					</div>
					<div class="pricing-top-content">
						<div class="pricing-price">
							<span class="pricing-symbol"><i class="fas fa-pound-sign"></i></span>
							<span class="pricing-sum"><?php echo $featured_table['price']; ?></span>
							<?php if ( $featured_table['per'] ) : ?>
							<span class="pricing-per">/<?php echo $featured_table['per']; ?></span>
							<?php endif; ?>
						</div>
					</div>
					<div class="pricing-content">
					<?php
					while ( have_rows( 'featured_pricing_table' ) ) : the_row(); ?>
					<ul>
					<?php while ( have_rows( 'list' ) ) : the_row(); ?>
						<li class="<?php echo get_sub_field( 'checked' ) ? '' : 'unchecked'; ?>"><?php the_sub_field( 'item' ); ?></li>
					<?php  endwhile; ?>
					</ul>
					<?php endwhile; ?>
					</div>
					<div class="pricing-footer">
						<a class="pricing-btn popup-trigger" data-package="<?php echo $featured_table['title']; ?>" data-popup-trigger="package-form-popup">Sign Up Now</a>
					</div>
				</div>
				<div class="pricing-table">
					<div class="pricing-heading">
						<h2 class="pricing-title"><?php echo $pricing_table['title']; ?></h2>
						<p class="pricing-subtitle"><?php echo $pricing_table['sub_title']; ?></p>
					</div>
					<div class="pricing-top-content">
						<div class="pricing-price">
							<span class="pricing-symbol"><i class="fas fa-pound-sign"></i></span>
							<span class="pricing-sum"><?php echo $pricing_table['price']; ?></span>
							<?php if ( $pricing_table['per'] ) : ?>
							<span class="pricing-per">/<?php echo $pricing_table['per']; ?></span>
							<?php endif; ?>
						</div>
					</div>
					<div class="pricing-content">
					<?php
					while ( have_rows( 'pricing_table' ) ) : the_row(); ?>
					<ul>
					<?php while ( have_rows( 'list' ) ) : the_row(); ?>
						<li class="<?php echo get_sub_field( 'checked' ) ? '' : 'unchecked'; ?>"><?php the_sub_field( 'item' ); ?></li>
					<?php  endwhile; ?>
					</ul>
					<?php endwhile; ?>
					</div>
					<div class="pricing-footer">
						<a class="pricing-btn popup-trigger" data-package="<?php echo $pricing_table['title']; ?>" data-popup-trigger="package-form-popup">Sign Up Now</a>
					</div>
				</div>
				<div class="pricing-table">
					<div class="pricing-heading">
						<h2 class="pricing-title"><?php echo $pricing_table2['title']; ?></h2>
						<p class="pricing-subtitle"><?php echo $pricing_table2['sub_title']; ?></p>
					</div>
					<div class="pricing-top-content">
						<div class="pricing-price">
							<span class="pricing-symbol"><i class="fas fa-pound-sign"></i></span>
							<span class="pricing-sum"><?php echo $pricing_table2['price']; ?></span>
							<?php if ( $pricing_table2['per'] ) : ?>
							<span class="pricing-per">/<?php echo $pricing_table2['per']; ?></span>
							<?php endif; ?>
						</div>
					</div>
					<div class="pricing-content">
					<?php
					while ( have_rows( 'pricing_table_2' ) ) : the_row(); ?>
					<ul>
					<?php while ( have_rows( 'list' ) ) : the_row(); ?>
						<li class="<?php echo get_sub_field( 'checked' ) ? '' : 'unchecked'; ?>"><?php the_sub_field( 'item' ); ?></li>
					<?php  endwhile; ?>
					</ul>
					<?php endwhile; ?>
					</div>
					<div class="pricing-footer">
						<a class="pricing-btn popup-trigger" data-package="<?php echo $pricing_table2['title']; ?>" data-popup-trigger="package-form-popup">Sign Up Now</a>
					</div>
				</div>
			</div>
			<script>
				"use strict";
				document.addEventListener('DOMContentLoaded', function () {
				const packageInput = document.querySelector('#packageselect');
				const pricintBtns = document.querySelectorAll('.pricing-btn');
				pricintBtns.forEach(function (btn) {
				btn.addEventListener('click', function () {
					let vapackage = btn.dataset.package;
					packageInput.value = vapackage;
					document.querySelector('#package-selected').textContent = vapackage;
				});
				});
				});
			</script>
			</div>
		</section>
		<?php
		if ( have_rows( 'faqs' ) ) :
			?>
		<section id="faqs" class="faqs-section">
			<div class="ed-container">
				<h2 class="section-title" style="text-align: center;">FAQ's</h2>
				<?php if ( have_rows( 'faqs' ) ) : ?>
					<div class="toggle-box-container">
						<?php while ( have_rows( 'faqs' ) ) :
								the_row();
							?>
							<div class="toggle-box">
								<div class="js-toggle"  data-container="faq-<?php echo esc_attr( get_row_index() ); ?>">
									<div class="js-toggle__left">
										<?php the_sub_field( 'question' ); ?>
									</div>
									<div class="arrow">
										<i class="fa fa-angle-down"></i>
									</div>
								</div>
								<?php if ( get_sub_field( 'answer' ) ) : ?>
								<div class="toggle-container" id="faq-<?php echo esc_attr( get_row_index() ); ?>">
									<?php the_sub_field( 'answer' ); ?>
								</div>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( have_rows( 'testimonial_slider' ) ) :  ?>
		<section id="testimonials" class="testimonials-swiper-section">
			<div class="ed-container">
				<div class="two-columns">
					<div class="left-column">
					<h2 class="section-title" style="color: #fff;">What Our Clients Say</h2>
					</div>
					<div class="right-column">
						<div class="swiper-container testimonial-swiper">
							<div class="swiper-wrapper">
								<?php while ( have_rows( 'testimonial_slider' ) ) :
										the_row();
									?>
								<div class="swiper-slide">
									<div class="client-comments">
										<div class="client-massage">
											<?php the_sub_field( 'content' ); ?>
										</div>
										<div class="client-info clearfix">

											<div class="client-avatar">
													<?php
												$image = get_sub_field( 'image' );
												$size  = 'medium';
													if ( $image ) {
														echo wp_get_attachment_image( $image['id'], $size );
													}
													?>
											</div>
											<div class="client-bio">
												<h3 class="client-name"><?php the_sub_field( 'name' ); ?></h3>
											</div>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
							</div>
							<div class="swiper-pagination"></div>
						</div>
						<script>
						const testimonialSwiper = new Swiper('.testimonial-swiper', {
							loop: true,
							simulateTouch: false,
							speed: 3000,
							nav: true,
							mousewheel: false,
							spaceBetween: 30,
							pagination: {
								clickable: true,
								el: '.testimonial-swiper .swiper-pagination',
							},
						});
						</script>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<section class='ed-cta-section' id="contactus">
		<div class="ed-container">
			<h2 class="cta-title section-title"><?php the_field( 'contact_section_title' ); ?></h2>
			<div class="cta-desc section-desc"><?php the_field( 'contact_section_description' ); ?></div>

			<div class="contact-flex">
				<div class="left-column">
				<?php echo do_shortcode( '[contact-form-7 id="677" title="Contact form 1"]' ); ?>
				</div>
				<div class="right-column">
					<?php
					if ( have_rows( 'contact_details' ) ) :
						while ( have_rows( 'contact_details' ) ) :
							the_row();
							?>
					<div class="contact-box">
						<div class="contact-icon">
							<i class="fa <?php the_sub_field( 'icon' ); ?>"></i>
						</div>
						<div class="contact-details">
							<h3><?php the_sub_field( 'title' ); ?></h3>
							<?php the_sub_field( 'details' ); ?>
						</div>
					</div>
							<?php
					endwhile;
				endif;
					?>
				</div>
			</div>
		</div>
	</section>

	</main><!-- #primary -->
<?php
get_footer();
