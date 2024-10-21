$(document).ready(function () {
    $("#addEmployeeProfileForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        let profile_image = $("#profile_image")[0].files[0];
        let employee_id = $("#employee_id").val();
        let father_name = $("#father_name").val();
        let mother_name = $("#mother_name").val();
        let date_of_birth = $("#date_of_birth").val();
        let gender = $("#gender").val();
        let age = $("#age").val();
        let alt_phone = $("#alt_phone").val();
        let nationality = $("#nationality").val();

        $(".profile_image_error").text("");
        $(".employee_id_error").text("");
        $(".father_name_error").text("");
        $(".mother_name_error").text("");
        $(".date_of_birth_error").text("");
        $(".gender_error").text("");
        $(".age_error").text("");
        $(".alt_phone_error").text("");
        $(".nationality_error").text("");

        if (!profile_image) {
            $(".profile_image_error").text("Please select profile image");
            $("#profile_image").focus();
            return false;
        }
        if (!employee_id) {
            $(".employee_id_error").text("Please enter employee ID");
            $("#employee_id").focus();
            return false;
        }
        if (!father_name) {
            $(".father_name_error").text("Please enter father's name");
            $("#father_name").focus();
            return false;
        }
        if (!mother_name) {
            $(".mother_name_error").text("Please enter mother's name");
            $("#mother_name").focus();
            return false;
        }
        if (!date_of_birth) {
            $(".date_of_birth_error").text("Please enter date of birth");
            $("#date_of_birth").focus();
            return false;
        }
        if (!gender) {
            $(".gender_error").text("Please select gender");
            $("#gender").focus();
            return false;
        }
        if (!age) {
            $(".age_error").text("Please enter age");
            $("#age").focus();
            return false;
        }
        if (!alt_phone) {
            $(".alt_phone_error").text("Please enter alternate phone number");
            $("#alt_phone").focus();
            return false;
        }
        if (!nationality) {
            $(".nationality_error").text("Please enter nationality");
            $("#nationality").focus();
            return false;
        }
		
        formData.append("profile_image", profile_image);
        formData.append("employee_id", employee_id);
        formData.append("father_name", father_name);
        formData.append("mother_name", mother_name);
        formData.append("date_of_birth", date_of_birth);
        formData.append("gender", gender);
        formData.append("age", age);
        formData.append("alt_phone", alt_phone);
        formData.append("nationality", nationality);

        $.ajax({
            type: "POST",
            url: $('meta[name="base-url"]').attr("content") + "store-employeeProfile",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                Accept: "application/json",
            },
            success: function (response) {
                $("#add_EmployeeProfile").attr("disabled", false);
                if (response.status === true) {
                    showToast(response.message, response.status, function () {
                        window.location.href =
                            $('meta[name="base-url"]').attr("content") + "employeeProfile";
                    });
                } else {
                    showToast(response.message, response.status);
                }
            },
            error: function (e) {
                $("#add_EmployeeProfile").attr("disabled", false);
                if (e.status === 409 || e.status === 404) {
                    showToast("Something went wrong", e.status);
                } else if (e.status === 500) {
                    showToast("Internal Server Error", e.status);
                } else if (e.status === 422) {
                    let errors = e.responseJSON.errors;
                    console.log(errors);
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            $(`#${key}_error`).text(errors[key]);
                        }
                    }
                } else {
                    showToast("Something went wrong", e.status);
                }
            },
        });
    });
});
