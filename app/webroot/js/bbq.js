$(document).ready(function() {
	
	$('#joint-search-bar input[type="text"]').focus(function() {

		if (this.value == this.defaultValue){
			this.value = '';
			$(this).addClass("focus");
		}
		if(this.value != this.defaultValue){
			this.select();
		}

	});


});