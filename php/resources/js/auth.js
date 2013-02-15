Auth = {
	vkontakte: function(reason) {
		if(typeof(reason) == 'undefined')
			reason = '';
		
		var url='https://oauth.vk.com/authorize?client_id='+vk_app_id+'&display=popup&scope=friends&redirect_uri='+encodeURIComponent('http://'+location.host+'/auth/step1/vkontakte/'+reason)+'&response_type=code';
		
		return Auth.popup(url, '/auth/step2/vkontakte/'+reason);
	},
	facebook: function(reason) {
		if(typeof(reason) == 'undefined')
			reason = '';
		
		var url='https://www.facebook.com/dialog/oauth?client_id='+fb_app_id+'&display=popup&scope=user_birthday,email,publish_actions&redirect_uri='+encodeURIComponent('http://'+location.host+'/auth/step1/facebook/'+reason);
		
		return Auth.popup(url, '/auth/step2/facebook/'+reason);
		
	},
	google: function(reason) {
		if(typeof(reason) == 'undefined')
			reason = '';
		
		var url='https://accounts.google.com/o/oauth2/auth?response_type=code&approval_prompt=auto&access_type=offline&client_id='+gl_app_id+'&display=popup&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&redirect_uri='+encodeURIComponent('http://'+location.host+'/auth/step1/google/'+reason);
		
		return Auth.popup(url, '/auth/step2/google/'+reason);
		
	},
	popup: function(url, step2) {
		Cookie.set('sl','0','0','/');
		
		Window.popup(url);
		Window.popupOpened = true;
		
		var popupCheck = function() {
		if (!Window.popupOpened) return false;
		  try {
			if(Window.activePopup.closed/* || !Window.activePopup.top*/) {
			  Window.popupOpened = false;
			  Auth.authCallback(step2); 
			  return true;
			}
		  } catch(e) {
			Window.popupOpened = false;
			Auth.authCallback(step2);
			return true;
		  }
		  setTimeout(popupCheck, 100);
		}
		setTimeout(popupCheck, 100);
		
		return false;
	},
	authCallback: function(url) {
		var state = Cookie.get('sl');

		if(state != null && parseInt(state) > 0) {
			$.ajax({
					url: url,
					dataType: 'json',
					beforeSend: function() {
						if(Window.params.dimmer && !Window.dimmerLoaded) {
							Window.placeDimmer();
						}
						
						Window.placeLoadingIndicator();
					},
					success: function(data) {
						Window.removeLoadingIndicator();
						if(data.status == 3)
							Window.create({'header':data.header, 'body': data.body}, 'win-social-signup-msg');
						if(data.status == 2)
							Window.create({'header':data.header, 'body': data.body}, 'signup-social');
						else if(data.status == 1) {
							window.location = window.location;
						}
					}
				});
			}
	}
}