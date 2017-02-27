$(function(){
    $('.menu').hover(function() {
        $(this).children('ul').slideDown();
        $(this).children().children('.submenu').hover(function(){
            $(this).parents().parents('li').addClass('active');
        })
    }, function() {
        $(this).children('ul').hide();
        $(this).removeClass('active');
    });

})
