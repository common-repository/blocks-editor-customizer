(function( $ ) {
	'use strict';
	 	jQuery(document).ready(function($){
			$('#my-range-1').val($('#gutenberg-width').val());
			$('#my-range-2').val($('#gutenberg-width-sidebar').val());


			$('#my-range-1').on('input', function () {
    		$(this).trigger('change');
			});
			$('#my-range-2').on('input', function () {
				$(this).trigger('change');
			});

			$('#my-range-1').change(function(){
					$('#gutenberg-width').val($('#my-range-1').val());
			});

			$('#my-range-2').change(function(){
				$('#gutenberg-width-sidebar').val($('#my-range-2').val());
			});

			function change_value_number() {
				$('#my-range-1').val($('#gutenberg-width').val());
				$('#my-range-2').val($('#gutenberg-width-sidebar').val());
			}
			$('#gutenberg-width, #gutenberg-width-sidebar').change(function(){
				change_value_number();
			});

			$('#my-range-1, #gutenberg-width').change(function(){
				$('#input-gutenberg-width-clear').val(0);
				$('#gutenberg-width, #my-range-1').attr('min', '1').attr('max', '100');
			});
			$('#my-range-2, #gutenberg-width-sidebar').change(function(){
				$('#input-gutenberg-width-sidebar-clear').val(0);
				$('#gutenberg-width-sidebar, #my-range-2').attr('min', '280').attr('max', '1200');
			});


			$(window).keyup(function(e){
				var target = $('.checkbox-ios input:focus');
				if (e.keyCode == 9 && $(target).length){
					$(target).parent().addClass('focused');
				}
	});

	$('.checkbox-ios input').focusout(function(){
		$(this).parent().removeClass('focused');
	});

	$('#link-color').attr('placeholder','#fffff');

	function state_check(){
		let check_dark_mode = $('#gutenberg-dark-mode').attr("checked");
		if (check_dark_mode == 'checked') {
			$('.state-dark-mode').text('On');
		}
		else {
			$('.state-dark-mode').text('Off');
		}
	}
	state_check();
	$('#gutenberg-dark-mode').change(function(){
		if ($('.state-dark-mode').text() == 'On') {
			$('.state-dark-mode').text('Off');
		}
		else {
			$('.state-dark-mode').text('On');
		}
	});

	$('#button-gutenberg-width-clear').click(function(){
		$('#input-gutenberg-width-clear').val(1);
		$('#gutenberg-width, #my-range-1').removeAttr('min').removeAttr('max').val('').attr('value', '');
	});
	$('#button-gutenberg-width-sidebar-clear').click(function(){
		$('#input-gutenberg-width-sidebar-clear').val(1);
		$('#gutenberg-width-sidebar, #my-range-2').removeAttr('min').removeAttr('max').val('').attr('value', '');
	});

});

})( jQuery );
