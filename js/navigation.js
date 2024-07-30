jQuery(document).ready(function($) {
    var page_resources = 1;
    var loadedPosts = [];

    var $listing = $('.all-projects-wrapper').isotope({
        itemSelector: '.post-card-item',
        layoutMode: 'fitRows'
    });

    $(".resources-more").on("click", function () {
        page_resources++;
        var request_data = {
            action: "load_resources_posts",
            page: page_resources,
            loaded_posts: loadedPosts
        };
        var wrapper = $(".all-projects-wrapper");
        var $button = $(this);
        $.ajax({
            url: lex_object.ajax_url,
            type: "GET",
            data: request_data,
            beforeSend: function(xhr) {
                wrapper.append('<div class="lex-loader"></div>');
            },
            success: function(data) {
                wrapper.append(data);
                console.log(wrapper);

                $(".lex-loader").remove();

                $(data).find('.post-card-item').each(function() {
                    loadedPosts.push($(this).data('id'));
                });

                $('.all-projects-wrapper')
                    .isotope("reloadItems")
                    .isotope({
                        itemSelector: '.post-card-item',
                        layoutMode: 'fitRows'
                    });

                $button.hide();
            },
            error: function(xhr, status, error) {
                console.log("Ajax error:", status, error);
                $(".lex-loader").remove(); 
            }
        });
    });

    $("#filters-all").on("click", "button", function() {
        var filterValue = $(this).attr('data-filter');
        $listing.isotope({ filter: filterValue });
    });
});

jQuery(document).foundation();
