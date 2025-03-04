<?php
$info = get_field('info');

if ($info): ?>
    <div class="default-info-block">
      <div class="container">
        <?php echo wp_kses_post($info); ?>
      </div>

    </div>
<?php endif; ?>
