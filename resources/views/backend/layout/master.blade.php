<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> Getlead </title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="CRM">
    <meta name="description" content="Fast Message">
    <meta name="image" content="http://getlead.co.uk/resources/share.png">
    <meta name="robots" content="index">
    <link rel="canonical" href="http://getlead.co.uk/">
    <meta name="author" content="getlead">
    <meta property="og:site_name" content="Getlead CRM">
    <meta property="og:title" content="Getlead CRM">
    <meta property="og:url" content="http://getlead.co.uk/">
    <meta property="og:description" content=" ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://getlead.co.uk/resources/share.png">
    <!--  / fav-icon  /   -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('backend/images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('backend/images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('backend/images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('backend/images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('backend/images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('backend/images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('backend/images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('backend/images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('backend/images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ url('backend/images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('backend/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('backend/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('backend/images/favicon/favicon-16x16.png') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- / css / -->

    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/c3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/rating-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery.ccpicker1.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ url('backend/libs/richtext/editor.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('backend/libs/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/libs/fullcalendar/fullcalendar.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ url('backend/libs/jquery-confirm/jquery-confirm.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap-colorpicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/iziToast.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/libs/noty/noty.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/theme-style.css')}}">
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--    <link rel="stylesheet" type="text/css" href="resources/css/custom-style.css">-->
    <style type="text/css">
    li.active svg {
        fill: #fff !important;
    }
</style>
    @stack('header.css')
</head>
<style type="text/css">
    .error {
        color: red;
    }
    .pending_count{color: #da4c4c!important;}
    .overdue_count{color: #6bb616!important;}
    .started_count{color: #1316cc!important;}
    .progress_count{color: #da8e1e!important;}
    .progress_count{color: #da8e1e!important;}
</style>
@yield('style')
<body>
    <!-- / Header including/ -->
    @include('layouts.header')
        <!-- /   Page wrapper starts here /  -->
        <main class="main-wrapper">
            <div class="task-panel">
                <div class="row justify-content-between">
                    <div class="col-lg-6 d-flex row-wrap align-items-center">
                        <a id="sidebarMenu" class="sidebar-menu"><i class="fa fa-th" aria-hidden="true"></i></a>
                        <h5>Dashboard</h5>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="task-nav">
                            <div class="dropdown-navigation"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layout-wrapper">
                <!--   / Side menu included /  -->
                @include('layouts.sidebar')
                <div class="content-section pt-0">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <!-- Plus Button -->
        <!-- /Page wrapper end/  -->
        <footer class="page-footer">
            <div class="copy-right d-flex justify-content-center align-items-center">
                <p>Copyright © 2022 Getlead Analytics Pvt.Ltd | All rights reserved.</p>
            </div>
        </footer>
    </body>
{{-- @if(!request()->ajax()) --}}
<script type="text/javascript" src="{{ url('backend/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/popper.min.js')}}"></script>

<script type="text/javascript" src="{{ url('backend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/libs/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/superfish.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/hoverIntent.js')}}"></script>

<script type="text/javascript" src="{{ url('backend/libs/summernote/summernote-bs4.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/libs/fullcalendar/fullcalendar.min.js')}}"></script>

<script type="text/javascript" src="{{ url('backend/libs/richtext/editor.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/jquery.timepicker.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/bootstrap-colorpicker.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ url('/js/jquery.ccpicker.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/iziToast.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/libs/noty/noty.min.js') }}"></script>

<script type="text/javascript" src="{{ url('backend/js/jquery.slimscroll.js') }}"></script>

<script type="text/javascript" src="{{ url('backend/js/morris.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/chart/d3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/chart/c3.min.js')}}"></script>
<script type="text/javascript" src="{{ url('backend/js/apexcharts.min.js')}}"></script>
<script type= "text/javascript" src="{{url('js/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery-validation/dist/additional-methods.min.js')}}"></script>

<script type="text/javascript" src="https://app.getlead.co.uk/backend/js/custom-scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- @endif --}}


<script type="application/javascript">
    (function ($) {
        $(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'none';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($('#flash-notis').val()) {
                flashNotis = $.parseJSON($('#flash-notis').val());
                console.log(flashNotis);
                $.each(flashNotis, function (index, val) {
                    //iterate through array or object
                    type = val.level;
                    status = type.toUpperCase();
                    new Noty({
                        text: '<strong>' + status + '</strong>! <br> ' + val.message,
                        type: type,
                        theme: 'relax',
                        layout: 'topRight',
                        timeout: 5000
                    }).show();
                });
            }

        });
    })(jQuery);
</script>
<script type="application/javascript">
    (function ($) {
        $(document).ready(function () {

            $('.tab-wrapper.v2 .tab-btn a').click(function (e) {
                e.preventDefault();
                var _this = $(this);
                var _hasClass = 'selected';
                var _category = _this.data('category');
                var _content = $('.tab-wrapper.v2 .tab-content .item');
                var _all = $('.tab-wrapper.v2 .tab-btn a');
                if (_this.hasClass(_hasClass)) {} else {
                    _all.removeClass(_hasClass).find('em').removeClass('mdi-minus').addClass(
                        'mdi-plus');
                    _this.addClass(_hasClass).find('em').removeClass('mdi-plus').addClass(
                        'mdi-minus');
                    _content.each(function () {
                        var _value = $(this).data('value');
                        $(this).removeClass(_hasClass).stop().hide();
                        if (_value == _category) {
                            $(this).stop()
                                .fadeIn('slow', function () {
                                    $(this).addClass(_hasClass);
                                });
                        }
                    });
                }
            });

            //country code
            // $("#phoneField1").CcPicker();
            // $("#phoneField1").CcPicker("setCountryByCode", "in");

        });
    })(jQuery);
</script>

<!----- select2 ----->
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
        width: 'resolve'
    });
</script>

<!----- color picker ----->
<script>
    $(function () {
        $('.color-picker-component').colorpicker();
    });
</script>

<!----- date time picker ----->
<script type="text/javascript">
    $('.datetime').on('changeDate', function (ev) {
        $(this).datetimepicker('hide');
    });
</script>

<!----- Slim scroll ----->

<script>
    $(function () {
        $('.slimscroll').slimScroll({
            height: "auto",
            position: "right",
            size: "5px",
            color: "#9ea5ab",
            wheelStep: 5,
            touchScrollStep: 50
        });
    });
</script>


<!----- Date / Time ----->
<style type="text/css">
button.ui-datepicker-trigger{
    margin-left: -2px;
}
</style>
<script>
    $(function () {

        $('input.datepicker').next('.input-group-append').hide();
        $(".datepicker").datepicker({
            showOn: "both",
            // buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
            // buttonImageOnly: true,
            buttonText: '<i class="fa fa-calendar"></i>'
        });
        $('button.ui-datepicker-trigger').addClass('input-group-text');
    });
    $('.time').timepicker({
        'scrollDefault': 'now'
    });
</script>

@stack('footer.script')
@yield('after-scripts-end')
@yield('script')
</html>