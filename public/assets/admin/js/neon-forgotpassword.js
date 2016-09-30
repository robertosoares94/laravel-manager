var neonForgotPassword = neonForgotPassword || {};

;(function($, window, undefined)
{
	"use strict";
	$(document).ready(function()
	{
		neonForgotPassword.$container = $("#form_forgot_password");
		neonForgotPassword.$steps = neonForgotPassword.$container.find(".form-steps");
		neonForgotPassword.$steps_list = neonForgotPassword.$steps.find(".step");
		// Login Form Setup
		neonForgotPassword.$body = $(".login-page");
		neonForgotPassword.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonForgotPassword.$login_progressbar = neonForgotPassword.$body.find(".login-progressbar div");

		neonForgotPassword.$login_progressbar_indicator.html('0%');

		if(neonForgotPassword.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;

			setTimeout(function(){
				neonForgotPassword.$body.addClass('login-form-fall-init')

				setTimeout(function()
				{
					if( !focus_set)
					{
						neonForgotPassword.$container.find('input:first').focus();
						focus_set = true;
					}

				}, 550);

			}, 0);
		}
		else
		{
			neonForgotPassword.$container.find('input:first').focus();
		}

	});
	
})(jQuery, window);