jQuery(function($) {
    var search_button = $( '.search-button' );
    var search_overlay = $('.search-overlay');
    var search_overlay_visible_class = 'search-overlay-visible';

    // Mobile Menu Trigger
    $('.gh-burger').click(function () {
        $('body').toggleClass('gh-head-open');
    });

    /* search overlay */
    search_button.on( 'click', function() {
        //toggle search overlay
        search_overlay.toggleClass(search_overlay_visible_class);

        //on transitionend focus on search field
        search_overlay.one('transitionend', function() {
            $( '.search-field' ).focus();
        });
    });

    $( '.search-overlay-close' ).on( 'click', function() {
        //toggle search overlay
        search_overlay.toggleClass(search_overlay_visible_class);
    });

    //close search overlay on esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            //check if search overlay is open
            if( search_overlay.css('opacity') == 1 ){
                //hide search overlay
                search_overlay.removeClass(search_overlay_visible_class);
                search_button.trigger('focus');
            }
        }
    });
});