@extends('user.customer.base')
@section('css')
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('page_header')
    @include('user.tutor.include.header')
@stop

@section('content')

    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kehadiran</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" id="example2" style="width: 100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Tutor</th>
                            <th>Tanggal</th>
                            <th>Status Kehadiran Customer</th>
                            <th>Status Kehadiran Tutor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data_absen = $booking->linkToMannyAbsen))
                            @php($no=1)
                            @foreach($data_absen as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $booking->linkToCustomer->name }}</td>
                                    <td>{{ $booking->linkToTutor->linkToProfileUser->nama }}</td>
                                    <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>
                                    <td>
                                        <button class="btn
                                            @if($data->status_cs == 'hadir')
                                                btn-info
                                            @elseif($data->status_cs == 'belum absen')
                                                btn-danger
                                            @elseif($data->status_cs == 'akhiri')
                                                btn-success
                                            @endif" >{{ ucfirst($data->status_cs) }}</button>
                                    </td>
                                    <td>
                                        <button class="btn
                                            @if($data->status_tt == 'hadir')
                                                btn-info
                                            @elseif($data->status_tt== 'belum absen')
                                                btn-danger
                                            @elseif($data->status_tt == 'akhiri')
                                                btn-success
                                            @endif" >{{ ucfirst($data->status_tt) }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script>
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            // "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
        });
    </script>
@stop
