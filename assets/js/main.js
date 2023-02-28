jQuery(function($) {
    // Mobile Menu Trigger
    $('.gh-burger').click(function () {
        $('body').toggleClass('gh-head-open');
    });

    console.log('works!');

    /* search overlay */
    $( ".search-button" ).on( "click", function() {
        //toggle search overlay
        $('.search-overlay').toggleClass('search-overlay-visible');

        //on transitionend focus on search field
        $('.search-overlay').one('transitionend', function() {
            $( '.search-field' ).focus();
        });
    });

    $( ".search-overlay-close" ).on( "click", function() {
        //toggle search overlay
        $('.search-overlay').toggleClass('search-overlay-visible');
    });

    //close search overlay on esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            //check if search overlay is open
            if( $('.search-overlay').css('opacity') == 1 ){
                //hide search overlay
                $('.search-overlay').removeClass('search-overlay-visible');
            }
        }
    });
});