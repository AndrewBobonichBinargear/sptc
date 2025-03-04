jQuery(function ($) {
    let page = 2;
    let no_more_posts = false;

    function load_more_posts() {
        if (no_more_posts) return;

        $.ajax({
            type: 'POST',
            url: ajax_params.ajax_url,
            data: {
                action: 'load_more_posts',
                page: page,
            },
            beforeSend: function () {
                if (!no_more_posts) {
                    $('#loading-icon').show();
                }
            },
            success: function (response) {
                if (response.trim() !== '') {
                    $('.blog-object-container').append(response);
                    page++;
                    filterPosts();
                } else {
                    no_more_posts = true;
                    $('#loading-icon img').hide();
                }
                $('#loading-icon').hide();
            },
            error: function () {
                $('#loading-icon').hide();
            }
        });
    }

    $(window).scroll(function () {
        if (!no_more_posts && $(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
            load_more_posts();
        }
    });



    function filterPosts() {
        let input = $('#search-input').val().toLowerCase();
        if ($('.blog-item').length > 0) {
            $('.blog-item').each(function () {
                let title = $(this).attr('data-title');
                if (title.includes(input)) {
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
        let input = $('#search-input').val().toLowerCase();
        if ($('.fleet-item').length > 0) {
            $('.fleet-item').each(function () {
                let title = $(this).find('h3').text().toLowerCase();
                if (title.includes(input)) {
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
