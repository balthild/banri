$(function(){   
    $(window).scroll(function () {
        if($(window).scrollTop() >= 200)
        {
        $('#totop').fadeIn("slow");
        }else
        {
        $('#totop').fadeOut("slow");
        }
    });
    $('#totop').click(function(){
        $('body,html').animate({scrollTop:0},200)
    });
    $(".content a").attr("target","_blank");
});