<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>

    <title>Metronic | Dashboard</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{asset('application/webfont.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{asset('application/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
    @stack('styles')
</head>
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @includeIf('application.layouts.sidebar')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @includeIf('application.layouts.header')
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    @yield('content')
                </div>
            </div>
            @includeIf('application.layouts.footer')
        </div>
    </div>
</div>
<script src="{{asset('application/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('application/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>
<script src="{{asset('application/app/custom/general/dashboard.js')}}" type="text/javascript"></script>
<script src="{{asset('application/app/bundle/app.bundle.js')}}" type="text/javascript"></script>
@stack('scripts')
</body>
</html>