$(function(){
    setInterval(function(){
        $('.img').fadeOut(500,function(){$(this).fadeIn(500)});
    },1000);
	$(".newslist").click( function () {
        if ($(this).children('dd').css('display') == 'block') {
            $(this).children('dd').css('display', 'none');
        } else {
            $(this).children('dd').css('display', 'block');
        }
    });
});






$(".newslist").click( function () {
    if ($(this).children('dd').css('display') == 'block') {
        $(this).children('dd').css('display', 'none');
    } else {
        $(this).children('dd').css('display', 'block');
    }
});


