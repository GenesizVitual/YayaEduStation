@extends('user.tutor.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar2/lib/main.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.css">
@stop

@section('page_header')
    @include('user.tutor.include.header',[
    'title'=>'Kursus',
         'breadcrumb'=> [
                'Home'=>'#',
                'Kursus'=>'kursus',
         ]
    ])
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-info" id="pembelajaran" style="width: 100%; height: 100%"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div id="container-pembelajaran">
                    {{-- Pembelajaran akan di render disini --}}
                </div>
            </div>

        </div>
        <div class="col-md-8" id="calendar-container">
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-pembelajaran">
            <div class="modal-dialog">
                <form action="{{ url('kursus') }}" method="post" id="form-kursus">
                    <div class="modal-content">
                        {{ csrf_field() }}
                        @method('post')
                        <div class="modal-header">
                            <h4 class="modal-title">Pengaturan Pembelajaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Pembelajaran</label>
                                <select class="form-control select2" name="id_pelajaran" required>
                                    @if(!empty($pelajaran))
                                        <option value="" >Pilih pelajaran</option>
                                        @foreach($pelajaran as $item_pelajaran)
                                            <option value="{{ $item_pelajaran->id }}">{{ $item_pelajaran->pelajaran }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Durasi Per Jam</label>
                                <input type="time" class="form-control" name="durasi" required>
                            </div>
                            <div class="form-group">
                                <label>Ceritakan secara singkat tentang materi yang anda bawakan</label>
                                <textarea class="form-control" name="tentang_materi" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" id="button-posting" class="btn btn-primary float-right">Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-jadwal-tutor">
            <div class="modal-dialog">
                <form action="{{ url('jadwal-tutor') }}" method="post" id="form-jadwal-kursus">
                    <div class="modal-content">
                        {{ csrf_field() }}
                        @method('post')
                        <div class="modal-header">
                            <h4 class="modal-title">Pengaturan Waktu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tgl" required>
                                <input type="hidden" class="form-control" name="id_kursus" required>
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="time" class="form-control" name="waktu" required>
                            </div>
                            <div class="form-group">
                                <button type="button" id="button-posting-jadwal" class="btn btn-primary float-right">
                                    Tandai
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- fullCalendar 2.2.5 -->
    {{--<script src='{{ asset('user/asset') }}/plugins/fullcalendar2/lib/main.js'></script>--}}
    {{--<script src="{{ asset('user/asset') }}/plugins/jquery/jquery.min.js"></script>--}}
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/fullcalendar-bootstrap/main.min.js"></script>
    @include('user.tutor.screen.course.js.jsPembelajaran')
    <script>
        $(function () {
            $('#calendar-container').hide();
            load_data();
        });
    </script>
@stop