<?php
$line_image = get_field('lines');

if ($line_image) :
?>
    <div class="lines-block">
        <img src="<?php echo esc_url($line_image); ?>" alt="Lines" class="lines-image">
    </div>
<?php endif; ?>
