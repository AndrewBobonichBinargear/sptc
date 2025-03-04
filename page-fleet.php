<?php
/**
 * Template Name: Main page fleet
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
  <div class="page-fleet">
    <div class="container">
        <div class="page-fleet-search-input">
            <input type="text" id="search-input" placeholder="Search" onkeyup="filterFleet()" class="fleet-search">
        </div>

        <div class="filter-fleet">
            <h2 class="h3_monts_med">Filter:</h2>
            <div class="filter-fleet-container">
                <div class="custom-select-wrapper">
                  <select id="filter-car-type">
                    <option value="">Car Type</option>
                      <?php
                      $car_types = [];
                      $fleet_query = new WP_Query(['post_type' => 'our_fleet', 'posts_per_page' => -1]);
                      if ($fleet_query->have_posts()) :
                          while ($fleet_query->have_posts()) : $fleet_query->the_post();
                              $car_type = get_field('characteristics_fleet')['car_type'] ?? '';
                              if ($car_type && !in_array($car_type, $car_types)) {
                                  $car_types[] = $car_type;
                                  echo '<option value="' . esc_attr($car_type) . '">' . esc_html($car_type) . '</option>';
                              }
                          endwhile;
                          wp_reset_postdata();
                      endif;
                      ?>
                  </select>
                </div>
                <div class="custom-select-wrapper">
                  <select id="filter-services">
                    <option value="">Event</option>
                      <?php
                      $services = [];
                      $fleet_query = new WP_Query(['post_type' => 'our_fleet', 'posts_per_page' => -1]);
                      if ($fleet_query->have_posts()) :
                          while ($fleet_query->have_posts()) : $fleet_query->the_post();
                              $tags = get_the_terms(get_the_ID(), 'fleet_tag');
                              if ($tags && !is_wp_error($tags)) {
                                  foreach ($tags as $tag) {
                                      if (!in_array($tag->name, $services)) {
                                          $services[] = $tag->name;
                                          echo '<option value="' . esc_attr($tag->name) . '">' . esc_html($tag->name) . '</option>';
                                      }
                                  }
                              }
                          endwhile;
                          wp_reset_postdata();
                      endif;
                      ?>
                  </select>
                </div>
                <div class="custom-select-wrapper">
                <select id="filter-passengers">
                    <option value="">Seats</option>
                    <?php
                    $passengers = [];
                    $fleet_query = new WP_Query(['post_type' => 'our_fleet', 'posts_per_page' => -1]);
                    if ($fleet_query->have_posts()) :
                        while ($fleet_query->have_posts()) : $fleet_query->the_post();
                            $seats = get_field('characteristics_fleet')['passengers'] ?? '';
                            if ($seats && !in_array($seats, $passengers)) {
                                $passengers[] = $seats;
                                echo '<option value="' . esc_attr($seats) . '">' . esc_html($seats) . '</option>';
                            }
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </select>
              </div>
              <div class="filter-fleet-container-layout">
                <div class="filter-fleet-container-layout-cards">
                  <img src="/wp-content/uploads/2025/02/List-1.svg" alt="grid">
                </div>
                <div class="filter-fleet-container-layout-bloks">
                  <img src="/wp-content/uploads/2025/02/Cards.svg" alt="grid">
                </div>
              </div>
            </div>
        </div>

        <div id="fleet-results" class="fleet-results-cards">
            <?php
            $fleet_query = new WP_Query([
                'post_type'      => 'our_fleet',
                'posts_per_page' => -1
            ]);

            if ($fleet_query->have_posts()) :
                $counter = 0;
                while ($fleet_query->have_posts()) : $fleet_query->the_post();
                    $gallery = get_field('preview_slider');
                    $characteristics = get_field('characteristics_fleet');
                    $car_type = $characteristics['car_type'] ?? '';
                    $seats = $characteristics['passengers'] ?? '';
                    $baggage = $characteristics['baggage'] ?? '';
                    $excerpt = get_the_excerpt();

                    $tags = get_the_terms(get_the_ID(), 'fleet_tag');
                    $services = [];
                    if (!empty($tags)) {
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
                            <div class="fleet-item-spec-item fleet-item-spec-item-passengers">
                                <span><?php echo esc_html($seats); ?></span>
                            </div>

                            <div class="fleet-item-spec-item fleet-item-spec-item-luggage">
                                <span><?php echo esc_html($baggage); ?></span>
                            </div>
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
        </div>


    </div>
  </div>

  <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    const filters = document.querySelectorAll(".filter-fleet select");
    filters.forEach(filter => {
        filter.addEventListener("change", function() {
            let carType = document.getElementById("filter-car-type").value;
            let seats = document.getElementById("filter-passengers").value;
            let service = document.getElementById("filter-services").value;

            let data = new FormData();
            data.append("action", "filter_fleet");
            data.append("car_type", carType);
            data.append("seats", seats);
            data.append("service", service);

            fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
                method: "POST",
                body: data
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById("fleet-results").innerHTML = html;
                initSwipers();
            });
        });
    });
    initSwipers();
});
</script>
<?php get_footer(); ?>
