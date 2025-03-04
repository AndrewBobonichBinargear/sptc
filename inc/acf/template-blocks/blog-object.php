<?php
$services = get_field('select_blog');

if ($services): ?>
<div class="container">

  <div class="service-object-container">
    <?php if (is_front_page()) : ?>
        <div class="service-object-container-warpper">
            <h2>Latest News
              <a href="/blog/" class="btn_small_white">View more</a>
            </h2>
        </div>
    <?php endif; ?>
    <?php
    $blogs = get_field('select_blog');

    if ($blogs): ?>
      <div>
          <div class="blog-object-container-wrapper">
              <?php foreach ($blogs as $blog):
                  $acf_fields = get_field('hero_section', $blog->ID);
                  $background_image = $acf_fields['background_image'] ?? get_the_post_thumbnail_url($blog->ID);
                  $blog_title = get_the_title($blog->ID);
                  $blog_content = get_post_field('post_content', $blog->ID);
                  $blog_excerpt = mb_strimwidth(wp_strip_all_tags($blog_content), 0, 100, '...');
                  $blog_permalink = get_permalink($blog->ID);
              ?>
                  <div class="blog-item" data-title="<?php echo esc_attr(strtolower($blog_title)); ?>">
                      <img src="<?php echo esc_url($background_image); ?>" alt="image">
                      <div class="blog-item-wrapper">
                          <h2 class="h3_monts_med"><?php echo esc_html($blog_title); ?></h2>
                          <h4><?php echo esc_html($blog_excerpt); ?></h4>
                          <a href="<?php echo esc_url($blog_permalink); ?>" class="h3_monts_med">Read More</a>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php endif; ?>
