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
   'title'=>'Jadwal Kursus',
        'breadcrumb'=> [
               'Home'=>'#',
               'Jadwal Kursus'=>'',
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"></h3>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-detail-event">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-detail-tab" data-toggle="pill"
                                   href="#custom-tabs-detail-home" role="tab" aria-controls="custom-tabs-one-home"
                                   aria-selected="true">Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-atur-jadwal-tab" data-toggle="pill"
                                   href="#custom-tabs-one-atur-jadwal" role="tab"
                                   aria-controls="custom-tabs-one-atur-jadwal" aria-selected="false">Atur ulang
                                    jadwal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-detail-home" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-detail-tab">

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-atur-jadwal" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-atur-jadwal-tab">
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
                            url: '{{ url('load-jadwal-kursus') }}',
                            type: 'get'
                        },
                        eventClick: function (info) {
                            $('#modal-title').text(info.event.title)
                            var day = info.event.start;
                            day = day.toString().split(" ")[0];
                            event_reload(info.event.id, day)
                            $('#modal-detail-event').modal('show')
                        },

                    });
                    calendar.render();
                }

                event_reload = function (kode, day) {
                    console.log(day);
                    $.ajax({
                        url: '{{ url('load-jadwal-kursus') }}',
                        type: 'post',
                        data: {
                            'kode': kode,
                            'day': day,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (result) {
                            $('#custom-tabs-detail-home').html('')
                            $('#custom-tabs-one-atur-jadwal').html('')
                            console.log(result);
                            $('#custom-tabs-detail-home').html(result.pDetail)
                            $('#custom-tabs-one-atur-jadwal').html(result.pAturJadwal)
                        }
                    })
                }

                $(function () {
                    render_calender();
                });
            </script>
@stop
