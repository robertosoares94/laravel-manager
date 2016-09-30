var neonLogin = neonLogin || {};
(function($, window, undefined)
{
	"use strict";
	$(document).ready(function()
	{
		neonLogin.$container = $("#form_login");
		// Login Form Setup
		neonLogin.$body = $(".login-page");
		neonLogin.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonLogin.$login_progressbar = neonLogin.$body.find(".login-progressbar div");


		if(neonLogin.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;

			setTimeout(function(){
				neonLogin.$body.addClass('login-form-fall-init')

				setTimeout(function()
				{
					if( !focus_set)
					{
						neonLogin.$container.find('input:first').focus();
						focus_set = true;
					}

				}, 550);

			}, 0);
		}
		else
		{
			neonLogin.$container.find('input:first').focus();
		}
		
	});
	
})(jQuery, window);