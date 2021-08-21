@extends('user.customer.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
@stop

@section('page_header')
    @include('user.customer.include.header',[
   'title'=>'Dashboard',
        'breadcrumb'=> [
               'Home'=>'dashboard-customer',
        ]
   ])
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-md-4">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2"
                             src="{{ asset('user/customer/photo/'.$customer->linkToProfileCs->foto_profile) }}"
                             style="width: 70px; height: 70px;" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $customer->name }}</h3>
                    <h5 class="widget-user-desc">Customer</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Email <span class="float-right badge bg-primary">{{ $customer->email }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Alamat <span
                                    class="float-right badge bg-info">{{ $customer->linkToProfileCs->alamat }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                No.Telepon <span
                                    class="float-right badge bg-success">{{ $customer->linkToProfileCs->no_hp }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Banyak Booking Tutor <span
                                    class="float-right badge bg-danger">{{ $customer->linkToMannyBooking->count('id') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                        {{--                        <span class="badge badge-danger">8 New Members</span>--}}
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        @if(!empty($customer->linkToMannyBooking))
                            @foreach($customer->linkToMannyBooking as $item)
                            <li>
                                <img src="{{ asset('user/tutor/photo/'.$item->linkToTutor->linkToProfileUser->foto) }}" style="height: 80px" alt="User Image">
                                <a class="users-list-name" href="#">{{ $item->linkToTutor->linkToProfileUser->nama }}</a>
                                <span class="users-list-date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="javascript:">View All Users</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script
        src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            })
        });
    </script>
@stop
