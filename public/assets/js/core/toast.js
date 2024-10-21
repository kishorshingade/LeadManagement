$(document).ready(function () {
    (window.showToast = function (t, n, e) {
        $.toast({
            heading: n ? "Success" : "Error",
            text: t,
            showHideTransition: "slide",
            icon: n ? "success" : "error",
            position: "top-center",
            afterHidden: function () {
                n && "function" == typeof e && e();
            },
        });
    }),
        (window.deleteConfirm = (t, n) => {
            $.confirm({
                title: `${n}!`,
                content: `Are you sure you want to delete ${n} ?`,
                buttons: {
                    confirm: {
                        text: "Confirm",
                        btnClass: "btn-primary",
                        action: function () {
                            $.ajax({
                                url:
                                    $('meta[name="base-url"]').attr("content") +
                                    t,
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf-token"]'
                                    ).attr("content"),
                                },
                                method: "DELETE",
                                success: function (t) {
                                    showToast(t.message, t.status, function () {
                                        location.reload();
                                    });
                                },
                                error: function (t) {
                                    showToast(
                                        "Error",
                                        "Something went wrong. Please try again",
                                        !1
                                    );
                                },
                            });
                        },
                    },
                    cancel: {
                        text: "Cancel",
                        btnClass: "btn-secondary",
                        action: function () {
                            $(this).hide();
                        },
                    },
                },
            });
        });
});
