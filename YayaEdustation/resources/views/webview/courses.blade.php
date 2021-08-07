<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Courses - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('webview') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('webview') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
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

    <!-- =======================================================
    * Template Name: Mentor - v2.2.1
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
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

<main id="main" data-aos="fade-in">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Learning Today,<br>Leading Tomorrow</h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>

            <div class="row">
                <div class="col-md-5">
                    <form action="{{ url('course') }}" method="post" style="width: 100%">
                        <div class="input-group">
                            {{ csrf_field() }}
                            <select name="id_pembelajaran"
                                    class="form-control" required>
                                <option value="">Search by, what do you whant to learn...</option>
                                @if(!empty($pembelajaran))
                                    @foreach($pembelajaran as $item_pembelajaran)
                                        <option
                                            value="{{ $item_pembelajaran->id }}">{{$item_pembelajaran->pelajaran}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @if(!empty($course))
                    @foreach($course as $data_item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <a href="{{ url('course/'. $data_item->id.'/details') }} ">
                                    <img src="{{ asset('webview') }}/assets/img/course-1.jpg" class="img-fluid"
                                         alt="...">
                                    <div class="course-content">
                                        <h3>
                                            {{--{{ $data_item->linkToPembelajaran->pelajaran }}--}}
                                        </h3>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img
                                                    src="{{ asset('user/tutor/photo') }}/{{$data_item->linkToUsers->linkToProfileUser->foto}}"
                                                    class="img-fluid" alt="" style="width: 30px; height: 30px">
                                                <span>{{ $data_item->linkToUsers->linkToProfileUser->nama }}</span>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                <i class="bx bx-user"></i>&nbsp;50
                                                &nbsp;&nbsp;
                                                <i class="bx bx-heart"></i>&nbsp;65
                                            </div>

                                        </div>
                                        <hr>
                                        <p>{{ $data_item->tentang_materi }}</p>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>Harga</h4>
                                            <p class="price">Rp. {{ number_format($data_item->harga,0,',','.') }} /Per
                                                jam</p>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                 @endif

                <div class="col-md-12">
                    @if(count($course)<1)
                        <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in" style="margin: 0px">
                            <div class="container">
                                <h2><i></i> Maaf, Tutor yang anda cari belum tersedia</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </section><!-- End Courses Section -->

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

</body>

</html>
