@extends('user.customer.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css"
          xmlns="http://www.w3.org/1999/html">
@stop

@section('page_header')
    @include('user.customer.include.header',[
   'title'=>'Daftar tutor yang anda booking',
        'breadcrumb'=> [
               'Home'=>'#',
               'Booking'=>'daftar-booking-tutor',
        ]
   ])
@stop

@section('content')

    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-md-12 row">
            @if(!empty($data))
                @foreach($data as $item_booking)
                    <div class="col-md-4">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">{{ $item_booking->linkToTutor->linkToProfileUser->nama }}</h3>
                                <h5 class="widget-user-desc">
                                    Tutor {{ $item_booking->linkToKursus->linkToPembelajaran->pelajaran }}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2"
                                     src="{{ asset('user/tutor/photo/'.$item_booking->linkToTutor->linkToProfileUser->foto) }}"
                                     alt="User Avatar" style="width: 100px; height: 100px; margin: auto">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <span class="description-text">Status</span>
                                            <h5 class="description-header">
                                                @if($item_booking->status_tutor=='true')
                                                    <span class="right badge badge-success">
                                                        Telah <br> diterima
                                                    </span>
                                                @elseif($item_booking->status_tutor=='false')
                                                    <span class="right badge badge-info">
                                                        Menunggu <br> Tanggapan
                                                    </span>
                                                @elseif($item_booking->status_tutor=='denied')
                                                    <span class="right badge badge-danger">
                                                        Permintaan <br> ditolak
                                                    </span>
                                                @endif
                                            </h5>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <span class="description-text">Durasi</span>
                                            <h5 class="description-header">{{ date('H:i:s', strtotime($item_booking->durasi)) }}</h5>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <span class="description-text">Pertemuan Ke:</span>
                                            <h5 class="description-header">0</h5>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <div class="col-sm-12">
                                        <a href="{{ url('daftar-booking-tutor/'.$item_booking->id) }}" class="btn btn-default" style="text-align: center; width: 100%">lihat detail</a>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
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
