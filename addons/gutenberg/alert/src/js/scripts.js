(function($){

	"use strict";

	$('.pbh_alert_block .pbh-alert-dismiss').on( 'click', function() {
		$(this).parent().slideToggle( 400, function() {
			$(this).remove();
		});
		return false;
	});
	
	console.log( 'Alert Gutenberg: scripts.js' );

})( window.jQuery );