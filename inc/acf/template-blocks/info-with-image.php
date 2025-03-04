<?php
$main_info = get_field('main_info');

if ($main_info && isset($main_info['info'], $main_info['image'], $main_info['side_image'])) :
    $side_image = $main_info['side_image'];
    $info = $main_info['info'];
    $image = $main_info['image'];
    $flex_direction = ($side_image === 'right') ? 'right' : 'left';
    ?>
    <div class="container">
      <div class="info-with-image-wrapper">
        <div class="info-with-image-<?php echo esc_attr($flex_direction); ?>">
            <div class="info-text">
              <?php echo wp_kses_post($info); ?>
            </div>
            <div class="info-image">
                <img src="<?php echo esc_url($image); ?>" alt="image">
            </div>
        </div>
      </div>
    </div>


<?php endif; ?>
