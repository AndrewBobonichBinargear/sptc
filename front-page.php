<?php
/**
 * The front-page template file
 *
 * This is the most generic template file for a WordPress theme.
 *
 * @package seattlepremiumtowncarservice
 */

get_header();
?>

<?php
$hero_section = get_field('hero_section_home');
$background_image = $hero_section['background_image'];
$main_title = $hero_section['main_title'];
?>

<main class="front">

	<section class="front_hero" style="background-image: linear-gradient(1deg, rgba(13, 13, 13, 0.80) 0.9%, rgba(13, 13, 13, 0.00) 99%), url(<?php echo esc_url($background_image); ?>);">
	    <div class="container">
	        <h1><?php echo esc_html($main_title); ?></h1>
	    </div>
	</section>

	<section class="form">
		<?php echo do_shortcode('[contact-form-7 id="29bca6e" title="Home page"]'); ?>
	</section>

	<div id="form-cf-popup" class="form-cf-popup" style="display:none;">
	    <div class="form-cf-popup-content">
	        <button id="close-popup" class="close-popup">
						<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
							<path d="M3.5 7L24.5 21M3.5 21L24.5 7" stroke="#191919" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
	        <h2>Thank You for Your Request!</h2>
	        <p class="form-cf-popup-desc">Our team has received your "Call Me Back" request and will contact you shortly.</p>
	        <p class="form-cf-popup-sub-desc">Want to explore more?</p>
					<p class="form-cf-popup-sub-desc-click">Click the button below to return to the homepage.</p>
	        <a href="<?php echo esc_url(home_url()); ?>" class="btn_small">Go Back Home</a>
	    </div>
	</div>

	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			the_content();
		endwhile;
	endif;
	?>

</main>

<?php
get_footer();
?>
