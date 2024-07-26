jQuery(document).ready(function($) {
    
    var page_resources = 1;
    $(".resources-more").on("click", function () {
        page_resources++;
        var request_data = {
            action: "load_resources_posts",
            page: page_resources
        };
        var wrapper = $(".all-projects-wrapper"); 
        $.ajax({
            url: lex_object.ajax_url,
            type: "GET",
            data: request_data,
            beforeSend: function(xhr) {
                wrapper.append('<div class="lex-loader"></div>');
            },
            success: function(data) {
                wrapper.append(data);
                $(".lex-loader").remove();
                // Можливо, краще не видаляти кнопку "Показати більше" безпосередньо тут
                // $(".resources-more").remove();
            },
            error: function(xhr, status, error) {
                console.log("Ajax error:", status, error);
                $(".lex-loader").remove();
            }
        });
    });


    var $listing = $('.all-projects-wrapper').isotope({
        itemSelector: '.post-card-item', // Виправлений селектор
        layoutMode: 'fitRows'
    });

    // bind filter button click
    $("#filters-all").on("click", "button", function() {
        var filterValue = $(this).attr('data-filter');
        $listing.isotope({ filter: filterValue });
    });  

    console.log('maks'); 
});

