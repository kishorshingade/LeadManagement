$(document).ready(function () {
    // $("#login_btn").on("click", function (e) {
    //     e.preventDefault();
    //     console.log($('meta[name="base-url"]').attr("content") + "auth/login");

    //     let email = $("#email").val();
    //     let password = $("#password").val();

    //     $(".text-danger").html("");

    //     if (!email) {
    //         $("#email_error").html("Email is required");
    //         return false;
    //     }

    //     if (email && !isValidEmail(email)) {
    //         $("#email_error").html("Please enter a valid Email");
    //         return false;
    //     }

    //     if (!password || password == "") {
    //         $("#password_error").html("Password is required");
    //         return false;
    //     }

    //     let data = {
    //         email: email,
    //         password: password,
    //     };

    //     $.ajax({
    //         url: $('meta[name="base-url"]').attr("content") + "auth/login",
    //         cache: false,
    //         type: "POST",
    //         dataType: "json",
    //         data: data,
    //         success: function (res) {
    //             if (res.status) {
    //                 window.location.href =
    //                     $('meta[name="base-url"]').attr("content") +
    //                     res.redirectUrl;
    //             } else {
    //                 for (const key in res.errors) {
    //                     $("#" + key + "_error").html(res.errors[key]);
    //                 }
    //             }
    //         },
    //         error: function (e) {
    //             let errors = e.responseJSON.errors;
    //             for (let key in errors) {
    //                 if (errors.hasOwnProperty(key)) {
    //                     $(`#${key}_error`).text(errors[key]);
    //                 }
    //             }
    //         },
    //     });
    // });

    // function isValidEmail(email) {
    //     let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     return emailRegex.test(email);
    // }

    $("#login_btn").click(function (event) {
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        $("#email_error").html("");
        $("#password_error").html("");

        if (
            email == "" ||
            email == null ||
            email == "undefined" ||
            email == undefined
        ) {
            $("#email_error").html(
                '<div class=" invalid-feedback d-block">Email Id is required.</div>'
            );
            $("#email").focus();
            return false;
        }

        function validateEmail($email) {
            var emailReg =
                /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            return emailReg.test($email);
        }

        if (!validateEmail(email)) {
            $("#email_error").html(
                '<div class=" invalid-feedback d-block">Email Id is invalid.</div>'
            );
            $("#email").focus();
            return false;
        }

        if (
            password == "" ||
            password == null ||
            password == "undefined" ||
            password == undefined
        ) {
            $("#password_error").html(
                '<div class=" invalid-feedback d-block">Password is required.</div>'
            );
            $("#password").focus();
            return false;
        }

        var data = {
            email: email,
            password: password,
        };

        $("#login_btn").attr("disabled", true);

        $.ajax({
            type: "POST",
            url: $('meta[name="base-url"]').attr("content") + "/login",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                Accept: "application/json",
            },
            success: function (response) {
                $("#login_btn").attr("disabled", false);
                if (response.redirect) {
                    $(".error-message").remove();
                    window.location.href = response.redirect;
                }
            },

            error: function (e) {
                if (e.status === 409 || e.status === 404) {
                    let { message } = e.responseJSON;
                    showToast(message, false);
                    return false;
                }
                if (e.status === 500) {
                    showToast("Something went wrong. Please try again", false);
                    return false;
                }
                if (e.status === 422) {
                    let errors = e.responseJSON.errors;
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            $(`#${key}_error`).html(errors[key][0]);
                        }
                    }
                }
                $("#login_btn").attr("disabled", !1);
            },
        });
    });
});
