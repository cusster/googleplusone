jQuery(function($){
	//Sets the button size options disabled when Google Plus One is
	//unchecked.  Otherwise, remove 'disabled' attribute.
	$('#Form_EditForm_HasGooglePlusOne').live('click',function(){
		var options_array = $('#Form_EditForm_PlusOneButtonSize li input');
		if($(this).attr('checked')) {
			$.each(options_array,function(index, value){
				$(value).removeAttr('disabled');
			});
		} else {
			$.each(options_array,function(index, value){
				$(value).attr('disabled', 'disabled');
			});
		}
	});

	//returns a preview of the button
	$('#Form_EditForm_PlusOneButtonSize li').live('mouseover mouseout',
	function(event){
		if(event.type == 'mouseover') {
			var i = $(this).index('#Form_EditForm_PlusOneButtonSize li');
			var img_src = getCurrentButtonImgPath(i);
			$(this).append('<img src="'+img_src+'"/>');
			$(this).find('img').delay(400).fadeIn('fast');
		} else if(event.type == 'mouseout') {
			$(this).find('img').remove();
		}
	});
});

//gets the image path based on the passed index
function getCurrentButtonImgPath(index) {
	var img_src = 'googleplusone/images/';
	switch(index) {
		case 0:
			img_src += 'standard.jpg';
			break;
		case 1:
			img_src += 'small.jpg';
			break;
		case 2:
			img_src += 'medium.jpg';
			break;
		case 3:
			img_src += 'tall.jpg';
			break
	}
	return img_src;
}