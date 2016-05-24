$(document).ready(function() {
console.log("work");
	//Email must be an email
	$('#r_email').on('input', function() {
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		if(is_email){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	// Username can't be blank
	$('#r_username').on('input', function() {
		var input=$(this);
		var is_uname=input.val();
		if(is_uname){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	// Age can't be blank, must be a number
	$('#r_age').on('input', function() {
		var input=$(this);
		var is_age=input.val();
		if(is_age){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	// fname can't be blank
	$('#r_fname').on('input', function() {
		var input=$(this);
		var is_fname=input.val();
		if(is_fname){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	// lname can't be blank
	$('#r_lname').on('input', function() {
		var input=$(this);
		var is_lname=input.val();
		if(is_lname){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	// password can't be blank
	$('#r_password').on('input', function() {
		var input=$(this);
		var is_password=input.val();
		if(is_password){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});
	
	//After submit button is clicked validation is checked and error messages appear.
	$("#r_submit").click(function(event){
		var form_data=$("#register").serializeArray();
		var error_free=true;
		for (var input in form_data){
			var element=$("#r_"+form_data[input]['name']);
			var valid=element.hasClass("valid");
			var error_element=$("span", element.parent());
			if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
			else{error_element.removeClass("error_show").addClass("error");}
		}
		if (!error_free){
				event.preventDefault();
		}
		else{
				alert('Thank you, your request was submitted.');
		}
	});

});
