@extends('user.tutor.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">

@stop

@section('page_header')
    @include('user.tutor.include.header',[
    'title'=>$data->linkToPembelajaran->pelajaran,
         'breadcrumb'=> [
                'Home'=>'#',
                'Materi'=>'materi',
         ]
    ])
@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-6">
            <div class="card @if(empty($materi)) card-default @else card-warning @endif">
                <div class="card-header">
                    <h4 class="card-title">Formulir Materi</h4>
                    <div class="card-tools">
                        <a href="{{ url('materi/'.$data->id) }}" class="btn btn-primary btn-tool"><i
                                    class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="@if(empty($materi)){{ url('materi') }} @else {{ url('materi/'.$materi->id) }} @endif"
                          method="post">
                        {{ csrf_field() }}
                        @if(empty($materi)) @method('post') @else @method('put') @endif
                        <div class="form-group">
                            <input type="hidden" name="id_kursus" value="{{ $id_kursus }}">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control"
                                   value="@if(!empty($materi)) {{ $materi->judul }} @endif"
                                   placeholder="Judul Materi anda"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail Materi</label>
                            <textarea name="detail" class="form-control" placeholder="Detail materi anda"
                                      required>@if(!empty($materi)) {{ $materi->detail }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info float-right">@if(empty($materi)) Posting @else
                                    Repost @endif</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="calendar-container">
            <div class="row">
                @if(!empty($data->linkToMannyMateri))
                    @foreach($data->linkToMannyMateri as $item_materi)
                        <div class="col-md-12">
                            <div class="card card-info collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item_materi->judul }}</h3>
                                    <div class="card-tools">
                                        <form action="{{ url('materi/'.$item_materi->id) }}" method="post">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <a href="{{ url('materi/'.$item_materi->id.'/edit') }}"
                                               class="btn btn-tool"><i class="fas fa-pen"></i>
                                            </a>
                                            <button type="submit"
                                               class="btn btn-tool" onclick="return confirm('Apakah anda akan menghapus materi {{ $item_materi->judul }}')"><i class="fas fa-eraser"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                        class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    {{ $item_materi->detail }}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    @endforeach
                @endif
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