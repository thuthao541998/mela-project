$(document).ready(function() {
    var showChar = 130;
    var moretext = "...Read More";
    var lesstext = "...Read Less";
    $('.more').each(function() {
        var content = $(this).text();
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreelipses"></span><span class="morecontent"><span>' + h + '</span><div><a href="" class="morelink">&nbsp;'+moretext+'</a></div></span>';
            $(this).html(html);
        }
    
    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(".moreelipses").toggle();
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});