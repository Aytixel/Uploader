$(function(){
   css_media();

    $(window).resize(function(){css_media();})

    function css_media () {
        if ($(window).width() > 1000) {
            $(".page").css("width", $(window).width()-390+"px");
            $(".page").css("top", "0px");
            $(".page").css("left", "390px");
            $(".menu").css("width", "390px");
            $(".menu .button").css("width", "360px");
            $(".page").css("height", "100%");
            $(".menu").css("height", "100%");
            $(".menu .button").css("text-align", "left");
        } else  {
            $(".page").css("top", "190px");
            $(".page").css("left", "0px");
            $(".page").css("width", "100%");
            $(".menu").css("width", "100%");
            $(".menu .button").css("width", $(window).width()-30+"px");
            $(".page").css("height", $(window).height()-190+"px");
            $(".menu").css("height", "190px");
            $(".menu .button").css("text-align", "center");
        } 
    } 
})