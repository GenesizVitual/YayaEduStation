@extends('user.tutor.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">

@stop

@section('page_header')
    @include('user.tutor.include.header',[
    'title'=>'Daftar Booking',
         'breadcrumb'=> [
                'Home'=>'#',
                'Materi'=>'materi',
         ]
    ])
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-12">
            <div class="timeline">
                <!-- timeline time label -->
                @foreach($booking as $data)
                    <div class="time-label">
                        <span class="bg-red">{{ date('d M. Y', strtotime($data->created_at)) }}</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-user bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i
                                        class="fas fa-clock"></i> {{ date('H:i', strtotime($data->created_at)) }}</span>
                            <h3 class="timeline-header"><a href="#">{{ $data->linkToCustomer->name }}</a> mengirimkan
                                anda permintaan mengajar</h3>
                            <div class="timeline-body">
                                <h3 class="card-title" style="color:deepskyblue; font-weight: bold"> Jadwal yang
                                    disarankan </h3>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Senin</th>
                                        <th>Selesa</th>
                                        <th>Rabu</th>
                                        <th>Kamis</th>
                                        <th>Jumat</th>
                                        <th>Sabtu</th>
                                        <th>Minggu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <td>Waktu</td>
                                        <td style="background-color: @if(!empty($data->senin)) greenyellow @else red @endif" >{{ $data->senin }}</td>
                                        <td style="background-color: @if(!empty($data->selasa)) greenyellow @else red @endif">{{ $data->selasa }}</td>
                                        <td style="background-color: @if(!empty($data->rabu)) greenyellow @else red @endif">{{ $data->rabu }}</td>
                                        <td style="background-color: @if(!empty($data->kamis)) greenyellow @else red @endif">{{ $data->kamis }}</td>
                                        <td style="background-color: @if(!empty($data->jumat)) greenyellow @else red @endif">{{ $data->jumat }}</td>
                                        <td style="background-color: @if(!empty($data->sabtu)) greenyellow @else red @endif">{{ $data->sabtu }}</td>
                                        <td style="background-color: @if(!empty($data->minggu)) greenyellow @else red @endif">{{ $data->minggu }}</td>
                                    </tbody>
                                    <tfoot>
                                        <td colspan="7" style="font-weight: bold">
                                            Durasi mengajar : {{ $data->durasi }}
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="timeline-footer">
                                <form action="{{ url('proses-booking/'.$data->id) }}" method="post" >
                                    {{ csrf_field() }}
                                    @method('put')
                                    <button class="btn btn-primary btn-sm" name="status_tutor" value="true" onclick="return confirm('Apakah anda akan menanggapi permintaan dari {{ $data->linkToCustomer->name }} ... ?')">Terima Permintaan</button>
                                    <button class="btn btn-danger btn-sm" name="status_tutor" value="denied" onclick="return confirm('Apakah anda akan menolak permintaan dari {{ $data->linkToCustomer->name }} ... ?')">Menolak Permintaan</button>
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- END timeline item -->

            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
        });
    </script>
@stop