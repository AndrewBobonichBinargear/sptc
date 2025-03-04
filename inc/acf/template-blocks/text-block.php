
<?php
$text = get_field('text');

if ($text) {
    ?>
    <div class="container">
      <section class="text-block">
          <div class="container">
            <p class="h4_monts_med">
              <?php echo wp_kses_post($text); ?>
            </p>
          </div>
      </section>
    </div>

    <?php
}
?>
