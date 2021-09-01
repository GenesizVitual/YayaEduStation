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
   'title'=>'Invoice',
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
        <div class="col-md-12">
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <img src="{{ asset('webview/assets/img/logo_icon.png') }}" alt="not found logo"
                                 style="width: 100px"> YayaEdustation. Inc.
                            <small class="float-right">Date: {{ date('d/m/Y', strtotime($current_date)) }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{ $data->linkToCustomer->linkToProfileCs->name }}</strong><br>
                            {{ $data->linkToCustomer->linkToProfileCs->alamat }}<br>
                            Phone: {{ $data->linkToCustomer->linkToProfileCs->no_hp }}<br>
                            Email: {{ $data->linkToCustomer->email }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>Admin YayaEduStation.Inc</strong><br>
                            Jl. Ahmad Yani, Bende, Kec. Kadia<br>
                            Kota Kendari, Sulawesi Tenggara 93111<br>
                            Phone: +62 92291000030<br>
                            Email: yayaedustation@gmail.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice {{$kode_inv}}</b><br>
                        <br>
                        <b>Order ID:</b> {{ $oder_id }}<br>
                        <b>Payment Due:</b> {{ $paymet_due }}<br>
                        <b>Account:</b> xxx-xxxx-xx
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Subtotal(Rp)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1 Bulan</td>
                                <td>Les Private</td>
                                <td>
                                    Pelajaran : {{ $data->linkToKursus->linkToPembelajaran->pelajaran }} <br>
                                    Tutor : {{ $data->linkToTutor->linkToProfileUser->nama }}<br>
                                    Jumlah Pertemuan : {{ $jumlah_pertemuan }}<br>
                                    Biaya Pertemuan : {{ number_format($data->linkToKursus->harga,0,',','.') }}<br>
                                    Durasi : {{ date('H:i:s', strtotime($data->linkToKursus->durasi)) }}<br>
                                </td>
                                <td>
                                    @php
                                        $sub_total=$jumlah_pertemuan*$data->linkToKursus->harga;
                                        $ppn = (10/100);
                                        $total_ppn = $sub_total * $ppn;
                                        $nilai_total_ppn = $sub_total + $total_ppn;
                                    @endphp
                                    {{ number_format($sub_total,0,',','.') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="{{ asset('user/asset/dist/img/credit') }}/visa.png" alt="Visa">
                        <img src="{{ asset('user/asset/dist/img/credit') }}/mastercard.png" alt="Mastercard">
                        <img src="{{ asset('user/asset/dist/img/credit') }}/american-express.png"
                             alt="American Express">
                        <img src="{{ asset('user/asset/dist/img/credit') }}/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Amount Due {{ $paymet_due }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{ number_format($sub_total,0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th>PPN (10%)</th>
                                    <td>{{ number_format($total_ppn,0,'.',',') }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ number_format($nilai_total_ppn,0,'.',',') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                class="fas fa-print"></i> Print</a>
                        @if($data->status_transfers == 'Belum dibayar')
                            <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#modal-default"><i class="far fa-credit-card"></i> Confirm
                                Payment
                            </button>
                        @else
                            <button type="button" class="btn btn-warning float-right" ><i class="far fa-clock-o"></i> Admin sedang memeriksa transaksi anda
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('tranfer-biaya-tutor/'.$data->id) }}" style="width: 100%" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="total_kode_invoice">Biaya yang meski dibayar</label>
                            <input type="text" name="total_kode_invoice" class="form-control" value="{{ $kode_inv }}"
                                   readonly/>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Biaya yang meski dibayar</label>
                            <input type="text" name="total_bayar" class="form-control" value="{{ $nilai_total_ppn }}"
                                   readonly/>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Masukkan biaya yang terbayarkan</label>
                            <input type="text" name="total_bayarkan" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="bukti_bayar">Bukti Bayar</label>
                            <input type="file" name="bukti_tf" class="form-control"/>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Pastikan semua data yang anda masukan telah benar');">Send
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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

    </script>
@stop
