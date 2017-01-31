// JavaScript Document
$(document).ready(function() {
    $('.off').click(function(e) {
        
        $('#slider').animate({right: '+=20px'}, 200);
		$("#conteudo").attr('src', $(this).attr("href"));
        e.preventDefault();
    });
    $('.on').click(function(e) {
        $('#slider').animate({right: '-=20px'}, 200);
		$("#conteudo").attr('src', $(this).attr("href"));
        e.preventDefault();
    });
})

    