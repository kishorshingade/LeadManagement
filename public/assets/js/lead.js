$(document).ready(function(){
	$("#add_lead_button").on("click",function(e){
		e.preventDefault();
		let customer_name = $("#customer_name").val();
		let phone = $("#phone").val();
		let date = $("#date").val();
		let status = $("#status").val();
		let requirement = $("#requirement").val();

		$(".customer_name_error").text("");
		$(".phone_error").text("");
		$(".date_error").text("");
		$(".status_error").text("");
		$(".requirement_error").text("");

		  isValid = true;

		if(!customer_name){
			$(".customer_name_error").text("Please Enter Customer Name");
			$("#customer_name").focus();
			 isValid = false;
			 return false;
		}

		if (!phone) {
			$(".phone_error").text("Please Enter Phone");
			$("#phone").focus();
			isValid = false;
			return false;
		}

		let phonePattern = /^[0-9]{10}$/;
		if (!phonePattern.test(phone)) {
			$(".phone_error").text("Please enter a valid phone number");
			$("#phone").focus();
			isValid = false;
			return false;
		}

		if(!date){
			$(".date_error").text("Please Select Date");
			$("#date").focus();
			isValid = false;
			return false;
		}
		if(!status){
			$(".status_error").text("Please Select Status");
			$("#status").focus();
			isValid = false;
			return false;
		}
		if(!requirement){
			$(".requirement_error").text("Please Enter Requirement");
			$("#requirement").focus();
			isValid = false;
			return false;
		}

		const data = {
			customer_name,
			phone,
			date,
			status,
			requirement
		}

		console.log(data)

        var baseUrl = $('meta[name="base-url"]').attr("content");
        var leadssUrl = baseUrl + "/leads";
		$.ajax({
			type: "POST",
			url: leadssUrl,
			dataType: 'json',
			data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
			success: function (response) {
				$("#add_lead_button").attr("disabled", false);
				if (response.status === true) {

					showToast(response.message, response.status, function () {
						window.location.href = $('meta[name="base-url"]').attr("content") + "/leads";
					});
				} else {

					showToast(response.message, response.status);
				}
			},
			error: function (e) {
				$("#add_lead_button").attr("disabled", false);
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
	$("#edit_lead").on("click",function(e){
		e.preventDefault();
		let lead_id = $("#id").val();
		let customer_name = $("#customer_name").val();
		let phone = $("#phone").val();
		let date = $("#date").val();
		let status = $("#status").val();
		let requirement = $("#requirement").val();
		let followUp1 = $("#followUp1").val();
		let followUp2 = $("#followUp2").val();
		let followUp3 = $("#followUp3").val();
		let followUp4 = $("#followUp4").val();
		let followUp5 = $("#followUp5").val();
		let follow_up_id = $("#follow_up_id").val();


		$(".customer_name_error").text("");
		$(".phone_error").text("");
		$(".date_error").text("");
		$(".requirement_error").text("");

		  isValid = true;

		if(!customer_name){
			$(".customer_name_error").text("Please Enter Customer Name");
			$("#customer_name").focus();
			 isValid = false;
			 return false;
		}

		if (!phone) {
			$(".phone_error").text("Please Enter Phone");
			$("#phone").focus();
			isValid = false;
			return false;
		}

		let phonePattern = /^[0-9]{10}$/;
		if (!phonePattern.test(phone)) {
			$(".phone_error").text("Please enter a valid phone number");
			$("#phone").focus();
			isValid = false;
			return false;
		}

		if(!date){
			$(".date_error").text("Please Select Date");
			$("#date").focus();
			isValid = false;
			return false;
		}

		if(!requirement){
			$(".requirement_error").text("Please Enter Requirement");
			$("#requirement").focus();
			isValid = false;
			return false;
		}
        const formData = {
            lead_id,
            customer_name,
            phone,
            date,
            status,
            requirement,
            followUp1: status === 'Follow Up' ? followUp1 : null,
            followUp2: status === 'Follow Up' ? followUp2 : null,
            followUp3: status === 'Follow Up' ? followUp3 : null,
            followUp4: status === 'Follow Up' ? followUp4 : null,
            followUp5: status === 'Follow Up' ? followUp5 : null
        };


		console.log(formData);

		var baseUrl = $('meta[name="base-url"]').attr("content");
        var leadsUrl = baseUrl + "/leads/" + lead_id;
        console.log(leadsUrl)


		$.ajax({
			url: leadsUrl,
            type: "PATCH",
            contentType: "application/json",
            data: JSON.stringify(formData),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
			success: function (response) {
				$("#edit_lead").attr("disabled", false);
				if (response.status === true) {
					showToast(response.message, response.status, function () {
						window.location.href = $('meta[name="base-url"]').attr("content") + "/leads";
					});
				} else {
					showToast(response.message, response.status);
				}
			},
			error: function (e) {
				$("#edit_lead").attr("disabled", false);
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

	$(document).on('click', '.delete-lead', function() {
        deleteConfirm($(this).data('route'),"Lead");
    })
      //delete
      $(document).on("click", ".delete-lead_button", function (e) {
        let route = $(this).closest(".delete-leads-form").data("leads-route");
        console.log(route);
        deleteConfirm(route, "Lead");
    });

});
