<?php
$fleet_objects = get_field('fleet_showcase');

if ($fleet_objects): ?>
<div class="container">
    <div class="related-fleet-container">
        <div class="why-choose-us-wrapper">
            <h2>Our Fleet</h2>
        </div>
        <div>
            <div class="outer-slider swiper">
                <div class="swiper-wrapper">
                    <?php
                    $categories_list = [];
                    $fleet_ids = [];

                    foreach ($fleet_objects as $fleet):
                        if (in_array($fleet->ID, $fleet_ids)) continue;
                        $fleet_ids[] = $fleet->ID;

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

                        $categories = get_the_terms($fleet->ID, 'fleet_category');
                        if ($categories) {
                            foreach ($categories as $category) {
                                if (!in_array($category->name, $categories_list)) {
                                    $categories_list[] = $category->name;
                                }
                            }
                        }
                    ?>
                        <div class="swiper-slide">
                            <div class="fleet-showcase-container">
                                <div class="related-fleet-item">
                                    <?php if (!empty($gallery)) : ?>
                                      <div class="fleet-gallery-showcase swiper">
                                          <div class="swiper-wrapper">
                                              <?php foreach ($gallery as $image) : ?>
                                                  <div class="swiper-slide">
                                                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                                  </div>
                                              <?php endforeach; ?>
                                          </div>
                                          <div class="swiper-pagination"></div>
                                      </div>
                                    <?php endif; ?>

                                    <div class="related-fleet-item-info">
                                        <h3 class="fleet-gallery-showcase-title">
                                            <?php echo esc_html(get_the_title($fleet->ID)); ?>
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
                                        <div class="fleet-results-cards-book">
                                          <a href="<?php echo esc_url(get_permalink($fleet->ID)); ?>" class="btn_small">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <div class="category-dots">
                <?php if (!empty($categories_list)) : ?>
                    <div class="category-buttons">
                        <?php foreach ($categories_list as $index => $category_name) : ?>
                            <button class="category-button h3_monts_med <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>">
                                <?php echo esc_html($category_name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const outerSlider = new Swiper('.outer-slider', {
        mousewheel: false,
        allowTouchMove: false,
        navigation: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });

    document.querySelectorAll('.fleet-gallery-showcase').forEach(slider => {
        new Swiper(slider, {
            mousewheel: false,
            allowTouchMove: false,
            navigation: false,
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true
            }
        });
    });
});
</script>

<?php endif; ?>
