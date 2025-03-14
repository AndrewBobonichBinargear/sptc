<?php
$title = get_field('title');
$gallery = get_field('gallery');
?>
<?php if ($title && $gallery && is_array($gallery)): ?>
  <div class="our-gallery" id="#OurGallery">
      <div class="container">
          <h2><?php echo esc_html($title); ?></h2>
          <div class="gallery-slider">
              <div class="swiper-wrapper">
                  <?php foreach ($gallery as $image_url): ?>
                      <div class="swiper-slide">
                          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" />
                      </div>
                  <?php endforeach; ?>
              </div>
          </div>
      </div>
  </div>
<?php endif; ?>
