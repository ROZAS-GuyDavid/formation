function setAnime(){
    var nbPost = document.getElementsByClassName('post').length;
    var duration = 1.5;
    var delay = 1;
    var i = 1;
    for(i = 1; i <= nbPost; i++){
        $('.post'+i).css({"animation-duration": duration+'s', "animation-delay": delay+'s'}).toggleClass('animated');
        duration = duration + 0.5;
        delay = delay + 0.5;
    };
};
$(window).on("load",setAnime);