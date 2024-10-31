(function($){
	$(document).ready(function(){
		wp.customize('bacgrounds_color', function(value){
			value.bind(function(to){
				$('#myBtn').css('color', to )
			});
		})
		wp.customize('bacgrounds_hover_color', function(value){
			value.bind(function(to){
				$('#myBtn:hover').css('color', to )
			});
		})
	
	});
})(jQuery)