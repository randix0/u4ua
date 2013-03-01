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
    idea: {
        share: function(idea_id){
            $.ajax({
                //'/ajax/shareIdea/facebook/'+idea_id,
                url: '/modal/shareIdea/'+idea_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        console.log('Idea.save: success!');
                        if (data.goto)
                            window.location = data.goto;
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });
        },
        vote: function(idea_id, handler_type){
            if (typeof(idea_id) == 'undefined' || !idea_id) return;
            if (typeof(handler_type) == 'undefined'){
                Window.load('/modal/voteIdea/'+idea_id,'win-login','');
            } else {
                //Cookie.get('ac_stop');
                console.log('id='+idea_id+' handler_type='+handler_type);

                var voteAjax = function(){
                    $.ajax({
                        url: '/ajax/voteIdea',
                        type: 'POST',
                        dataType: 'json',
                        data: 'item[idea_id]='+idea_id+'&item[handler_type]='+handler_type,
                        success: function(data){
                            if (data.status == 'success'){
                                //console.log('voting for idea#'+idea_id+' via '+handler_type+' is successful');
                                if (LOGGED)
                                    Window.load('/modal/alertSuccess/voteSuccess','win-alertSuccess','');
                                else
                                    window.location = window.location;
                            } else {
                                if (data.code == 'isVoted') {
                                    //console.log('user`s already voted idea#'+idea_id+' via '+handler_type);
                                    Window.load('/modal/alertError/'+data.code,'win-alertError','');
                                } else {
                                    Window.load('/modal/alertError/'+data.code,'win-alertError','');
                                }
                            }
                        }
                    });
                };

                $.ajax({
                    url: '/ajax/isAuthNeeded/'+handler_type,
                    type: 'POST',
                    dataType: 'json',
                    data: 'item[idea_id]='+idea_id+'&item[handler_type]='+handler_type,
                    success: function(data){
                        if (data.status == 'success' && data.needed == 0){
                            Window.closeAll();
                            voteAjax();
                            console.log('user can vote for idea#'+idea_id+' via '+handler_type);
                        } else if (data.needed == 1){
                            Auth.forceStop = 1;
                            if (handler_type == 'fb' || handler_type == 'facebook') var auth_status = Auth.facebook('merge');
                            else if (handler_type == 'vk' || handler_type == 'vkontakte') var auth_status = Auth.vkontakte('merge');
                            else if (handler_type == 'gp' || handler_type == 'google') var auth_status = Auth.google('merge');
                            else if (handler_type == 'tw' || handler_type == 'twitter') var auth_status = Auth.twitter('merge');
                            else {
                                Window.closeAll();
                                console.log('error in check posibility voting for idea#'+idea_id+' via '+handler_type);
                            }

                            console.log('checking auth success');
                            if (Auth.forceStop) {
                                var auth_check = function(){
                                    if (!Auth.forceStop) {
                                        console.log('auth stopped)');
                                        voteAjax();

                                    } else {
                                        console.log('Auth.forceStop still equil 1...');
                                        setTimeout(auth_check, 1000);
                                        return false;
                                    }
                                };
                                setTimeout(auth_check, 1000);
                            }
                        }
                    }
                });

                //Auth.facebook


            }
        }
    },
    init: function(){}
};

Cookie = {
    get: function(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset);
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return (setStr);
    },
    set: function(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) + ((expires) ? "; expires=" + expires : "") + ((path) ? "; path=" + path : "") + ((domain) ? "; domain=" + domain : "") + ((secure) ? "; secure" : "");
    }
}