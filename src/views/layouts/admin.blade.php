<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('package_assets/admin')}}/assets/images/favicon.png">
    <!-- This page CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>



    <link href="{{asset('package_assets/admin/assets/dist/css/pages/icon-page.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{asset('package_assets/admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('package_assets/admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <link href="{{asset('package_assets/admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css')}}"
        rel="stylesheet">
    <link href="{{asset('package_assets/admin/assets/dist/css/pages/bootstrap-switch.css')}}" rel="stylesheet">
    <link href="{{asset('package_assets/admin/style.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('package_assets/admin')}}/assets/dist/css/style.min.css" rel="stylesheet"> --}}
    <link href="{{asset('package_assets/admin/assets/dist/css/pages/user-card.css')}}" rel="stylesheet">
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('cmsblog::layouts.partials.topbar')
        @include('cmsblog::layouts.partials.sidebar')

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            {{-- @php
            dd(TestData::show_all_basic());
            @endphp --}}
            @yield('content')

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>

        <img style="height: 100px; width: 100px;border:1px solid red;" src="{{asset('package_assets/image/1.png')}}"
            alt="">
        {{-- @php
        dd(__DIR__.'../../',asset(''), asset('package_assets/admin/assets/images/favicon.png'));
        @endphp --}}
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Eliteadmin by themedesigner.in
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('package_assets/admin')}}/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('package_assets/admin')}}/assets/node_modules/popper/popper.min.js"></script>
    <script src="{{asset('package_assets/admin')}}/assets/node_modules/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('package_assets/admin')}}/assets/dist/js/perfect-scrollbar.jquery.min.js"></script>

    <script src="{{asset('package_assets/admin')}}/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('package_assets/admin')}}/assets/node_modules/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script
        src="{{asset('package_assets/admin')}}/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js">
    </script>
    <script src="{{asset('package_assets/admin')}}/assets/dist/js/dashboard1.js"></script>
    {{-- <script src="{{asset('package_assets/admin')}}/assets/node_modules/toast-master/js/jquery.toast.js">
    </script> --}}
    <script src="{{asset('package_assets/admin')}}/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js">
    </script>
    <script src="{{asset('package_assets/admin')}}/assets/dist/js/custom.min.js"></script>
    @stack('js')
    <script type="text/javascript">
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function () {
            var bt = function () {
                $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }), $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }), $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
            };
            return {
                init: function () {
                    bt()
                }
            }
        }();
        $(document).ready(function () {
            radioswitch.init()
        });
    </script>
</body>




</html>