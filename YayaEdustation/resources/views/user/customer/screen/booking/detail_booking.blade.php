@extends('user.customer.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar2/lib/main.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.css">

@stop

@section('page_header')
    @include('user.customer.include.header',[
   'title'=>'Detail booking',
        'breadcrumb'=> [
               'Home'=>'#',
               'Detail booking'=>'daftar-booking-tutor/'.$data->id,
        ]
   ])
@stop

@section('content')

    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-md-4 row">
            <div class="col-md-12">
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" style="width: 65px; height: 70px;"
                                 src="{{ asset('user/tutor/photo/'.$data->linkToTutor->linkToProfileUser->foto) }}"
                                 alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $data->linkToTutor->linkToProfileUser->nama }}</h3>
                        <h5 class="widget-user-desc">Tutor {{ $data->linkToKursus->linkToPembelajaran->pelajaran }}</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Email <span
                                        class="float-right badge bg-primary">{{ $data->linkToTutor->email }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Alamat <span
                                        class="float-right badge bg-info">{{ $data->linkToTutor->linkToProfileUser->alamat }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    No. Telp <span
                                        class="float-right badge bg-success">{{ $data->linkToTutor->linkToProfileUser->no_telp }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Selesai Siswa Les Private<span
                                        class="float-right badge bg-danger">{{ $data->linkToTutor->linkToMannyBookings->where('status_booking','selesai')->count('id') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h4 class="card-title">Info Pembelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <span>Nama : {{ $data->linkToKursus->linkToPembelajaran->pelajaran }}</span>
                        </div>
                        <div class="form-group">
                            <span>Jenjang : {{ $data->linkToKursus->linkToPembelajaran->jenjang }}</span>
                        </div>
                        <div class="form-group">
                            <span>Kelas : {{ $data->linkToKursus->linkToPembelajaran->tingkatan }}</span>
                        </div>
                        <div class="form-group">
                            <span>Durasi : {{ $data->durasi }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($data->linkToMannyMateri))
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4 class="card-title">Materi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($data->linkToMannyMateri as $item_judul)
                                    <div class="col-md-12">
                                        <div class="card card-primary collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ $item_judul->judul }}</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="display: none;">
                                                {{ $item_judul->detail }}
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-8 row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"> Jadwal </h5>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>

    <script
        src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.js"></script>

    <script>
        render_calender = function () {
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: {
                    url: '{{ url('schedule-customer') }}/' + '{{ $data->id }}',
                    type: 'get'
                },
            });
            calendar.render();
        }

        $(function () {
            render_calender();
        });
    </script>
@stop
