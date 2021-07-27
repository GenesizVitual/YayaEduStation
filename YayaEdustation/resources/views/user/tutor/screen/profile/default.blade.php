@extends('user.tutor.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
@stop

@section('page_header')
    @include('user.tutor.include.header',[
    'title'=>'Profile',
         'breadcrumb'=> [
                'Home'=>'#',
                'Profile'=>'profile',
         ]
    ])
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header ">
                    <h4 id="card-title">Foto Profile</h4>
                </div>
                <div class="card-body">
                    <img class="img-circle"
                         src="{{ asset('user/tutor/photo') }}/@if(!empty($user->linkToProfileUser)){{ $user->linkToProfileUser->foto }}@else loginKaryawan.png @endif"
                         id="profile-image" style="width: 100%;height: 300px" alt="Profile Image">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-info card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  @if(Session::get('tab-profile')=='profile')active @endif"
                               href="{{ url('profile-tutor') }}">Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Session::get('tab-profile')=='pendidikan') active @endif"
                               href="{{ url('pendidikan') }}">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Session::get('tab-profile')=='pengalaman') active @endif"
                               href="{{ url('pengalaman-mengajar') }}">Pengalaman Mengajar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Session::get('tab-profile')=='sertifikat') active @endif"
                               href="{{ url('sertifikat') }}">Sertifikat</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        @if(Session::get('tab-profile')=='profile')
                            @include('user.tutor.screen.profile.tab.profile')
                        @elseif(Session::get('tab-profile')=='pendidikan')
                            @include('user.tutor.screen.profile.tab.pendidikan')
                        @elseif(Session::get('tab-profile')=='sertifikat')
                            @include('user.tutor.screen.profile.tab.sertifikat')
                        @elseif(Session::get('tab-profile')=='pengalaman')
                            @include('user.tutor.screen.profile.tab.pengalaman_mengajar')
                        @endif
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="modal fade" id="modal-upload-foto">
            <div class="modal-dialog">
                <form action="{{ url('upload-photo-tutor/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Foto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama_sertifikat">Foto</label>
                                    <small style="color: red">*jpg, jpeg, png, gif</small>
                                    <input type="file" name="foto" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
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
    @include('user.tutor.screen.profile.js.fotoProfile')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            })
        });
    </script>
@stop