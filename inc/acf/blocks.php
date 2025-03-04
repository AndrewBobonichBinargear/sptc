<?php
add_action('acf/init', 'my_acf_init');

function my_acf_init() {
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'text_block',
            'title'             => __('Text Block'),
            'description'       => __('A custom text block.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/text-block.php',
            'category'          => 'common',
            'icon'              => 'text',
            'keywords'          => array('text', 'paragraph', 'content'),
        ));

        acf_register_block(array(
            'name'              => 'info_with_numbers',
            'title'             => __('Info with Numbers'),
            'description'       => __('A block to display information with numbers.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/info-with-numbers.php',
            'category'          => 'common',
            'icon'              => 'chart-bar',
            'keywords'          => array('info', 'numbers', 'statistics', 'data'),
        ));

        acf_register_block(array(
            'name'              => 'service_object',
            'title'             => __('Service Object'),
            'description'       => __('A block to display services as objects.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/service-object.php',
            'category'          => 'common',
            'icon'              => 'admin-generic',
            'keywords'          => array('service', 'object', 'data'),
        ));

        acf_register_block(array(
            'name'              => 'benefits',
            'title'             => __('Benefits'),
            'description'       => __('A block to display benefits.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/benefits.php',
            'category'          => 'common',
            'icon'              => 'awards',
            'keywords'          => array('benefits', 'advantages', 'features'),
        ));

        acf_register_block(array(
            'name'              => 'faq',
            'title'             => __('FAQ'),
            'description'       => __('A block to display frequently asked questions.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/faq.php',
            'category'          => 'common',
            'icon'              => 'editor-help',
            'keywords'          => array('faq', 'question', 'answer'),
        ));

        acf_register_block(array(
            'name'              => 'lines',
            'title'             => __('Lines'),
            'description'       => __('A block to display an image line.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/lines.php',
            'category'          => 'common',
            'icon'              => 'format-image',
            'keywords'          => array('lines', 'image', 'divider'),
        ));

        acf_register_block(array(
            'name'              => 'why-choose-us',
            'title'             => __('Why Choose Us'),
            'description'       => __('A block to display reasons why users should choose your service.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/why-choose-us.php',
            'category'          => 'common',
            'icon'              => 'admin-users',
            'keywords'          => array('why choose us', 'benefits', 'features'),
        ));

        acf_register_block(array(
            'name'              => 'our-gallery',
            'title'             => __('Our Gallery'),
            'description'       => __('A block to display a gallery of images.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/our-gallery.php',
            'category'          => 'common',
            'icon'              => 'format-gallery',
            'keywords'          => array('gallery', 'images', 'photo'),
        ));

        acf_register_block(array(
            'name'              => 'info-with-image',
            'title'             => __('Info with Image'),
            'description'       => __('A block to display information with an image.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/info-with-image.php',
            'category'          => 'common',
            'icon'              => 'format-image',
            'keywords'          => array('info', 'image', 'content'),
        ));

        acf_register_block(array(
            'name'              => 'info-with-booking',
            'title'             => __('Info with Booking'),
            'description'       => __('A block to display information with a booking option.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/info-with-booking.php',
            'category'          => 'common',
            'icon'              => 'calendar-alt',
            'keywords'          => array('info', 'booking', 'calendar', 'reservation'),
        ));

        acf_register_block(array(
          'name'              => 'blog_object',
          'title'             => __('Blog Object'),
          'description'       => __('A block to display blog posts as objects.'),
          'render_template'   => get_template_directory() . '/inc/acf/template-blocks/blog-object.php',
          'category'          => 'common',
          'icon'              => 'admin-post',
          'keywords'          => array('blog', 'post', 'object'),
        ));

        acf_register_block(array(
          'name'              => 'info-with-numbers-tags',
          'title'             => __('Info with numbers + Tags'),
          'description'       => __('A block to display information with an image and additional tags.'),
          'render_template'   => get_template_directory() . '/inc/acf/template-blocks/info-with-numbers-tags.php',
          'category'          => 'common',
          'icon'              => 'format-image',
          'keywords'          => array('info', 'image', 'content', 'tags'),
          'supports'          => array(
              'anchor' => true,
              'align'  => true
            ),
        ));

        acf_register_block(array(
            'name'              => 'default-info',
            'title'             => __('Default Info'),
            'description'       => __('A simple block to display basic information with an image.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/default-info.php',
            'category'          => 'common',
            'icon'              => 'info',
            'keywords'          => array('default', 'info', 'image', 'content'),
            'supports'          => array(
                'anchor' => true,
                'align'  => true
            ),
        ));

        acf_register_block(array(
            'name'              => 'info-with-numbers-tags-fleet',
            'title'             => __('Info with numbers + Tags (Fleet)'),
            'description'       => __('A block to display fleet information with an image and additional tags.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/info-with-numbers-tags-fleet.php',
            'category'          => 'common',
            'icon'              => 'format-image',
            'keywords'          => array('info', 'fleet', 'image', 'content', 'tags'),
            'supports'          => array(
                'anchor' => true,
                'align'  => true
            ),
        ));

        acf_register_block(array(
            'name'              => 'fleet_object',
            'title'             => __('Fleet Object'),
            'description'       => __('A block to display fleet objects.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/fleet-object.php',
            'category'          => 'common',
            'icon'              => 'car',
            'keywords'          => array('fleet', 'vehicle', 'transport'),
        ));

        acf_register_block(array(
            'name'              => 'fleet_showcase',
            'title'             => __('Fleet Showcase'),
            'description'       => __('A block to display fleet items and their details.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/fleet-showcase.php',
            'category'          => 'common',
            'icon'              => 'admin-multisite',
            'keywords'          => array('fleet', 'showcase', 'transport'),
        ));

        acf_register_block_type(array(
            'name'              => 'testimonials',
            'title'             => __('Testimonials', 'text-domain'),
            'description'       => __('A block to display customer testimonials.'),
            'render_template'   => get_template_directory() . '/inc/acf/template-blocks/testimonials.php',
            'category'          => 'common',
            'icon'              => 'admin-comments',
            'keywords'          => array('testimonials', 'reviews', 'feedback'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));


    }
}

$blocks_dir = get_template_directory() . '/inc/acf/template-blocks/';
foreach (glob($blocks_dir . '*.php') as $block_file) {
    require_once $block_file;
}
