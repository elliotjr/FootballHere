$().ready(function() {
	//validate signup form on keyup and submit
	$("#register").validate({
		rules: {
			fname: "required",
			lname: "required",
			username: {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			},
			skill: "required",
			age: {
				required: true,
				digits: true
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "password"
			}
		},
		messages: {
			fname: "Please enter your first name",
			lname: "Please enter your last name",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 5 characters"
			},
			password: {
				required: "Please enter a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please enter a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Passwords do not match"
			},
			skill: "A skill rating is required",
			age: {
				required: "Please enter your age",
				digits: "Age must be a number"
			}
			
		}
	});
});