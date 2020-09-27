<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  @livewireStyles
  <!-- Favicons -->
  <link href="{{ asset('blog/default/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('blog/default/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('blog/default/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('blog/default/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/default/assets/css/reset.css') }}" rel="stylesheet">
</head>

<body>
   @yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>{{ ucwords(request()->account) }}<span>.</span></h3>
            {{-- <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p> --}}
          </div>

          {{-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i aria-hidden="true" class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> --}}

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>{{ ucwords(request()->account) }}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i aria-hidden="true" class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i aria-hidden="true" class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i aria-hidden="true" class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i aria-hidden="true" class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i aria-hidden="true" class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i aria-hidden="true" class="icofont-simple-up"></i></a>

  @livewireScripts
  <!-- Vendor JS Files -->
  <script src="{{ asset('blog/default/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('blog/default/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('blog/default/assets/js/main.js') }}"></script>
  

</body>

</html>
