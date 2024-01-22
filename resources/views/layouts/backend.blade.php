<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Signature Digital - SCI SUPUT</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/style.css') }}">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/xwork.min.css')}}"> -->
    @yield('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- END Stylesheets -->
  </head>
  <body>

    <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed">
      @include('partials.side-overlay')
      @include('partials.menu')
      @include('partials.header')

      <main id="main-container">
        @yield('content')
      </main>

      @include('partials.footer')
    </div>
    @yield('modal')
    <script src="{{asset('js/dashmix.app.min.js')}}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/confirm.js') }}"></script>

    @yield('js_after')
    @include('sweetalert::alert')
    @if(session()->has('message'))
      <script type="text/javascript">
          Swal.fire({
              title: '{{ ucwords(session()->get('message.type')) }}',
              text: '{{ session()->get('message.text') }}',
              icon: '{{ session()->get('message.type') }}',
              timer: {{ session()->has('message.timer') ? session()->get('message.timer') : 2000 }}
          });
      </script>
    @endif
  </body>
</html>
