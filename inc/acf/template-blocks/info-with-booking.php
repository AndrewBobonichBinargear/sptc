<?php
$main_info = get_field('main_info');

if ($main_info) :
    $info = $main_info['info'] ?? null;
    $image = $main_info['image'] ?? null;
    $link = $main_info['link'] ?? null;
    $button_text = $main_info['button_text'] ?? '';
    ?>
    <div class="container">
        <div class="info-with-booking-wrapper">
            <div class="info-with-booking">
                <?php if ($info) : ?>
                    <div class="info-text">
                        <?php echo wp_kses_post($info); ?>
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="btn_small">
                                <?php echo esc_html($button_text ?: $link['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($image) : ?>
                    <div class="info-image">
                        <img src="<?php echo esc_url($image); ?>" alt="image">
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
<?php endif; ?>
