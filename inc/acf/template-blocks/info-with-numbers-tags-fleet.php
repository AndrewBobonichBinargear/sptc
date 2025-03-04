<?php
$main_info = get_field('main_info');
$car_specifications = get_field('car_specifications');
$image = get_field('image');



if ($main_info || $car_specifications || $image_url) :
?>
    <div class="container">
        <section class="info-fleet">
            <div class="container">
              <?php if (!empty($image)) : ?>
                  <div class="car-image">
                      <img src="<?php echo esc_url($image); ?>" alt="Car image">
                  </div>
              <?php endif; ?>


                <?php if ($main_info) : ?>
                    <div class="main-info main-info-fleet-wrapper">
                      <div class="main-info-fleet">
                        <h2 class="h2_monts_med"><?php the_title(); ?></h2>

                        <?php if ($car_specifications) : ?>
                            <div class="car-specs">
                                <?php if (!empty($car_specifications['how_many_passengers'])) : ?>
                                    <div class="spec-item passengers">
                                        <span><?php echo esc_html($car_specifications['how_many_passengers']); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($car_specifications['how_much_luggage'])) : ?>
                                    <div class="spec-item luggage">
                                        <span><?php echo esc_html($car_specifications['how_much_luggage']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                      </div>

                      <div class="fleet-tags">
                          <?php
                          $terms = wp_get_post_terms(get_the_ID(), 'fleet_tag');
                          if (!empty($terms) && !is_wp_error($terms)) {
                              foreach ($terms as $term) {
                                  echo '<span class="tag">' . esc_html($term->name) . '</span> ';
                              }
                          }
                          ?>
                      </div>
                      <?php echo wp_kses_post($main_info); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
<?php endif; ?>
