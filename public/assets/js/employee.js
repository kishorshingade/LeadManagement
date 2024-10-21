$(document).ready(function(){
	$("#add_Employee").on("click",function(){
		let employee_id = $("#employee_id").val();
		let first_name = $("#first_name").val();
		let last_name = $("#last_name").val();
		let email = $("#email").val();
		let phone = $("#phone").val();
		let password = $("#password").val();
		let status = $("#status").val();

		
		$(".employee_id_error").text("");
		$(".first_name_error").text("");
		$(".last_name_error").text("");
		$(".email_error").text("");
		$(".phone_error").text("");
		$(".password_error").text("");
		$(".status_error").text("");

		if(!employee_id){
            $(".employee_id_error").text("Please Enter Employee Id");
			$("#employee_id").focus();
			return false;
		}
		if(!first_name){
			$(".first_name_error").text("Please Enter First Name");
			$("#first_name").focus();
			return false;
		}
		if(!last_name){
			$(".last_name_error").text("Please Enter Last Name");
			$("#last_name").focus();
			return false;
		}
		if (!email) {
			$(".email_error").text("Email is required.");
			$("#email").focus();
			return false;
		}
		
		var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
		if (!emailPattern.test(email)) {
			$(".email_error").text("Please enter a valid email address.");
			return false;
		}
		$(".email_error").text("");

		if (!phone) {
			$(".phone_error").text("Phone number is required.");
			return false;
		}
		
		var phonePattern = /^\d{10}$/; 
		if (!phonePattern.test(phone)) {
			$(".phone_error").text("Please enter a valid 10-digit phone number.");
			$("#phone").focus();
			return false;
		}
		
		$(".phone_error").text("");
		
		if(!password){
			$(".password_error").text("Please Enter Password");
			$("#password").focus();
			return false;
		}
		if(!status){
			$(".status_error").text("Please Select Status");
			$("#status").focus();
			return false
		}
		const formData = {
			employee_id,
			first_name,
			last_name,
			email,
			phone,
			password,
			status
		}
		$.ajax({
			type: "POST",
			url: $('meta[name="base-url"]').attr("content") + "store-employee", 
			dataType: 'json',
			data: formData,
			headers: {
				Accept: "application/json",
			},
			success: function (response) {
				$("#add_Employee").attr("disabled", false);
				if (response.status === true) {
					showToast(response.message, response.status, function () {
						window.location.href = $('meta[name="base-url"]').attr("content") + "employee";
					});
				} else {
					showToast(response.message, response.status);
				}
			},
			error: function (e) {
				$("#add_Employee").attr("disabled", false);
				if (e.status === 409 || e.status === 404) {
					showToast("Something went wrong", e.status);
				} else if (e.status === 500) {
					showToast("Internal Server Error", e.status);
				} else if (e.status === 422) {
					let errors = e.responseJSON.errors;
					console.log(errors); // Log the errors for debugging
					for (let key in errors) {
						if (errors.hasOwnProperty(key)) {
							$(`#${key}_error`).text(errors[key]);
						}
					}
				} else {
					showToast("Something went wrong", e.status);
				}
			}
		});

	});

	$("#edit_Employee").on("click",function(){
		let id = $("#id").val();
		let employee_id = $("#employee_id").val();
		let first_name = $("#first_name").val();
		let last_name = $("#last_name").val();
		let email = $("#email").val();
		let phone = $("#phone").val();
		let password = $("#password").val();
		let status = $("#status").val();

		
		$(".employee_id_error").text("");
		$(".first_name_error").text("");
		$(".last_name_error").text("");
		$(".email_error").text("");
		$(".phone_error").text("");
		$(".password_error").text("");
		$(".status_error").text("");

		if(!employee_id){
            $(".employee_id_error").text("Please Enter Employee Id");
			$("#employee_id").focus();
			return false;
		}
		if(!first_name){
			$(".first_name_error").text("Please Enter First Name");
			$("#first_name").focus();
			return false;
		}
		if(!last_name){
			$(".last_name_error").text("Please Enter Last Name");
			$("#last_name").focus();
			return false;
		}
		if (!email) {
			$(".email_error").text("Email is required.");
			$("#email").focus();
			return false;
		}
		
		var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
		if (!emailPattern.test(email)) {
			$(".email_error").text("Please enter a valid email address.");
			return false;
		}
		$(".email_error").text("");

		if (!phone) {
			$(".phone_error").text("Phone number is required.");
			return false;
		}
		
		var phonePattern = /^\d{10}$/; 
		if (!phonePattern.test(phone)) {
			$(".phone_error").text("Please enter a valid 10-digit phone number.");
			$("#phone").focus();
			return false;
		}
		
		$(".phone_error").text("");
		
		if(!password){
			$(".password_error").text("Please Enter Password");
			$("#password").focus();
			return false;
		}
		if(!status){
			$(".status_error").text("Please Select Status");
			$("#status").focus();
			return false
		}
		const formData = {
			id,
			employee_id,
			first_name,
			last_name,
			email,
			phone,
			password,
			status
		}
		$.ajax({
            type: "POST",
            url: $('meta[name="base-url"]').attr("content") +"update-employee", 
            dataType: 'json',
            data: formData,
            headers: {
                Accept: "application/json",
            },
            success: function (response) {
                $("#edit_Employee").attr("disabled", false);
                if (response.status === true) {
                    showToast(response.message, response.status, function () {
                        window.location.href = $('meta[name="base-url"]').attr("content") +"employee";
                    });
                } else {
                    showToast(response.message, response.status);
                }
            },
            error: function (e) {
                $("#edit_Employee").attr("disabled", false);
                if (e.status === 409 || e.status === 404) {
                    showToast("Something went wrong", false);
                } else if (e.status === 500) {
                    showToast("Internal Server Error", false);
                } else if (e.status === 422) {
                    let errors = e.responseJSON.errors;
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            $(`#${key}_error`).text(errors[key]);
                        }
                    }
                } else {
                    showToast("Something went wrong", false);
                }
            }
        });

	});
	$(document).on('click', '.delete-employee', function() {
        deleteConfirm($(this).data('route'),"Employee");
    })
})
