$(document).ready(function(){
// Caching the movieName textbox:
var username = $('#ContactPrijmeni');

// Defining a placeholder text:
username.defaultText('');

// Using jQuery UI's autocomplete widget:
username.autocomplete({
	minLength	: 1,
	source		: 'admin/autocomplete',
	close: function (event, ui) {  
	   $('#UserSelected').val(username.val());	
       this.form.submit(); 
   }
});

});

$(document).keydown(function(evt) {
	//evt = evt || window.event;
	switch (evt.keyCode) {
		case 37:
			var selectedId = $('#UserId option:selected');
			var nextval = selectedId.prev().val();
			$('#UserSelected').val(nextval);
			$('#AdminIndexForm').submit();
		 	break;
		case 39:
			var selectedId = $('#UserId option:selected');
			var nextval = selectedId.next().val();
			$('#UserSelected').val(nextval);
			$('#AdminIndexForm').submit();
			break; 
	}
});


/*$(document).ready(function(){
// Caching the movieName textbox:
var username = $('#PropertyUsername');

// Defining a placeholder text:
username.defaultText('');

// Using jQuery UI's autocomplete widget:
username.autocomplete({
	minLength	: 1,
	source		: 'autocomplete'
});

});*/

// A custom jQuery method for placeholder text:

$.fn.defaultText = function(value){

var element = this.eq(0);
element.data('defaultText',value);

element.focus(function(){
if(element.val() == value){
element.val('').removeClass('defaultText');
}
}).blur(function(){
if(element.val() == '' || element.val() == value){
element.addClass('defaultText').val(value);
}
});

return element.blur();
}
