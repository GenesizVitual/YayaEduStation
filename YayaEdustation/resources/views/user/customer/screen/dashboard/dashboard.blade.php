@extends('user.customer.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-default">
                                <img src="{{ asset('user/asset/dist') }}/img/user2-160x160.jpg" style="width: 100%;">
                            </button>
                        </div>
                        <div class="col-md-9">
                           <div class="row">
                               <dt class="col-sm-4">Nama Pengguna</dt>
                               <dd class="col-sm-8">Hello World</dd>
                               <dt class="col-sm-4">Email</dt>
                               <dd class="col-sm-8">helloworld@gmail.com</dd>
                               <dt class="col-sm-4">Nik</dt>
                               <dd class="col-sm-8">12341234123124</dd>
                               <dt class="col-sm-4">Tempat, Tanggal Lahir</dt>
                               <dd class="col-sm-8">Kendari, 06 Maret 1992</dd>
                               <dt class="col-sm-4">Alamat</dt>
                               <dd class="col-sm-8">Jln. Ahmad yani</dd>
                               <dt class="col-sm-4">No. Telepon</dt>
                               <dd class="col-sm-8">+62 813 *** *** ***</dd>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="float-right">ubah profile</a>
                </div>
            </div>
                </div>
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Members</h3>

                            <div class="card-tools">
                                <span class="badge badge-danger">8 New Members</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user1-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Alexander Pierce</a>
                                    <span class="users-list-date">Today</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user8-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Norman</a>
                                    <span class="users-list-date">Yesterday</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user7-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Jane</a>
                                    <span class="users-list-date">12 Jan</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user6-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">John</a>
                                    <span class="users-list-date">12 Jan</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user2-160x160.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Alexander</a>
                                    <span class="users-list-date">13 Jan</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user5-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Sarah</a>
                                    <span class="users-list-date">14 Jan</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user4-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Nora</a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                                <li>
                                    <img src="{{ asset('user/asset') }}/dist/img/user3-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Nadia</a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#">View All Users</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>No.ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Trial</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">OR9842</a></td>
                                            <td>Bambang</td>
                                            <td><span class="badge badge-success">aktif</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">3 Bulan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">OR1848</a></td>
                                            <td>Aco</td>
                                            <td><span class="badge badge-success">aktif</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f39c12" data-height="20">3 Bulan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">OR7429</a></td>
                                            <td>Mail</td>
                                            <td><span class="badge badge-danger">selesai</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f56954" data-height="20">1 Bulan</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <!-- Ranting -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Rating</span>
                            <span class="info-box-number">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Message -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Messages</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Murid -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-gradient-danger">
                        <span class="info-box-icon"><i class="fas fa-user-friends"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Customer</span>
                            <span class="info-box-number">40</span>
                            <div class="progress"  style="width: 100%">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Feedback -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-gradient-warning">
                        <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Feedback</span>
                            <span class="info-box-number">2</span>

                            <div class="progress"  style="width: 100%">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <span class="progress-description">
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Schedule -->
                <div class="col-md-12">
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-bars"></i></button>
                                    <div class="dropdown-menu float-right" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <div class="card-footer pt-0">
                            <p>Time Line</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            })
        });
    </script>
@stop