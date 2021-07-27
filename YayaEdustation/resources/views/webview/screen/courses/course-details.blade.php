<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Course Details - Mentor Bootstrap Template</title>
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
            <h2>Detail Kursus</h2>
            <p>Halaman ini akan menampilkan profil berkaitan dengan tutor yang anda pilih.</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details" style="padding-bottom: 10px;">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    @if(!empty(Session::get('message_info_booking')))
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Informasi</h5>
                            {{ Session::get('message_info_booking') }}
                        </div>
                    @endif

                        @if(!empty(Session::get('message_error_booking')))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan</h5>
                                {{ Session::get('message_error_booking') }}
                            </div>
                        @endif
                </div>
                <div class="col-lg-8">
                    <img src="{{ asset('webview') }}/assets/img/course-details.jpg" class="img-fluid" alt="">
                    <h3>Tentang Tutor</h3>
                    <p>
                        {{ $course->linkToProfile->tentang_tutor }}
                    </p>
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

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <a href="#"
                           onclick="chat_box('{{ $course->id_users }}', '{{ $course->id }}')"
                           class="btn btn-lg btn-flat btn-info" style="color: white; width: 100%;"><i
                                    class="fa fas fa-envelope"></i> Kirim Pesan</a>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <a href="{{ url('booking-tutor/'.$course->id) }}" class="btn btn-lg btn-flat btn-success"
                           style="color: white; width: 100%;"><i
                                    class="fa fas fa-bookmark"></i> Booking</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cource Details Section -->


    <section id="course-details" class="course-details" style="padding-bottom: 10px; padding-top: 10px;">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-8">
                    <h3>Jadwal</h3>
                </div>
                <div class="col-md-8">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </section>

    <section id="cource-details-tabs" class="cource-details-tabs">
        <div class="container" data-aos="fade-up">
            <div class="course-details" style="padding-top: 0px;">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Resume</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active show " data-toggle="tab"
                               href="#tab-resume-1">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " data-toggle="tab"
                               href="#tab-resume-2">Pengalaman Pengajar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab"
                               href="#tab-resume-3">Sertifikat</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show " id="tab-resume-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <p class="font-italic">{{ $course->linkToProfile->pt }},
                                        Jurusan {{ $course->linkToProfile->jurusan }}</p>
                                    <p class="font-italic">Lulus tahun
                                        :{{ $course->linkToProfile->durasi_pendidikan }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-resume-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    @if(!empty($course->linkToUsers->linkToPengalaman))
                                        @foreach($course->linkToUsers->linkToPengalaman as $pengalaman)
                                            <p class="font-italic">{{ $pengalaman->nama_lembaga }} </p>
                                            <p class="font-italic">{{ $pengalaman->thn_mulai }}
                                                - {{ $pengalaman->thn_berkahir }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-resume-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    @if(!empty($course->linkToUsers->linkToSertifikat))
                                        <ul>
                                            @foreach($course->linkToUsers->linkToSertifikat as $sertifikasi)
                                                <li>
                                                    <p class="font-italic">{{ $sertifikasi->judul_sertifikat }} </p>
                                                    <p class="font-italic">{{ $sertifikasi->tahun }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Cource Details Tabs Section -->


    <!-- ======= Cource Details Tabs Section ======= -->
    @if(!empty($course->linkToMannyMateri))
        <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">
                <div class="course-details" style="padding-top: 0px;">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Materi Kursus</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">

                            @foreach($course->linkToMannyMateri as $title_key=> $data)
                                <li class="nav-item">
                                    <a class="nav-link @if($title_key==0) active show @endif" data-toggle="tab"
                                       href="#tab-{{$title_key}}">{{ $data->judul }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-lg-8 mt-4 mt-lg-0">
                        <div class="tab-content">

                            @foreach($course->linkToMannyMateri as $title_key=> $data)
                                <div class="tab-pane @if($title_key==0) active show @endif" id="tab-{{$title_key}}">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            {{--<h3>Architecto ut aperiam autem id</h3>--}}
                                            <p class="font-italic">{{ $data->detail }}</p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Tabs Section -->
    @endif

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