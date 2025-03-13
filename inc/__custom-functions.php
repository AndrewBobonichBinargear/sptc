<?php

/**
 * Break content on N words
 *
 * @param [type] $text
 * @param integer $counttext
 * @param string $sep
 * @return void
 */
function str_word($text, $counttext = 30, $sep = ' ')
{
	$text = wp_strip_all_tags($text);
	$words = explode($sep, $text);

	if (count($words) > $counttext)
		$text = join($sep, array_slice($words, 0, $counttext));

	return $text;
}

/**
 * Generates a responsive <picture> element with multiple <source> elements for different screen sizes.
 *
 * @param int    $image_id ID of the image attachment.
 * @param string $thumb    Size of the thumbnail to retrieve for the default image.
 * @param array  $args     An associative array of attributes to apply to the <img> element.
 * @param array  $min      An associative array of min-width media queries and corresponding image sizes.
 *                         Example: ['768' => 'medium', '1024' => 'large']
 * @param array  $max      An associative array of max-width media queries and corresponding image sizes.
 *                         Example: ['767' => 'thumbnail', '1023' => 'medium']
 *
 * @return string The generated HTML markup for the <picture> element or an empty string if the image is not found.
 */
function generate_picture_element($image_id, $thumb = 'full', $args = [], $min = [], $max = []) {
	$image = wp_get_attachment_image_src($image_id, $thumb);

	// Check if the image source is available
	if ($image) {
		$output = '<picture aria-hidden="true">';

		// Generate <source> elements for min-width queries
		if ($min) {
			foreach ($min as $width => $size) {
				$source_image = wp_get_attachment_image_src($image_id, $size);
				if ($source_image) {
					$output .= '<source media="(min-width:' . esc_attr($width) . 'px)" srcset="' . esc_url($source_image[0]) . '">';
				}
			}
		}

		// Generate <source> elements for max-width queries
		if ($max) {
			foreach ($max as $width => $size) {
				$source_image = wp_get_attachment_image_src($image_id, $size);
				if ($source_image) {
					$output .= '<source media="(max-width:' . esc_attr($width) . 'px)" srcset="' . esc_url($source_image[0]) . '">';
				}
			}
		}

		// Build attributes string for the <img> element
		$img_attributes = '';
		if (!empty($args) && is_array($args)) {
			foreach ($args as $key => $value) {
				$img_attributes .= esc_attr($key) . '="' . esc_attr($value) . '" ';
			}
		}

		// Add the <img> element
		$output .= '<img data-src="' . esc_url($image[0]) . '" alt="' . esc_attr(get_the_title($image_id)) . '" src="' . esc_url($image[0]) . '" ' . trim($img_attributes) . '>';
		$output .= '</picture>';

		return $output;
	}

	return '';
}

/**
 * Count Page View
 *
 * @param string $cont_id
 * @param boolean $user
 * @return void
 */
function view($cont_id = '', $user = false)
{
	global $post;

	if (!$cont_id) {
		$cont_id = $post->ID;
	}

	$view = get_post_meta($cont_id, 'views', true);

	if ($user) {
		$view = get_user_meta($cont_id, 'views', true);
	}

	if ($view) {
		if ($view > 999999) {
			$view /= 1000000;
			$view = round($view, 1);
			return $view . 'KK';
		} elseif ($view > 999) {
			$view /= 1000;
			$view = round($view, 1);
			return $view . 'K';
		} else {
			return $view;
		}
	} else {
		return '0';
	}
}

/**
 * Get Current Url
 */
function currUrl()
{
	global $wp;
	return home_url($wp->request);
}

/**
 * get assets
 */
function assets($source = '')
{
	return get_template_directory_uri() . '/assets/' . $source;
}

/**
 * get image
 */
function get_image($img = '', $thumb = 'large', $attr = [])
{
	return wp_get_attachment_image($img, $thumb, '', $attr);
}

/**
 * show image
 */
function show_image($img = '', $thumb = 'large', $attr = [])
{
	if ($img) {
		echo wp_get_attachment_image($img, $thumb, '', $attr);
	}
}

/**
 * Social Share
 *
 * @param [string] $url
 * @param [string] $title
 * @return string
 */
function socialShare($url, $title)
{
	return '<div class="social_share">
		<div class="article-social">
			<a class="social_share_link social_share_whatsapp"
				href="https://api.whatsapp.com/send?text=' . $title . '&url=' . $url . '"
				title="Whatsapp" rel="nofollow noopener" target="_blank">
				<span
					class="social_share_svg"><img src="' .
		get_template_directory_uri() . '/assets/img/icons/s-whatsapp.svg'
		. '" /></span>
			</a>
			<a class="social_share_link social_share_facebook"
				href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '"
				title="Facebook" rel="nofollow noopener" target="_blank">
				<span class="social_share_svg"><img src="' .
		get_template_directory_uri() . '/assets/img/icons/s-facebook.svg'
		. '" /></span>
			</a>
			<a class="social_share_link social_share_gmail"
				href="mailto:' .
		$url . '?subject=' . $title . '"
				title="Mail" rel="nofollow noopener" target="_blank">
				<span class="social_share_svg"><img src="' .
		get_template_directory_uri() . '/assets/img/icons/s-mail.svg'
		. '" /></span>
			</a>
			<a class="social_share_link social_share_twitter"
				href="http://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '"
				title="Twitter" rel="nofollow noopener" target="_blank">
				<span class="social_share_svg"><img src="' .
		get_template_directory_uri() . '/assets/img/icons/s-twitter.svg'
		. '" /></span>
			</a>
		</div>
	</div>';
}

/**
 * Show YouTube Video
 */
function showYoutubeVideo($link)
{
	$video = $link;
	$video = substr($video, strpos($video, "=") + 1);
	if ($link): ?>
<iframe width="635" height="405" src="https://www.youtube.com/embed/<?= $video ?>" title="YouTube video player"
  frameborder="0" allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
  allowfullscreen></iframe>
<?php else: ?>
<img src="https://img.youtube.com/vi/<?php $video ?>/default.jpg" class="br-40" alt="youtube">
<?php endif;
}


function load_more_posts() {
    $paged = $_POST['page'] ?? 1;
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'paged'          => $paged,
    );

    $query = new WP_Query($args);
    $total_posts = $query->found_posts;
    $posts_shown = $paged * 3;

    if ($query->have_posts()) :
        echo '<div class="blog-object-container-wrapper">';

        while ($query->have_posts()) : $query->the_post();
            $acf_fields = get_field('hero_section');
            $background_image = $acf_fields['background_image'] ?? get_the_post_thumbnail_url();
            $blog_title = get_the_title();
            $blog_content = get_the_content();
            $blog_excerpt = mb_strimwidth(wp_strip_all_tags($blog_content), 0, 100, '...');
            $blog_permalink = get_permalink();
            ?>
            <div class="blog-item" data-post-id="<?php the_ID(); ?>" data-title="<?php echo esc_attr(strtolower($blog_title)); ?>">
                <img src="<?php echo esc_url($background_image); ?>" alt="image">
                <div class="blog-item-wrapper">
                    <h2 class="h3_monts_med"><?php echo esc_html($blog_title); ?></h2>
                    <h4><?php echo esc_html($blog_excerpt); ?></h4>
                    <a href="<?php echo esc_url($blog_permalink); ?>" class="h3_monts_med">Read More</a>
                </div>
            </div>
            <?php
        endwhile;

        echo '</div>';
    endif;

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');



function enqueue_custom_scripts() {
    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/inc/acf/js/ajax.js', array('jquery'), null, true);

    wp_localize_script('custom-ajax-script', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


add_action('wp_ajax_filter_fleet', 'filter_fleet_callback');
add_action('wp_ajax_nopriv_filter_fleet', 'filter_fleet_callback');

function filter_fleet_callback() {
    $car_type = $_POST['car_type'] ?? '';
    $seats = $_POST['seats'] ?? '';
    $service = $_POST['service'] ?? '';

    $args = [
        'post_type'      => 'our_fleet',
        'posts_per_page' => -1,
    ];

    $meta_query = ['relation' => 'AND'];
    if ($car_type) {
        $meta_query[] = [
            'key'     => 'characteristics_fleet_car_type',
            'value'   => $car_type,
            'compare' => '='
        ];
    }
    if ($seats) {
        $meta_query[] = [
            'key'     => 'characteristics_fleet_passengers',
            'value'   => $seats,
            'compare' => '='
        ];
    }
    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }

    if (!empty($service)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'fleet_tag',
                'field'    => 'name',
                'terms'    => $service,
            ],
        ];
    }

    $query = new WP_Query($args);
    ob_start();
    ?>
        <?php if ($query->have_posts()) : ?>
            <?php $counter = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post();
                $gallery = get_field('preview_slider');
                $characteristics = get_field('characteristics_fleet');
                $car_type = $characteristics['car_type'] ?? '';
                $seats = $characteristics['passengers'] ?? '';
                $baggage = $characteristics['baggage'] ?? '';
                $car_specifications = get_field('car_specifications');
                $tags = get_the_terms(get_the_ID(), 'fleet_tag');
                $excerpt = get_the_excerpt();

                $services = [];
                if (!empty($tags) && !is_wp_error($tags)) {
                    foreach ($tags as $tag) {
                        $services[] = $tag->name;
                    }
                }
                $services_list = implode(', ', $services);
                ?>
                <div class="fleet-item">
                    <?php if (!empty($gallery)) : ?>
                        <div class="fleet-gallery swiper-container swiper-<?php echo $counter; ?>" data-slider-id="<?php echo $counter; ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $image) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination swiper-pagination-<?php echo $counter; ?>"></div>
                        </div>
                    <?php endif; ?>
                    <div class="fleet-item-info">
                        <h3 class="h3_monts_med fleet-item-title"><?php the_title(); ?><a href="<?php the_permalink(); ?>" class="btn_small">Book Now</a></h3>
                        <p class="excerpt">
                            <?php
                                if (wp_is_mobile()) {
                                    echo esc_html(mb_strimwidth($excerpt, 0, 133, '...'));
                                } else {
                                    echo esc_html($excerpt);
                                }
                            ?>
                        </p>
                        <div class="fleet-item-car-specs">
                            <?php if (!empty($seats)) : ?>
                                <div class="fleet-item-spec-item fleet-item-spec-item-passengers">
                                    <span><?php echo esc_html($seats); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($baggage)) : ?>
                                <div class="fleet-item-spec-item fleet-item-spec-item-luggage">
                                    <span><?php echo esc_html($baggage); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <p class="fleet-item-car-services"><?php echo esc_html($services_list); ?></p>
                        <div class="fleet-results-cards-book">
                            <a href="<?php the_permalink(); ?>" class="btn_small">Book Now</a>
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p>No fleet items found.</p>
        <?php endif; ?>
    <?php
    echo ob_get_clean();
    wp_die();
}




function add_custom_admin_styles() {
    echo '<style>
        @media (min-width: 782px) {
            .interface-complementary-area {
                width: 500px !important;
            }

						.interface-complementary-area__fill {
							width: 100% !important;
						}
        }
    </style>';
}

add_action('admin_head', 'add_custom_admin_styles');

function top_city_load_more() {
    if (isset($_POST['category_id']) && isset($_POST['offset'])) {
        $category_id = intval($_POST['category_id']);
        $offset = intval($_POST['offset']);

        $args = array(
            'post_type'      => 'top_cities',
            'posts_per_page' => 2,
            'offset'         => $offset,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'top_city_category',
                    'field'    => 'term_id',
                    'terms'    => $category_id,
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $hero_section = get_field('hero_section');
                $background_image_mobile = $hero_section['background_image_mobile'] ?? '';
                $tags = get_the_terms(get_the_ID(), 'top_city_tag');
                ?>
                <div class="top-cities-list"
                    style="background:
                        linear-gradient(180deg, rgba(16, 16, 16, 0.00) 28.35%, #101010 89.26%),
                        url('<?php echo esc_url($background_image_mobile); ?>');
                        background-size: cover;
                        background-position: center;">
                    <div class="top-city-item">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                            <div class="top-city-tags">
                                <?php if (!empty($tags) && !is_wp_error($tags)) :
                                    foreach ($tags as $tag) :
                                        echo '<span class="tag">' . esc_html($tag->name) . '</span>';
                                    endforeach;
                                endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
    }
    die();
}
add_action('wp_ajax_top_city_load_more', 'top_city_load_more');
add_action('wp_ajax_nopriv_top_city_load_more', 'top_city_load_more');
