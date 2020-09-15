$(function () {
    $("div::-webkit-scrollbar-thumb").attr('style','display:none;');
    $('.overflow-auto-scroll').scroll(function () {
        $("div::-webkit-scrollbar-thumb").css('display','none');
        // setTimeout(function(){ alert("Hello"); }, 1500);
    });
    let time = 0;
    $('.button-menu-mobile').on('click',function () {
        // console.log($('.left-side-menu-custom').css('display'))


        if($(window).width() < 769){
            time++;
            if($('.left-side-menu-custom').css('display') == 'block' && time == 1){
                $('.left-side-menu-custom').css('display','block');
            }else if ($('.left-side-menu-custom').css('display') == 'none'){
                $('.left-side-menu-custom').css('display','block')
            }else{
                $('.left-side-menu-custom').css('display','none');
            }

        }
    });
    $(window).resize(function () {
        if($(window).width() < 769){
            time = 0;
            $('.left-side-menu-custom').css('display','none');
        }else{
            $('.left-side-menu-custom').css('display','block');
        }

    })

})
