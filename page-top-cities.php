<?php
/**
 * Template Name: TOP Cities Page
 */

get_header();



$hero_section = get_field('hero_section');
$background_image = $hero_section['background_image'] ?? '';
$background_image_mobile = $hero_section['background_image_mobile'] ?? '';
$main_title = $hero_section['title'] ?? '';
$button = $hero_section['button'] ?? [];
?>

<main class="services-page">
  <section class="services_hero" style="background-image: linear-gradient(1deg, rgba(13, 13, 13, 0.80) 0.9%, rgba(13, 13, 13, 0.00) 99%), url(<?php echo esc_url($background_image); ?>);">
      <div class="container">
          <h1><?php echo esc_html($main_title); ?></h1>
          <?php if (!empty($button['url']) && !empty($button['title'])) : ?>
              <a href="<?php echo esc_url($button['url']); ?>" class="btn_small">
                  <?php echo esc_html($button['title']); ?>
              </a>
          <?php endif; ?>
      </div>
      <style>
          @media (max-width: 767px) {
              .services_hero {
                  background-image: linear-gradient(1deg, rgba(13, 13, 13, 0.80) 0.9%, rgba(13, 13, 13, 0.00) 99%), url(<?php echo esc_url($background_image_mobile); ?>) !important;
              }
          }
      </style>
  </section>
  <div class="container">
      <div class="top_city_wrapper">
          <?php
          $categories = get_terms(array(
              'taxonomy'   => 'top_city_category',
              'hide_empty' => true,
          ));

          if (!empty($categories) && !is_wp_error($categories)) :
              foreach ($categories as $category) :
                  $args = array(
                      'post_type'      => 'top_cities',
                      'posts_per_page' => -1,
                      'tax_query'      => array(
                          array(
                              'taxonomy' => 'top_city_category',
                              'field'    => 'term_id',
                              'terms'    => $category->term_id,
                          ),
                      ),
                  );

                  $query = new WP_Query($args);

                  if ($query->have_posts()) : ?>
                  <div class="top-city-category">
                      <h2><?php echo esc_html($category->name); ?></h2>

                      <div class="top-city-category-wrapper">
                          <?php while ($query->have_posts()) : $query->the_post();
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

                              </div> <!-- .top-cities-list -->
                          <?php endwhile; ?>
                      </div> <!-- .top-city-category-wrapper -->
                  </div> <!-- .top-city-category -->
                  <?php endif;
                  wp_reset_postdata();
              endforeach;
          endif;
          ?>
      </div>
  </div>

  <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>


<?php get_footer(); ?>
