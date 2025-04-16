<!DOCTYPE html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--favicon-->
    <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png">
    <!-- loader-->
    <link href="/assets/css/pace.min.css" rel="stylesheet">
    <script src="/assets/js/pace.min.js"></script>
  
    <!--plugins-->
    <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/mm-vertical.css">
    <!--bootstrap css-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/assets/sass/main.css" rel="stylesheet">
    <link href="/assets/sass/dark-theme.css" rel="stylesheet">
    <link href="/assets/sass/blue-theme.css" rel="stylesheet">
    <link href="/assets/sass/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/extra-icons.css">
  
    </head>

<body onload="startTime()">

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"> </div>
        <div class="dot"></div>
    </div>
    <!-- Loader ends-->

    @yield('content')

    </div>
    </div>
    <!-- latest jquery-->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="/assets/js/scrollbar/simplebar.js"></script>
    <script src="/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="/assets/js/config.js"></script>
    <script src="/assets/js/sidebar-menu.js"></script>
    <script src="/assets/js/chart/chartist/chartist.js"></script>
    <script src="/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="/assets/js/prism/prism.min.js"></script>
    <script src="/assets/js/clipboard/clipboard.min.js"></script>
    <script src="/assets/js/custom-card/custom-card.js"></script>
    <script src="/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="/assets/js/dashboard/default.js"></script>
    <script src="/assets/js/notify/index.js"></script>
    <script src="/assets/js/typeahead/handlebars.js"></script>
    <script src="/assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="/assets/js/typeahead/typeahead.custom.js"></script>
    <script src="/assets/js/typeahead-search/handlebars.js"></script>
    <script src="/assets/js/typeahead-search/typeahead-custom.js"></script>
    <!-- Template js-->
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
</body>

</html>
