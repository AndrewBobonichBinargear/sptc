<?php


get_header(); ?>

<main class="services-page">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <div class="services-list">
            <?php
            $args = array(
                'post_type'      => 'services',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC'
            );

            $services = new WP_Query($args);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post(); ?>
                    <article class="service-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h2 class="service-title"><?php the_title(); ?></h2>
                            <p class="service-excerpt"><?php echo get_the_excerpt(); ?></p>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No services found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
