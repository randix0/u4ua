//Ideas = {
//    tPrev: null,
//    tNext: null,
//    prev: function(){
////        alert('prev');
//        Ideas.unbinder();
//        $('.p-idea.prev').remove();
//        $('.p-idea.active').removeClass('active').addClass('next');
//        $('.p-idea.prev').removeClass('prev').addClass('active');
//
//        Ideas.tPrev = '<div class="p-idea prev">Вот сюда мы пихаем блок 2</div>';
//        $('.p-ideas').prepend(Ideas.tPrev);
//        Ideas.tPrev = null;
//
//        Ideas.binder();
//    },
//    next: function(){
////        alert('next');
//        Ideas.unbinder();
//        //$('.p-idea.prev').hide();
//        $('.p-idea.prev').remove();
//        $('.p-idea.active').removeClass('active').addClass('prev');
//        $('.p-idea.next').removeClass('next').addClass('active');
//
//        Ideas.tNext = '<div class="p-idea next">Вот сюда мы пихаем блок 1</div>';
//        $('.p-ideas').append(Ideas.tNext);
//        Ideas.tNext = null;
//
//        Ideas.binder();
//    },
//    unbinder: function(){
//        $('.p-idea.prev').unbind();
//        $('.p-idea.next').unbind();
//    },
//    binder: function(){
//        $('.p-idea.prev').bind('click',function(){Ideas.prev();});
//        $('.p-idea.next').bind('click',function(){Ideas.next();});
//    }
//};
//$(document).ready(function(){
//    Ideas.binder();
//});


U4ua = {
    partnersSlider: {
        offset: 0,
        stepWidth: 220,
        size: 0,
        clipSize: 880,
        move: function(direction){
            if (direction == 'next') {
                U4ua.partnersSlider.offset -= U4ua.partnersSlider.stepWidth;
                if (U4ua.partnersSlider.offset < U4ua.partnersSlider.clipSize-U4ua.partnersSlider.size)
                    U4ua.partnersSlider.offset = 0;
            } else {
                U4ua.partnersSlider.offset += U4ua.partnersSlider.stepWidth;
                if (U4ua.partnersSlider.offset > 0)
                    U4ua.partnersSlider.offset = U4ua.partnersSlider.clipSize-U4ua.partnersSlider.size;
            }
            $('.b-partnersBlock-wrap').animate({left:U4ua.partnersSlider.offset}, 500);
        },
        prev: function(){
            U4ua.partnersSlider.move('prev');
        },
        next: function(){
            U4ua.partnersSlider.move('next');
        },
        binder: function(){
            $('.b-partnersBlock-prev').bind('click',U4ua.partnersSlider.prev);
            $('.b-partnersBlock-next').bind('click',U4ua.partnersSlider.next);
        },
        init: function(){
            U4ua.partnersSlider.size = $('.b-partnersBlock-sizer').width();
            if (U4ua.partnersSlider.size > U4ua.partnersSlider.clipSize)
                U4ua.partnersSlider.binder();
        }
    },
    init: function(){}
};