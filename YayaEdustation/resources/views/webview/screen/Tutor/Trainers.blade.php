<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trainers - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Favicons -->
  <link href="{{ asset('webview') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('webview') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">


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
  <link href="{{ asset('webview') }}/assets/dist/css/adminlte.min.css" rel="stylesheet">
  <link href="{{ asset('webview') }}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet">

  {{--Evo css--}}
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('webview') }}/evo-calendar/css/evo-calendar.css"/>--}}
  {{--<link rel="stylesheet" type="text/css" href="{{ asset('webview') }}/evo-calendar/css/evo-calendar.midnight-blue.css"/>--}}
  <link rel="stylesheet" href="{{ asset('webview') }}/assets/plugins/fontawesome-free/css/all.min.css">
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

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Our best tutors</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <!-- Tutor -->
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!-- Tutor -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="padding: 10px;">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>I Want to learn</label>
                      <input class="form-control" name="theme">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Price Per Hour</label>
                      <input type="range" class="custom-range" min="1" max="10" id="rangeInput">
                      <small id="rangeText"></small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tutor is From</label>
                      <select class="form-control select2">
                        <option disabled></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>I'm Available</label>
                      <select class="form-control select2">
                        <option disabled>
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
          @for($i=0; $i<=5; $i++)
           <div class="col-md-12">
             <div class="card">
               <div class="row card-body">
                 <div class="col-md-3">
                   <div class="row">
                     <div class="col-md-12">
                     <button class="btn btn-default">
                       <img src="{{ asset('webview') }}/assets/img/trainers/trainer-1.jpg" style="width: 100%;">
                     </button>
                     </div>
                     <div class="row col-md-12">
                       <div class="col-sm-12">
                         <h5 style="text-align: center;">Walter White</h5>
                         <p style="text-align: center; font-style: italic;"><i class="fa fa-user"></i>Web Programmer</p>
                       </div>
                       <div class="row col-sm-12">
                          <div class="col-sm-6" style="text-align: center;">
                            <p>Rp. 45.000 <br> Per Hour</p>
                          </div>
                         <div class="col-sm-6" style="text-align: center;">
                            <p><i class="fa fa-star"> 4.8</i> <br> 24 reviews</p>
                          </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-9">
                   <div class="card card-primary card-tabs">
                     <div class="card-header p-0 pt-1" style="background-color: #5fcf80">
                       <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                         <li class="nav-item">
                           <a class="nav-link active" id="custom-tabs-one-profile-tab{{$i}}" data-toggle="pill" href="#custom-tabs-one-profile{{$i}}" role="tab" aria-controls="custom-tabs-one-profile{{$i}}" aria-selected="false">About me</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-one-messages-tab{{$i}}" data-toggle="pill" href="#custom-tabs-one-messages{{$i}}" role="tab" aria-controls="custom-tabs-one-messages{{$i}}" aria-selected="false">Schdule</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-one-settings-tab{{$i}}" data-toggle="pill" href="#custom-tabs-one-settings{{$i}}" role="tab" aria-controls="custom-tabs-one-settings{{$i}}" aria-selected="false">Testimoni</a>
                         </li>
                       </ul>
                     </div>
                     <div class="card-body">
                       <div class="tab-content" id="custom-tabs-one-tabContent">
                         <div class="tab-pane fade show active" id="custom-tabs-one-profile{{$i}}" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab{{$i}}">
                           <div class="row ">
                              <div class="col-md-6">
                                <p style="text-align: left; height: 300px; padding: 10px;" class="scroll">
                                  Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </p>
                              </div>
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                 </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-flat btn-warning" style="margin-top: 10px; width: 100%">Chat</button>
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-flat btn-success" style="margin-top: 10px;width: 100%" >Booking</button>
                                  </div>
                                </div>
                              </div>
                           </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-one-messages{{$i}}" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab{{$i}}">
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table table-striped table-responsive">
                                <thead style="background-color: #20c997; color: white; ">
                                  <tr style="text-align: center;height: 50px;">
                                    @foreach($day as $key=>$item_day)
                                      <th style="width: 50px">{{ $item_day }}</th>
                                    @endforeach
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($time as $key=>$item_day)
                                    <tr>
                                      <td style="width: 100px;"><label> {{ $item_day[0] }}</label> <br> {{ $item_day[1] }}</td>
                                      <td style="background-color: #00e765"></td>
                                      <td></td>
                                      <td style="background-color: #00e765"></td>
                                      <td style="background-color: #00e765"></td>
                                      <td></td>
                                      <td style="background-color: #00e765"></td>
                                      <td ></td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                            {{--<div class="col-md-6">--}}
                            {{--</div>--}}
                          </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-one-settings{{$i}}" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab{{$i}}">
                           <div class="scroll">
                             <!--Chat-->
                             <div class="direct-chat-messages scroll">
                               <!-- Message. Default to the left -->
                               <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                   <span class="direct-chat-name float-left">Alexander Pierce</span>
                                   <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                 </div>
                                 <!-- /.direct-chat-infos -->
                                 <img class="direct-chat-img" src="{{ asset('user') }}/asset/dist/img/user1-128x128.jpg" alt="message user image">
                                 <!-- /.direct-chat-img -->
                                 <div class="direct-chat-text">
                                   Is this template really for free? That's unbelievable!
                                 </div>
                                 <!-- /.direct-chat-text -->
                               </div>
                               <!-- /.direct-chat-msg -->

                               <!-- Message. Default to the left -->
                               <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                   <span class="direct-chat-name float-left">Alexander Pierce</span>
                                   <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                 </div>
                                 <!-- /.direct-chat-infos -->
                                 <img class="direct-chat-img" src="{{ asset('user') }}/asset/dist/img/user1-128x128.jpg" alt="message user image">
                                 <!-- /.direct-chat-img -->
                                 <div class="direct-chat-text">
                                   Working with AdminLTE on a great new app! Wanna join?
                                 </div>
                                 <!-- /.direct-chat-text -->
                               </div>
                               <!-- /.direct-chat-msg -->
                               <!-- Message. Default to the left -->
                               <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                   <span class="direct-chat-name float-left">Alexander Pierce</span>
                                   <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                 </div>
                                 <!-- /.direct-chat-infos -->
                                 <img class="direct-chat-img" src="{{ asset('user') }}/asset/dist/img/user1-128x128.jpg" alt="message user image">
                                 <!-- /.direct-chat-img -->
                                 <div class="direct-chat-text">
                                   Working with AdminLTE on a great new app! Wanna join?
                                 </div>
                                 <!-- /.direct-chat-text -->
                               </div>
                               <!-- /.direct-chat-msg -->
                               <!-- Message. Default to the left -->
                               <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                   <span class="direct-chat-name float-left">Alexander Pierce</span>
                                   <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                 </div>
                                 <!-- /.direct-chat-infos -->
                                 <img class="direct-chat-img" src="{{ asset('user') }}/asset/dist/img/user1-128x128.jpg" alt="message user image">
                                 <!-- /.direct-chat-img -->
                                 <div class="direct-chat-text">
                                   Working with AdminLTE on a great new app! Wanna join?
                                 </div>
                                 <!-- /.direct-chat-text -->
                               </div>

                             </div>
                             <!--/chat/-->
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- /.card -->
                   </div>
                 </div>
               </div>
             </div>
           </div>
          @endfor
        </div>
        <!-- /Tutor -->

      </div>
    </section>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Favorite Tutors</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('webview') }}/assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('webview') }}/assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('webview') }}/assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Trainers Section -->

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
  <!-- overlayScrollbars -->
  <script src="{{ asset('webview') }}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  {{-- Add evo-calendar.js before your closing <body> tag, right after jQuery (required)--}}
  {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
  {{--<script src="{{ asset('webview') }}/evo-calendar/js/evo-calendar.js"></script>--}}
  <script src="{{ asset('webview') }}/assets/js/main.js"></script>
  <!-- Template Main JS File -->


  <script>

    $(document).ready(function () {

    })

    $(function () {

        $(".scroll").overlayScrollbars({
        });

        var rangeValues =
            {
                "1": "You've selected option 1!",
                "2": "...and now option 2!",
                "3": "...stackoverflow rocks for 3!",
                "4": "...and a custom label 4!",
                "5": "...and a custom label 5!",
                "6": "...and a custom label 6!",
                "7": "...and a custom label 7!",
                "8": "...and a custom label 8!",
                "9": "...and a custom label 9!",
                "10": "...and a custom label 10!",
            };
        $('#rangeText').text(rangeValues[$('#rangeInput').val()]);

        // setup an event handler to set the text when the range value is dragged (see event for input) or changed (see event for change)
        $('#rangeInput').on('input change', function () {
            $('#rangeText').text(rangeValues[$(this).val()]);
        });
    })
  </script>
</body>

</html>