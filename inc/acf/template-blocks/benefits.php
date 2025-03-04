<?php
$title = get_field('title');
$info_blocks = get_field('info_block');

if ($info_blocks): ?>
<div class="container">
  <div class="benefits-container">
      <?php if ($title): ?>
          <h2><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <div class="benefits-wrapper">
          <?php foreach ($info_blocks as $info_block): ?>
              <div class="benefit-block">
                  <h3 class="h3_monts_med"><?php echo esc_html($info_block['title']); ?></h3>
                  <ul class="benefit-list">
                      <?php if (!empty($info_block['details_block'])): ?>
                          <?php foreach ($info_block['details_block'] as $detail): ?>
                              <li class="benefit-item">
                                  <?php if (!empty($detail['icon'])): ?>
                                      <img src="<?php echo esc_url($detail['icon']); ?>" alt="<?php echo esc_attr($detail['text']); ?>" class="benefit-icon">
                                  <?php endif; ?>
                                  <span class="benefit-text"><?php echo esc_html($detail['text']); ?></span>
                              </li>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </ul>
              </div>
          <?php endforeach; ?>
      </div>
  </div>
</div>

<?php endif; ?>
