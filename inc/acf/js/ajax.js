jQuery(function ($) {
    let page = 2;
    let no_more_posts = false;
    let is_loading = false;
    let scrollDelay = false;

    function load_more_posts() {
        if (no_more_posts || is_loading) return;

        is_loading = true;

        $.ajax({
            type: 'POST',
            url: ajax_params.ajax_url,
            data: {
                action: 'load_more_posts',
                page: page,
            },
            beforeSend: function () {
                $('#loading-icon').show();
            },
            success: function (response) {
                if (response.trim() !== '') {
                    $('.blog-object-container-wrapper').append(response);
                    page++;
                    filterPosts();
                } else {
                    no_more_posts = true;
                }
                $('#loading-icon').hide();
                is_loading = false;
            },
            error: function () {
                $('#loading-icon').hide();
                is_loading = false;
            }
        });
    }

    $(window).scroll(function () {
        if (scrollDelay) return;

        scrollDelay = true;
        setTimeout(() => {
            scrollDelay = false;
        }, 200);

        if (!no_more_posts &&
            $(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
            load_more_posts();
        }
    });


    function filterPosts() {
        if ($('#search-input').length === 0) return;
        let input = $('#search-input').val().toLowerCase();
        if ($('.blog-item').length > 0) {
            $('.blog-item').each(function () {
                let title = $(this).attr('data-title') || '';
                if (title && title.toLowerCase().includes(input)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    }

    $('#search-input').on('input', function () {
        filterPosts();
    });

    function filterFleet() {
        if ($('#search-input').length === 0) return;
        let input = $('#search-input').val().toLowerCase();
        if ($('.fleet-item').length > 0) {
            $('.fleet-item').each(function () {
                let title = $(this).find('h3').text().toLowerCase() || '';
                if (title && title.includes(input)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    }

    $('#search-input').on('input', function () {
        filterFleet();
    });
});

jQuery(document).ready(function($) {
    if ($(window).width() <= 768) {
        $('.view-more-btn').on('click', function() {
            var button = $(this);
            var categoryId = button.data('category-id');

            $.ajax({
                url: ajax_params.ajax_url,
                type: 'POST',
                data: {
                    action: 'top_city_load_more',
                    category_id: categoryId,
                    offset: $('#' + 'posts-' + categoryId + ' .top-cities-list').length,
                },
                beforeSend: function() {
                    button.text('Loading...');
                },
                success: function(response) {
                    if (response) {
                        $('#posts-' + categoryId).append(response);
                        button.text('View More');
                    } else {
                        button.remove();
                    }
                }
            });
        });
    }
});
