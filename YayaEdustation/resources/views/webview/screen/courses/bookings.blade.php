<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Booking Tutor</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('webview') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('webview') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('webview') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('webview') }}/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('webview') }}/assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('user/asset/plugins') }}/fontawesome-free/css/all.min.css">
    <!-- =======================================================
    * Template Name: Mentor - v2.2.1
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar2/lib/main.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset/dist') }}/css/adminlte.min.css">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="{{ asset('webview') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

        {{--Todo Navigator--}}
        @include('webview.include.nav')

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Course Details</h2>
            <p></p>
        </div>
    </div><!-- End Breadcrumbs -->


    <section id="course-details" class="course-details" style="padding-bottom: 10px; padding-top: 10px;">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-8">
                    <h3>Jadwal</h3>
                </div>
                <div class="col-md-8">
                    <form action="{{ url('booking-tutor/'.$course->id.'/sending') }}" method="post"
                          onsubmit="return confirm('Pastikan jadwal yang anda kirim telah sesaui ... ?')"
                          style="width: 100%">
                        {{ csrf_field() }}
                        {{--<div id='calendar'></div>--}}
                        <div class="row">
                            @foreach($day as $key=> $item_data)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ $item_data }} </label>
                                        <input type="time" class="form-control" name="{{ $key }}">
                                        <small style="color: green;">Waktu mengajar</small>
                                    </div>
                                </div>
                                {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                {{--<label>Dusasi {{ $item_data }} </label>--}}
                                {{--<input type="time" class="form-control" name="schedule" required>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            @endforeach
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group">
                                    <label>Durasi mengajar</label>
                                    <input type="time" class="form-control" name="durasi" required>
                                    <small style="color: green;">Durasi mengajar setiap pertemuan</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info" name="code" value="{{ $course->id }}"> Kirim
                                    Jadwal Ke Tutor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <img src="{{ asset('user/tutor/photo/'.$course->linkToProfile->foto) }}"
                             style="width: 200px; height: 250px; margin: auto">
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Tutor</h5>
                        <p><a href="#">{{ $course->linkToProfile->nama }}</a></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Pelajaran</h5>
                        <p>{{ $course->linkToPembelajaran->pelajaran }}</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Harga Kursus</h5>
                        <p>RP.{{ $course->harga }} /Per Jam</p>
                    </div>


                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Mentor</h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
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
                &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>
@include('webview.screen.courses.modal')
<!-- Vendor JS Files -->
<script src="{{ asset('webview') }}/assets/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/counterup/counterup.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{ asset('webview') }}/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('webview') }}/assets/js/main.js"></script>
<script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.js"></script>
<script src="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="{{ asset('user/asset') }}/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.js"></script>
@include('webview.screen.courses.js')
</body>

</html>