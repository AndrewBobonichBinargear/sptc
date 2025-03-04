<?php
$main_info = get_field('main_info');
$count = get_field('count');

if ($main_info || $count) {
    ?>
    <div class="container">
      <section class="info-with-numbers">
          <h2><?php the_title(); ?></h2>
          <div class="top-cities-tags">
              <?php
              $terms = wp_get_post_terms(get_the_ID(), 'top_city_tag');
              if (!empty($terms) && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                      echo '<span class="tag">' . esc_html($term->name) . '</span> ';
                  }
              } else {
                  echo '<span class="no-tags">No tags available</span>';
              }
              ?>
          </div>
          <div class="container">
              <?php if ($main_info) : ?>
                  <div class="main-info">
                      <?php echo wp_kses_post($main_info); ?>
                  </div>
              <?php endif; ?>

              <?php if ($count) : ?>
                  <div class="count-items">
                      <?php foreach ($count as $item) : ?>
                          <div class="count-item">
                              <?php if (!empty($item['number'])) : ?>
                                  <div class="count-number"><?php echo esc_html($item['number']); ?></div>
                              <?php endif; ?>
                              <?php if (!empty($item['text'])) : ?>
                                  <div class="count-text"><?php echo esc_html($item['text']); ?></div>
                              <?php endif; ?>
                          </div>
                      <?php endforeach; ?>
                  </div>
              <?php endif; ?>
          </div>
      </section>
    </div>

    <?php
}
?>
