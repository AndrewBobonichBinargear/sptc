<?php

    get_header();



$hero_section = get_field('hero_section');
$background_image = $hero_section['background_image'] ?? '';
$background_image_mobile = $hero_section['background_image_mobile'] ?? '';
$main_title = $hero_section['title'] ?? '';
$button = $hero_section['button'] ?? [];
?>

<main class="services-page">
    <?php if (!empty($background_image)) : ?>
        <section class="services_hero" style="background-image: linear-gradient(1deg, rgba(13, 13, 13, 0.80) 0.9%, rgba(13, 13, 13, 0.00) 99%), url(<?php echo esc_url($background_image); ?>);">
            <div class="container">
                <h1><?php echo esc_html($main_title); ?></h1>
                <?php if (!empty($button['url']) && !empty($button['title'])) : ?>
                    <a href="<?php echo esc_url($button['url']); ?>" class="btn_small">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
            <style>
                @media (max-width: 767px) {
                    .services_hero {
                        background-image: linear-gradient(1deg, rgba(13, 13, 13, 0.80) 0.9%, rgba(13, 13, 13, 0.00) 99%), url(<?php echo esc_url($background_image_mobile); ?>) !important;
                    }
                }
            </style>
        </section>
    <?php endif; ?>
    
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>


<?php
get_footer();
?>
