$(document).ready(function () {
    $(".add_customer_btn").on("click", function (e) {
        e.preventDefault();
        $(".text-danger").text("");

        let name = $("#name").val();
        let customer_id = $("#customer_id").val();
        let email = $("#email").val();
        let company_name = $("#company_name").val();
        let contact = $("#contact").val();
        let website = $("#website").val();
        let start_date = $("#start_date").val();
        let end_date = $("#end_date").val();
        let total_amount = $("#total_amount").val();
        let paid_amount = $("#paid_amount").val();
        let pending_balance = $("#pending_balance").val();

        function validateEmail(email) {
            var emailReg =
                /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            return emailReg.test(email);
        }

        function validateMobileNumber(number) {
            var expr = /^(0|91)?[6-9][0-9]{9}$/;
            return expr.test(number);
        }

        if (name == "" || name == null || name == undefined) {
            $("#name_error").text("Name is required");
            $("#name").focus();
            return false;
        } else if (
            company_name == "" ||
            company_name == null ||
            company_name == undefined
        ) {
            $("#company_name_error").text("Company name is required");
            $("#company_name").focus();
            return false;
        } else if (email == "" || email == null || email == undefined) {
            $("#email_error").text("Email ID is required");
            $("#email").focus();
            return false;
        } else if (!validateEmail(email)) {
            $("#email_error").text("Email ID is invalid");
            $("#email").focus();
            return false;
        } else if (contact == "" || contact == null || contact == undefined) {
            $("#contact_error").text("Contact is required");
            $("#contact").focus();
            return false;
        } else if (!validateMobileNumber(contact)) {
            $("#contact_error").text("Contact number is invalid");
            $("#contact").focus();
            return false;
        } else if (website == "" || website == null || website == undefined) {
            $("#website_error").text("Website name is required");
            $("#website").focus();
            return false;
        } else if (
            start_date == "" ||
            start_date == null ||
            start_date == undefined
        ) {
            $("#start_date_error").text("Start date is required");
            $("#start_date").focus();
            return false;
        } else if (
            total_amount == "" ||
            total_amount == null ||
            total_amount == undefined
        ) {
            $("#total_amount_error").text("Total Amount is required");
            $("#total_amount").focus();
            return false;
        } else if (
            paid_amount == "" ||
            paid_amount == null ||
            paid_amount == undefined
        ) {
            $("#paid_amount_error").text("paid Amount is required");
            $("#paid_amount").focus();
            return false;
        } else if (
            pending_balance == "" ||
            pending_balance == null ||
            pending_balance == undefined
        ) {
            $("#pending_balance_error").text("paid Amount is required");
            $("#pending_balance").focus();
            return false;
        }
        let formData = {
            name: name,
            customer_id: customer_id,
            email: email,
            company_name: company_name,
            contact: contact,
            website: website,
            start_date: start_date,
            end_date: end_date,
            total_amount: total_amount,
            paid_amount: paid_amount,
            pending_balance: pending_balance,
        };

        var baseUrl = $('meta[name="base-url"]').attr("content");
        var customerUrl = baseUrl + "/customers";

        $.ajax({
            type: "POST",
            url: customerUrl,
            dataType: "json",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $(".add_customer_btn").attr("disabled", false);
                if (response.status === true) {
                    showToast(response.message, response.status, function () {
                        window.location.href = customerUrl;
                    });
                } else {
                    showToast(response.message, response.status);
                }
            },
            error: function (e) {
                $(".add_customer_btn").attr("disabled", false);
                if (e.status === 409 || e.status === 404) {
                    showToast("Something went wrong", e.status);
                } else if (e.status === 500) {
                    showToast("Internal Server Error", e.status);
                } else if (e.status === 422) {
                    let errors = e.responseJSON.errors;
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

    $(".edit_customer_btn").on("click", function (e) {
        e.preventDefault();
        $(".text-danger").text("");

        let name = $("#name").val();
        let customer_id = $("#customer_id").val();
        let email = $("#email").val();
        let company_name = $("#company_name").val();
        let contact = $("#contact").val();
        let website = $("#website").val();
        let start_date = $("#start_date").val();
        let end_date = $("#end_date").val();
        let total_amount = $("#total_amount").val();
        let paid_amount = $("#paid_amount").val();
        let pending_balance = $("#pending_balance").val();

        function validateEmail(email) {
            var emailReg =
                /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            return emailReg.test(email);
        }

        function validateMobileNumber(number) {
            var expr = /^(0|91)?[6-9][0-9]{9}$/;
            return expr.test(number);
        }

        if (name == "" || name == null || name == undefined) {
            $("#name_error").text("Name is required");
            $("#name").focus();
            return false;
        } else if (
            company_name == "" ||
            company_name == null ||
            company_name == undefined
        ) {
            $("#company_name_error").text("Company name is required");
            $("#company_name").focus();
            return false;
        } else if (email == "" || email == null || email == undefined) {
            $("#email_error").text("Email ID is required");
            $("#email").focus();
            return false;
        } else if (!validateEmail(email)) {
            $("#email_error").text("Email ID is invalid");
            $("#email").focus();
            return false;
        } else if (contact == "" || contact == null || contact == undefined) {
            $("#contact_error").text("Contact is required");
            $("#contact").focus();
            return false;
        } else if (!validateMobileNumber(contact)) {
            $("#contact_error").text("Contact number is invalid");
            $("#contact").focus();
            return false;
        } else if (website == "" || website == null || website == undefined) {
            $("#website_error").text("Website name is required");
            $("#website").focus();
            return false;
        } else if (
            total_amount == "" ||
            total_amount == null ||
            total_amount == undefined
        ) {
            $("#total_amount_error").text("Total Amount is required");
            $("#total_amount").focus();
            return false;
        } else if (
            paid_amount == "" ||
            paid_amount == null ||
            paid_amount == undefined
        ) {
            $("#paid_amount_error").text("paid Amount is required");
            $("#paid_amount").focus();
            return false;
        } else if (
            pending_balance == "" ||
            pending_balance == null ||
            pending_balance == undefined
        ) {
            $("#pending_balance_error").text("paid Amount is required");
            $("#pending_balance").focus();
            return false;
        }
        let formData = {
            name: name,
            customer_id: customer_id,
            email: email,
            company_name: company_name,
            contact: contact,
            website: website,
            start_date: start_date,
            end_date: end_date,
            total_amount: total_amount,
            paid_amount: paid_amount,
            pending_balance: pending_balance,
        };

        $.ajax({
            type: "POST",
            url: $('meta[name="base-url"]').attr("content") + "update-customer",
            dataType: "json",
            data: formData,
            headers: {
                Accept: "application/json",
            },
            success: function (response) {
                $(".edit_customer_btn").attr("disabled", false);
                if (response.status === true) {
                    showToast(response.message, response.status, function () {
                        window.location.href =
                            $('meta[name="base-url"]').attr("content") +
                            "customers";
                    });
                } else {
                    showToast(response.message, response.status);
                }
            },
            error: function (e) {
                $(".edit_customer_btn").attr("disabled", false);
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
            },
        });
    });

    $(document).on("click", ".delete-customer", function () {
        deleteConfirm($(this).data("route"), "Customer");
    });
});
