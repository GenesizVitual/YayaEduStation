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
                                <div class="row ">
                                    <div class="col-lg-3" style="margin-bottom: 20px;">
                                        <div class="card bg-info d-flex" style="height: 100%;">
                                            <div class="card-body">
                                                <h4 style="text-decoration: underline">{{ ucfirst($booking->linkToKursus->linkToPembelajaran->pelajaran) }}</h4>
                                                <p>
                                                    Nama Tutor : {{ $booking->linkToTutor->linkToProfileUser->nama }}
                                                    <br>
                                                    Durasi : {{ date('H:i:s', strtotime($booking->durasi)) }}
                                                    <br>
                                                    Pertemuan Ke: Belum ada
                                                </p>
                                                <button class="btn btn-warning">
                                                    @php
                                                        $filter_absen = $booking->linkToMannyAbsen->where('date',$current_date)->first();
                                                        if(!empty($filter_absen))
                                                        {
                                                            if($filter_absen->status_tt=='belum absen'){
                                                                echo 'Menunggu Tutor Absen';
                                                            }else if($filter_absen->status_tt=='hadir'){
                                                                echo 'Tutor telah absen';
                                                            }else if($filter_absen->status_tt=='akhiri'){
                                                                echo 'Tutor telah mengakhiri pembelajaran hari ini';
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $new_day = $day[$current_day];
                                                            if(!empty($booking->$new_day)){
                                                                echo 'Hari ini ada kursus';
                                                            }else{
                                                                echo 'Tidak Ada Kursus';
                                                            }
                                                        }
                                                    @endphp
                                                </button>
                                                @if(!empty(Session::get('status_absen')))
                                                    <button
                                                        class="btn btn-lg btn-warning" style="margin-top: 10px">{{ Session::get('status_absen') }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            @if($booking->status_transfers=='Konfirmasi pembayaran')
                                                @foreach($day as $key=> $item_day)
                                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                                        <form action="{{ url('absen-customer') }}" method="post"
                                                              style="width: 100%">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id_booking"
                                                                   value="{{ $booking->id }}"/>
                                                            <input type="hidden" name="date" value="{{ $current_date }}"/>
                                                            <button
                                                                class="btn @if(!empty($booking->$item_day)) btn-success @else btn-danger @endif"
                                                                style="width: 100%" type="submit">
                                                                <h5>{{ ucfirst($item_day) }}</h5>
                                                                <p>@if(!empty($booking->$item_day))
                                                                        @php
                                                                            $time_end='';
                                                                            $durasi = explode(':',$booking->durasi);
                                                                            $time_end = date('H:i', strtotime( $booking->$item_day.' +'.$durasi[0].' hours +'.$durasi[1].' minutes'));
                                                                        @endphp
                                                                        @if( ($key != $current_day) && strtotime($booking->$item_day) > strtotime($booking->current_time))
                                                                            Waktu Kursus: {{ $booking->$item_day }}
                                                                            <br> Waktu selesai : {{ $time_end }}
                                                                @else
                                                                    @if((strtotime($current_time_on)>=strtotime($booking->$item_day)) && strtotime($current_time_on)<=strtotime($time_end))
                                                                        <div class="form-group">
                                                                            <i class="fa fa-2x" id="div1"></i> <label
                                                                                style="font-size: 20px">Mulai Absen</label>
                                                                        </div>
                                                                        <input type="hidden" name="status_cs" value="hadir">
                                                                    @elseif(strtotime($current_time_on)>=strtotime($time_end))
                                                                        <div class="form-group">
                                                                            <i class="fa fa-2x" id="div1"></i> <label
                                                                                style="font-size: 20px"> Akhiri</label>
                                                                        </div>
                                                                        <input type="hidden" name="status_cs"
                                                                               value="akhiri">
                                                                    @else
                                                                        <div class="form-group">
                                                                            <i class="fa fa-1x" id="div1"></i> <label
                                                                                style="font-size: 15px">Absen Belum
                                                                                dibuka</label>
                                                                        </div>
                                                                        <input type="hidden" name="status_cs"
                                                                               value="belum absen">
                                                                    @endif
                                                                @endif
                                                                @else Tidak ada
                                                                kursus <br> <label></label>
                                                                @endif
                                                                </p>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                                <div class="col-md-3">
                                                    <div class="card bg-fuchsia d-flex">
                                                        <div class="card-body">
                                                            <h5>Daftar Kehadiran</h5>
                                                            <p><a href="{{ url('detail-absen-kehadiran/'.$booking->id) }}"
                                                                  style="color: white">Lihat detail</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class="card bg-warning d-flex" style="height: 215px">
                                                        <div class="card-body">
                                                            <h4 style="padding: 2%; text-align: center"><i class="fa fa-3x" id="div1"></i>
                                                                <br> Anda harus menyelesaikan pembayaran biaya kurus private terlebih dahulu
                                                                <br> <a href="{{ url('tranfer-biaya-tutor/'.$booking->id) }}">Lihat Invoice</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
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
    <script>
        function hourglass() {
            var a;
            a = document.getElementById("div1");
            a.innerHTML = "&#xf251;";
            setTimeout(function () {
                a.innerHTML = "&#xf252;";
            }, 1000);
            setTimeout(function () {
                a.innerHTML = "&#xf253;";
            }, 2000);
        }

        hourglass();
        setInterval(hourglass, 3000);
    </script>
@stop
