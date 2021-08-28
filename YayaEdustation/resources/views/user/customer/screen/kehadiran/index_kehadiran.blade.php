@extends('user.customer.base')

@section('css')

@stop

@section('page_header')
    @include('user.customer.include.header')
@stop

@section('content')

    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-md-12 row">
            @if(!empty($data))
                @foreach($data as $booking)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row " >
                                    <div class="col-lg-3">
                                        <div class="card bg-info d-flex" style="height: 90%">
                                            <div class="card-body">
                                                <h4 style="text-decoration: underline">{{ $booking->linkToKursus->linkToPembelajaran->pelajaran }}</h4>
                                                <p>
                                                    Nama Tutor : {{ $booking->linkToTutor->linkToProfileUser->nama }}
                                                    <br>
                                                    Durasi : {{ date('H:i:s', strtotime($booking->durasi)) }}
                                                    <br>
                                                    Pertemuan Ke: Belum ada
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 row">
                                        @foreach($day as $item_day)
                                            <div class="col-md-3">
                                                <div class="card  @if(!empty($booking->$item_day)) bg-green @endif d-flex">
                                                    <div class="card-body">
                                                        <h5>{{ $item_day }}</h5>
                                                        <p>Waktu Kursus : {{ $booking->$item_day }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h3 style="text-align: center">Belum ada jadwal</h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
@stop
