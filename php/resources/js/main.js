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
    ideas: {
        tPrev: null,
        tNext: null,
        current_id: null,
        prev: function(){
            //U4ua.ideas.unbinder();
            $('.p-idea.next').hide();
            $('.p-idea.next').remove();
            $('.p-idea.active').removeClass('active').addClass('next').attr('data-status','next');
            U4ua.ideas.current_id = $('.p-idea.prev').attr('data-id');
            $('.p-idea.prev').removeClass('prev').addClass('active');
            event.preventDefault();
            $.ajax({
                url: SITE_URI+'ajax/getIdea/'+U4ua.ideas.current_id+'/prev/'+(U4ua.idea.filter?U4ua.idea.filter:'main'),
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        if (typeof(data.html) != 'undefined' && data.html)
                            $('.p-ideas .modal-window-body').append(data.html);
                        if (supports_history_api()){
                            history.pushState({action:'ajaxItem_prev',id:U4ua.ideas.current_id}, null, SITE_URI+'idea/'+U4ua.ideas.current_id);
                            initialState = true;
                        }
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });

            //U4ua.ideas.tPrev = null;
            //U4ua.ideas.binder();
        },
        next: function(){
            //U4ua.ideas.unbinder();
            $('.p-idea.prev').hide();
            $('.p-idea.prev').remove();
            $('.p-idea.active').removeClass('active').addClass('prev').attr('data-status','prev');
            U4ua.ideas.current_id = $('.p-idea.next').attr('data-id');
            U4ua.ideas.current_raw_id = $('.p-idea.next').attr('data-raw-id');
            $('.p-idea.next').removeClass('next').addClass('active');
            event.preventDefault();
            $.ajax({
                url: SITE_URI+'ajax/getIdea/'+U4ua.ideas.current_id+'/next/'+(U4ua.idea.filter?U4ua.idea.filter:'main'),
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        if (typeof(data.html) != 'undefined' && data.html)
                            $('.p-ideas .modal-window-body').append(data.html);
                        if (supports_history_api()) {
                            history.pushState({action:'ajaxItem_next',id:U4ua.ideas.current_id}, null, SITE_URI+'idea/'+U4ua.ideas.current_id);
                            initialState = true;
                        }
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });

            //U4ua.ideas.tNext = null;
            //U4ua.ideas.binder();
        },
        move: function(el){
            var status = $(el).parent().attr('data-status');
            if (status == 'prev') U4ua.ideas.prev();
            else if (status == 'next') U4ua.ideas.next();
            //console.log(status);
        },
        unbinder: function(){
            $('.p-idea.prev').unbind();
            $('.p-idea.next').unbind();
        },
        binder: function(){
            $('.p-idea.prev').bind('click',U4ua.ideas.prev);
            $('.p-idea.next').bind('click',U4ua.ideas.next);
        }
    },
    idea: {
        filter: null,
        order_by: null,
        share: function(source, idea_id){
            var url = SITE_URL+'modal/shareIdea/'+source+'/'+idea_id;
            Window.popup(url);
        },
        ignore: function(idea_id){
            if (typeof(idea_id) == 'undefined' || !idea_id) return;
            $.ajax({
                url: SITE_URI+'ajax/ignoreIdea',
                type: 'POST',
                dataType: 'json',
                data: 'item[idea_id]='+idea_id,
                success: function(data){
                    if (data.status == 'success'){
                        $('#ideas-item_'+idea_id).remove();
                        $('.b-ideas').masonry('reload');
                    } else {
                        Window.load(SITE_URI+'modal/alertError/'+data.error,'win-alertError','');
                    }
                }
            });
        },
        vote: function(idea_id, handler_type){
            if (typeof(idea_id) == 'undefined' || !idea_id) return;
            if (typeof(handler_type) == 'undefined'){
                Window.load(SITE_URI+'modal/voteIdea/'+idea_id,'win-login','');
            } else {
                //Cookie.get('ac_stop');
                console.log('id='+idea_id+' handler_type='+handler_type);

                var voteAjax = function(){
                    $.ajax({
                        url: SITE_URI+'ajax/voteIdea',
                        type: 'POST',
                        dataType: 'json',
                        data: 'item[idea_id]='+idea_id+'&item[handler_type]='+handler_type,
                        success: function(data){
                            if (data.status == 'success'){
                                //console.log('voting for idea#'+idea_id+' via '+handler_type+' is successful');
                                if (LOGGED)
                                    Window.load(SITE_URI+'modal/alertSuccess/voteSuccess','win-alertSuccess','');
                                else
                                    window.location = window.location;
                            } else {
                                if (LOGGED)
                                    Window.load(SITE_URI+'modal/alertError/'+data.error,'win-alertError','');
                                else
                                    window.location = window.location;
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
                            Window.close('win-login');
                            voteAjax();
                            console.log('user can vote for idea#'+idea_id+' via '+handler_type);
                        } else if (data.needed == 1){
                            Auth.forceStop = 1;
                            if (handler_type == 'fb' || handler_type == 'facebook') var auth_status = Auth.facebook('merge');
                            else if (handler_type == 'vk' || handler_type == 'vkontakte') var auth_status = Auth.vkontakte('merge');
                            else if (handler_type == 'gp' || handler_type == 'google') var auth_status = Auth.google('merge');
                            else if (handler_type == 'tw' || handler_type == 'twitter') var auth_status = Auth.twitter('merge');
                            else {
                                Window.close('win-login');
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
            }
        },
        click: function(el,event){
            var idea_id;
            if (typeof(el) == 'object') {
                idea_id = parseInt($(el).attr('data-id'));
            } else if (typeof(el) == 'string' || typeof(el) == 'number'){
                idea_id = parseInt(el);
            } else return true;

            Window.load(SITE_URI+'idea/ajaxItem/'+idea_id+'/'+(U4ua.idea.filter?U4ua.idea.filter:'main'),'p-ideas','');

            if (typeof(event) != 'undefined') {
                event.preventDefault();
                if (supports_history_api()){
                    history.pushState({action:'ajaxItem',id:idea_id, back:location.pathname}, null, SITE_URI+'idea/'+idea_id);
                }
            }
            console.log(SITE_URI+'idea/ajaxItem/'+idea_id+'/'+(U4ua.idea.filter?U4ua.idea.filter:'main'));
            //return false;
        },
        binder: function(){
            $('.b-ideas-item-click').bind('click',function(e){return U4ua.idea.click(this,e);});
        }
    },
    init: function(){}
};


function supports_history_api() {
    return !!(window.history && history.pushState);
}

$('a.scrollTo').click(function(e){
    $('html,body').scrollTo(this.hash, this.hash);
    e.preventDefault();
});

function addEvent(elem, evType, fn) {
    if (elem.addEventListener) {
        elem.addEventListener(evType, fn, false);
    }
    else if (elem.attachEvent) {
        elem.attachEvent('on' + evType, fn)
    }
    else {
        elem['on' + evType] = fn
    }
}

initialState = null;
$(window).bind('popstate', function(e){
    if (!initialState) {
        initialState = true;
        return;
    }
    //console.log(e);
    window.location = location.pathname;
});




Upload = {
    action: null,
    holder : null,
    tests : {
        filereader: null,
        dnd: null,
        formdata: null,
        progress: null
    },
    support : {
        filereader: null,
        formdata: null,
        progress: null
    },
    acceptedTypes : {
        'image/png': true,
        'image/jpeg': true,
        'image/gif': true
        /*
        'application/pdf' : true,
        'application/msword' : true,
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' : true
        */
    },
    progress : null,
    fileupload : null,
    callback : null,
    previewfile: function(file) {
        if (Upload.tests.filereader === true && Upload.acceptedTypes[file.type] === true) {
            var reader = new FileReader();
            reader.onload = function (event) {
                var image = new Image();
                image.src = event.target.result;
                image.width = 250; // a fake resize
                Upload.holder.appendChild(image);
            };

            reader.readAsDataURL(file);
        }  else {
            Upload.holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
            console.log(file);
        }
    },
    readfiles: function(files) {
        var formData = Upload.tests.formdata ? new FormData() : null;
        for (var i = 0; i < files.length; i++) {
            if (Upload.tests.formdata) formData.append('userfile[]', files[i]);
            if (!Upload.callback)Upload.previewfile(files[i]);
        }

        // now post a new XHR request
        if (Upload.tests.formdata) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', Upload.action);
            xhr.onload = function() {
                Upload.progress.value = Upload.progress.innerHTML = 100;

                //console.log(data.file_name);
                if (Upload.callback) {
                    data = JSON.parse(xhr.responseText);
                    Upload.callback(data);
                }
            };

            if (Upload.tests.progress) {
                xhr.upload.onprogress = function (event) {
                    if (event.lengthComputable) {
                        var complete = (event.loaded / event.total * 100 | 0);
                        Upload.progress.value = Upload.progress.innerHTML = complete;
                    }
                }
            }

            xhr.send(formData);
        }
    },
    init: function(item_id, upload_type){
        Upload.action = '/ajax/uploadFile/' + upload_type+ '/' + item_id;
        Upload.holder = document.getElementById('holder');
        Upload.support.filereader = document.getElementById('filereader');
        Upload.support.formdata = document.getElementById('formdata');
        Upload.support.progress = document.getElementById('progress');

        Upload.tests.filereader = typeof FileReader != 'undefined';
        Upload.tests.dnd = 'draggable' in document.createElement('span');
        Upload.tests.formdata = !!window.FormData;
        Upload.tests.progress = "upload" in new XMLHttpRequest;
        Upload.progress = document.getElementById('uploadprogress');
        Upload.fileupload = document.getElementById('upload');



        "filereader formdata progress".split(' ').forEach(function (api) {
            if (Upload.tests[api] === false) {
                Upload.support[api].className = 'fail';
            } else {
                // FFS. I could have done el.hidden = true, but IE doesn't support
                // hidden, so I tried to create a polyfill that would extend the
                // Element.prototype, but then IE10 doesn't even give me access
                // to the Element object. Brilliant.
                Upload.support[api].className = 'hidden';
            }
        });

        if (Upload.tests.dnd) {
            Upload.holder.ondragover = function () { this.className = 'hover'; return false; };
            Upload.holder.ondragend = function () { this.className = ''; return false; };
            Upload.holder.ondrop = function (e) {
                this.className = '';
                e.preventDefault();
                Upload.readfiles(e.dataTransfer.files);
            }
        } else {
            Upload.fileupload.className = 'hidden';
        }
        Upload.fileupload.querySelector('#input_userfile').onchange = function () {
            Upload.readfiles(this.files);
        };
    }
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

onScrollLoader={
    scrollDetectorEnabled:true,
    scrollDetector:null,
    scrollCallback:null,
    url:'',
    elPath:'',
    init:function(url,elPath,c){
        onScrollLoader.url=url;
        onScrollLoader.elPath=elPath;
        $(elPath).parent().parent().append('<div id="scroll-detector" align="center"><img src="/resources/img/misc/ajax-loader.gif" /></div>');
        onScrollLoader.scrollDetector=$('#scroll-detector');
        if(typeof(c)!='undefined'){
            onScrollLoader.scrollCallback=c;
        }
    $(window).scroll(onScrollLoader.scroll);},
    scroll:function(){
        if(onScrollLoader.scrollDetectorEnabled&&($(window).scrollTop()+$(window).height()+300)>=onScrollLoader.scrollDetector.offset().top){
            onScrollLoader.load();
        }
    },
    load:function(){
        if(!onScrollLoader.scrollDetectorEnabled)
            return false;
        onScrollLoader.scrollDetectorEnabled=false;
        var id=$(onScrollLoader.elPath+':last').attr('data-id');
        if(id!='undefined'&&id>0){
            $.post(onScrollLoader.url+id,{},function(html){
                if(html){
                    var rid='nt'+id;
                    $(onScrollLoader.elPath).parent().append('<div id="'+rid+'" style="display:none;">'+html+'</div>');
                    onScrollLoader.scrollDetectorEnabled=true;
                    $('#'+rid).fadeIn('slow');
                    if(onScrollLoader.scrollCallback){
                        onScrollLoader.scrollCallback();
                    }
                    onScrollLoader.scroll();
                }else{
                    onScrollLoader.scrollDetectorEnabled=false;
                    onScrollLoader.scrollDetector.hide();
                }
            }
            );
        }
    }
}

Posts = {
    hideMoreBtn: true,
    showMore: function(e) {
        e = $(e).parents('.js-tcMore');

        var btn = e.find('.b-showMore');

        var h = parseInt(btn.attr('data-hidden'));

        if(h) {
            btn.prevAll('.show-more').show();
            btn.html(e.attr('data-txt-hide'));

            var h3 = e.find('h3');
            if(h3.length > 0) {
                var title = h3.find('a').html();
                h3.html(title);
            }
        } else {
            btn.prevAll('.show-more').hide();
            btn.html(e.attr('data-txt-show'));
        }

        if(Posts.hideMoreBtn) {
            btn.hide();
        } else {
            btn.attr('data-hidden', (h?0:1));
        }

        return false;
    }
}