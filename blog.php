<?php
/**
 * Template Name: Blog Template
 */
get_header();
$hero_section = get_field('hero_section');
$background_image = $hero_section['background_image'] ?? '';
$background_image_mobile = $hero_section['background_image_mobile'] ?? '';
$main_title = $hero_section['title'] ?? '';
$button = $hero_section['button'] ?? [];
?>

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
      <div class="blog-object-container">
        <input type="text" id="search-input" placeholder="Search" onkeyup="filterPosts()">

          <div class="blog-object-container-wrapper">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'paged'          => 1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $acf_fields = get_field('hero_section');
                    $background_image = $acf_fields['background_image'] ?? get_the_post_thumbnail_url();
                    $blog_title = get_the_title();
                    $blog_content = get_the_content();
                    $blog_excerpt = mb_strimwidth(wp_strip_all_tags($blog_content), 0, 100, '...');
                    $blog_permalink = get_permalink();
                    ?>
                    <div class="blog-item" data-title="<?php echo esc_attr(strtolower($blog_title)); ?>">
                        <img src="<?php echo esc_url($background_image); ?>" alt="image">
                        <div class="blog-item-wrapper">
                            <h2 class="h3_monts_med"><?php echo esc_html($blog_title); ?></h2>
                            <h4><?php echo esc_html($blog_excerpt); ?></h4>
                            <a href="<?php echo esc_url($blog_permalink); ?>" class="h3_monts_med">Read More</a>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            ?>
          </div>

      </div>
      <div id="loading-icon" style="display:none;">
          <img src="/wp-content/uploads/2025/02/Load.svg" alt="Loading...">
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
