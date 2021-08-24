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
                    url: '{{ url('load-jadwal-kursus') }}' ,
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
