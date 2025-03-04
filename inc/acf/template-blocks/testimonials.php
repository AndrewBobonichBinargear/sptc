<?php
  $testimonials = get_field('testimonials');
  if ($testimonials):
?>
<div class="testimonials">
  <div class="container">
    <div class="why-choose-us-wrapper">
      <h2>Testimonials</h2>
    </div>
    <div class="swiper testimonialsSwiper">
      <div class="swiper-wrapper testimonialsSwiper-wrapper">
        <?php
          foreach ($testimonials as $post_object):
            setup_postdata($post_object);
        ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p><?php echo esc_html(get_the_excerpt($post_object->ID)); ?></p>
              <h3><?php echo esc_html(get_the_title($post_object->ID)); ?></h3>
              <?php
                $post_date = get_the_date('U', $post_object->ID);
                $time_diff = human_time_diff($post_date, current_time('timestamp'));
              ?>

              <span class="testimonial-date"><?php echo $time_diff . ' ago'; ?></span>
            </div>
          </div>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>


<?php
  endif;
?>
