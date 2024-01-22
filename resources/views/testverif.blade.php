<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.min.css')}}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/xdream.min.css')}}">
  </head>
  <body>
    <div id="page-container">
      <main id="main-container">
        <div class="bg-image" style="background-image: url({{ asset('media/photos/wall1.jpg')}});">
          <div class="row g-0 justify-content-center bg-primary-dark-op">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
              <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full bg-body-extra-light">
                  <div class="mb-2 text-center">
                    <div>
                        <img width="30%" src="{{asset('images/core/sci-suput.png')}}" alt="">
                    </div>
                    <a class="link-fx fw-bold fs-3" href="#">
                      <span class="text-dark"></span><span class="text-primary">Verifikasi Dokumen</span>
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted"></p>
                  </div>
                  <div>
                    <table>
                        <tr>
                            <td width="50%">No. Surat</td>
                            <td>Tes</td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>Perihal tes 1</td>
                        </tr>
                        <tr>
                            <td>Tanggal TTD</td>
                            <td>dfdjfjdhfj</td>
                        </tr>
                        <tr>
                            <td>Penandatangan / Jabatan</td>
                            <td>Wiyana / KUP Sungai Putting</td>
                        </tr>
                    </table>
                  </div>
                  <hr>
                  <div class="text-center">
                    <a href="#" type="button" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Dokumen</a>
                  </div>
                </div>
                <div class="block-content bg-body">
                  <div class="d-flex justify-content-center text-center">
                      <p>PT. SUCOFINDO UP Sungai Putting </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="{{ asset('js/dashmix.app.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery.min.js')}}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/pages/op_auth_signin.min.js')}}"></script>
  </body>
</html>
