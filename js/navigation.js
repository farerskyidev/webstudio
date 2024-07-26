jQuery(document).ready(function($) {

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

