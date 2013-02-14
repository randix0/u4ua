Ideas = {
    tPrev: null,
    tNext: null,
    prev: function(){
        //alert('prev');
        Ideas.unbinder();
        $('.p-idea.prev').remove();
        $('.p-idea.active').removeClass('active').addClass('next');
        $('.p-idea.prev').removeClass('prev').addClass('active');

        Ideas.tPrev = '<div class="p-idea prev">Вот сюда мы пихаем html блока</div>';
        $('.p-ideas').prepend(Ideas.tPrev);
        Ideas.tPrev = null;

        Ideas.binder();
    },
    next: function(){
        //alert('next');
        Ideas.unbinder();
        //$('.p-idea.prev').hide();
        $('.p-idea.prev').remove();
        $('.p-idea.active').removeClass('active').addClass('prev');
        $('.p-idea.next').removeClass('next').addClass('active');

        Ideas.tNext = '<div class="p-idea next">Вот сюда мы пихаем html блока</div>';
        $('.p-ideas').append(Ideas.tNext);
        Ideas.tNext = null;

        Ideas.binder();
    },
    unbinder: function(){
        $('.p-idea.prev').unbind();
        $('.p-idea.next').unbind();
    },
    binder: function(){
        $('.p-idea.prev').bind('click',function(){Ideas.prev();});
        $('.p-idea.next').bind('click',function(){Ideas.next();});
    }
};
$(document).ready(function(){
    Ideas.binder();
});
