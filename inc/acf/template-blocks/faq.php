<?php
$faq_post = get_field('faq');

if ($faq_post) :
    $faq_id = $faq_post->ID;
    $faq_title = get_the_title($faq_id);
    $faq_thumbnail = get_the_post_thumbnail($faq_id, 'full');
    $faq_info = get_field('info', $faq_id);
    ?>
    <div class="container">
      <div class="feature_accordion">
          <h2><?php echo esc_html($faq_title); ?></h2>
          <div class="feature_accordion_container">
            <?php if ($faq_thumbnail) : ?>
                <div class="faq-thumbnail">
                    <?php echo $faq_thumbnail; ?>
                </div>
            <?php endif; ?>
              <div class="accordion_item_wrapper">
                <?php if ($faq_info) : ?>
                    <?php foreach ($faq_info as $index => $item) : ?>
                        <div class="accordion_item">
                            <div class="accordion_header">
                                <span class="icon_with_title">
                                    <span class="h3_monts_sem_bold"><?php echo esc_html($item['title']); ?></span>
                                    <span class="status_indicator"><img src="/wp-content/uploads/2025/02/mdi_caret.svg" alt="icon"> </span>
                                </span>
                                <div class="accordion_body">
                                    <div class="content">
                                        <?php echo wp_kses_post($item['description']); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
              </div>
          </div>
      </div>
    </div>


<?php endif; ?>
