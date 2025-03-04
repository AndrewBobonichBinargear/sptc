<?php
$main_info = get_field('main_info');
$count = get_field('count');

if ($main_info || $count) {
    ?>
    <div class="container">
      <section class="info-with-numbers">
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
