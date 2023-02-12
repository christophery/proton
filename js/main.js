jQuery(function($) {
    // Mobile Menu Trigger
    $('.gh-burger').click(function () {
        $('body').toggleClass('gh-head-open');
    });
    // FitVids - Makes video embeds responsive
    $(".gh-content").fitVids();
});