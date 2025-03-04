<?php
$services = get_field('select_services');

if ($services): ?>
<div class="container">


  <div class="service-object-container">
    <?php if (is_front_page()) : ?>
        <div class="service-object-container-warpper">
            <h2>Featured Services
              <a href="/service/" class="btn_small_white">View more</a>
            </h2>
        </div>
    <?php endif; ?>
    <div class="service-object-container-blocks">
      <?php foreach ($services as $service):
          $hero_section = get_field('hero_section', $service->ID);
          $background_image_mobile = $hero_section['background_image_mobile'] ?? '';
          $service_title = get_the_title($service->ID);
          $service_tags = get_the_terms($service->ID, 'service_tag');
      ?>
          <div class="service-item" style="background-image: url('<?php echo esc_url($background_image_mobile); ?>');">
              <h2 class="h1_monts_med"><?php echo esc_html($service_title); ?></h2>

              <div class="service-item-wrapper">
                  <p class="h1_monts_med">Event services</p>

                  <?php if (!empty($service_tags) && !is_wp_error($service_tags)): ?>
                    <div class="service-tags">
                        <ul>
                            <?php foreach ($service_tags as $tag): ?>
                                <li class="service-tag"><h4><?php echo esc_html($tag->name); ?></h4> </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                  <?php endif; ?>

                  <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" class="btn_small">Book Now</a>
              </div>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php endif; ?>
