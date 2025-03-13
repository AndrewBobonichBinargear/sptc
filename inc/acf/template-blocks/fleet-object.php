<?php
$fleet_objects = get_field('select_fleet');

if ($fleet_objects): ?>
<div class="container">
    <div class="related-fleet-container">
        <div class="why-choose-us-wrapper">
            <h2>Related</h2>
            <a href="/our-fleet/" class="btn_small_white">View more</a>
        </div>
        <div id="related-fleet-results" class="fleet-results-bloks">
            <?php
            $counter = 0;
            foreach ($fleet_objects as $fleet):
                if ($counter >= 3) break;
                $gallery = get_field('preview_slider', $fleet->ID);
                $characteristics = get_field('characteristics_fleet', $fleet->ID);
                $car_type = $characteristics['car_type'] ?? '';
                $seats = $characteristics['passengers'] ?? '';
                $baggage = $characteristics['baggage'] ?? '';
                $excerpt = get_the_excerpt($fleet->ID);

                $tags = get_the_terms($fleet->ID, 'fleet_tag');
                $services = [];
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        $services[] = $tag->name;
                    }
                }
                $services_list = implode(', ', $services);
                ?>
                <div class="related-fleet-item">
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
                    <div class="related-fleet-item-info">
                        <h3 class="h3_monts_med related-fleet-item-title"> <?php echo esc_html(get_the_title($fleet->ID)); ?>
                            <a href="<?php echo esc_url(get_permalink($fleet->ID)); ?>" class="btn_small">Book Now</a>
                        </h3>
                        <p class="excerpt">
                            <?php
                                if (wp_is_mobile()) {
                                    echo esc_html(mb_strimwidth($excerpt, 0, 133, '...'));
                                } else {
                                    echo esc_html($excerpt);
                                }
                            ?>
                        </p>
                        <div class="related-fleet-item-specs">
                            <div class="related-fleet-item-spec-item related-fleet-item-spec-item-passengers">
                                <span><?php echo esc_html($seats); ?></span>
                            </div>
                            <div class="related-fleet-item-spec-item related-fleet-item-spec-item-luggage">
                                <span><?php echo esc_html($baggage); ?></span>
                            </div>
                        </div>
                        <p class="related-fleet-item-services"> <?php echo esc_html($services_list); ?> </p>
                    </div>
                </div>
                <?php
                $counter++;
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php endif; ?>
