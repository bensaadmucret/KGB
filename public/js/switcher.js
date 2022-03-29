jQuery(document).ready(function($) {
    $(".switcher-item").on('click', function(e) {
        $("#pattern-switcher").fadeIn('fast');
        $("#switcher .border div").css('opacity', '0.7');
        $("#switcher .border div").removeClass('active-switcher');
        $(".button").animate({
            marginLeft: '300px'
        }, 100);
        $(this).addClass('active-switcher');
        $('html, body').animate({scrollTop: $('.switcher-item-'+$(this).data('number')+' .contents').offset().top}, 1500);
        return false
    });
    $("#switcher").on("click", ".pattern-block", function() {
        for (var i = 1; i < 21; i++) {
            $('.switcher-item-' + $('.active-switcher').data('number')).removeClass('color-scheme-' + i)
        }
        for (var i = 1; i < 21; i++) {
            $('.si-' + $('.active-switcher').data('number')).removeClass('color-scheme-' + i)
        }
        $('.si-' + $('.active-switcher').data('number')).addClass('color-scheme-' + $(this).data('pattern-number'));
        $('.switcher-item-' + $('.active-switcher').data('number')).addClass('color-scheme-' + $(this).data('pattern-number'));
        return false
    });
    $("#switcher").on("click", ".active-button-switcher", function() {
        $("#pattern-switcher").fadeOut('fast');
        $(".button").animate({
            marginLeft: '0px'
        }, 200);
        $(this).removeClass('active-button-switcher');
        $(this).addClass('button-switcher');
        $("#switcher").animate({
            left: "-200px"
        }, 200);
        return false
    });
    $("#switcher").on("click", ".button-switcher", function() {
        $(this).removeClass('button-switcher');
        $(this).addClass('active-button-switcher');
        $("#switcher").animate({
            left: "0px"
        }, 500);
        return false
    })
});