<?php


$title = get_field('title');
$main_info = get_field('main_info');

if (!$main_info) {
    return;
}
?>

<section class="why-choose-us" id="WhyChooseUs">
    <div class="container">
      <div class="why-choose-us-wrapper">
        <?php if ($title): ?>
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <a href="#" class="btn_small">Book Now</a>
        <?php endif; ?>
      </div>
      <div class="features-list">
          <?php foreach ($main_info as $item): ?>
              <div class="feature-item">
                  <?php if (!empty($item['icon'])): ?>
                      <div class="feature-icon">
                          <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                      </div>
                  <?php endif; ?>

                  <div class="feature-content">
                      <?php if (!empty($item['title'])): ?>
                          <h3 class="feature-title"><?php echo esc_html($item['title']); ?></h3>
                      <?php endif; ?>

                      <?php if (!empty($item['description'])): ?>
                          <p class="feature-description"><?php echo esc_html($item['description']); ?></p>
                      <?php endif; ?>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
    </div>
</section>
