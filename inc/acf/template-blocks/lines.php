<?php
$line_video = get_field('lines');

if ($line_video) :
    $video_url = $line_video['url'];
?>
    <div class="lines-block">
        <video autoplay muted loop playsinline class="lines-video">
            <source src="<?php echo esc_url($video_url); ?>" type="video/webm">
        </video>
    </div>
<?php endif; ?>
