<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="keywords" content="ZyynovvaTech, DigiSoftech, DigiUdyog, ELMS">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">
    <title>ZynovvaTech - ELMS Dashboard</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.png') }}" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <!-- Datable.css -->
    <link rel="stylesheet"
        href="{{ asset('assets/utils/datatables/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/utils/datatables/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/utils/datatables/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/utils/datatables/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" />
    <!-- Datable.css -->

    <!-- Toast css -->
    <link rel="stylesheet" href="{{ asset('assets/utils/toast/jquery.toast.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/utils/confirm/jquery-confirm.min.css') }}" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/utils/dropzone/dropzone.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @yield('addCss')
</head>

<body>

    <div class="wrapper">

        <x-dashboard-sidebar />

        <div class="main-panel">
            <x-dashboard-header />
            <div class="container">
                @yield('main-section')
            </div>
            <x-dashboard-footer />
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }} "></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }} "></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }} "></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }} "></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }} "></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }} "></script>

    <!-- Datatables JS -->
    <script src="{{ asset('assets/utils/datatables/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }} ">
    </script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }} ">
    </script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-buttons/js/buttons.html5.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-buttons/js/buttons.flash.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-buttons/js/buttons.print.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js') }} "></script>
    <script src="{{ asset('assets/utils/datatables/datatables.net-select/js/dataTables.select.min.js') }} "></script>
    <script src="{{ asset('assets/utils/toast/jquery.toast.min.js') }} "></script>
    <script src="{{ asset('assets/utils/confirm/jquery-confirm.min.js') }} "></script>
    <script src="{{ asset('assets/js/core/toast.js') }} "></script>

    <!-- Datatables JS -->
    <!-- contact JS -->
    <script src="{{ asset('assets/js/datatables/contact-list.js') }} "></script>
    <script src="{{ asset('assets/js/datatables/customers.js') }} "></script>
    <script src="{{ asset('assets/js/datatables/leads.js') }} "></script>
    <script src="{{ asset('assets/js/datatables/employee.js') }} "></script>
    <script src="{{ asset('assets/js/datatables/employeeProfile.js') }} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>


    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets/js/customer.js') }}"></script>
    <script src="{{ asset('assets/js/lead.js') }}"></script>
    <script src="{{ asset('assets/js/employee.js') }}"></script>
    <script src="{{ asset('assets/js/employeeProfile.js') }}"></script>

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>

    @yield('addJs')
</body>

</html>
