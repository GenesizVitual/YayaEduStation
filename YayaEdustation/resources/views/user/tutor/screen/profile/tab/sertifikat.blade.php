<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
     aria-labelledby="custom-tabs-one-home-tab">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
        Upload Sertifikat
    </button>
    <p></p>
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul Sertifikat</th>
            <th>Tahun</th>
            <th>Berkas</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($sertfikat))
            @php($no=1)
            @foreach($sertfikat as $key=>$item_sertifikat)
                <tr>
                    <td>{{ $item_sertifikat[$key]['no'] }}</td>
                    <td>{{ $item_sertifikat[$key]['judul_sertifikat'] }}</td>
                    <td>{{ $item_sertifikat[$key]['tahun'] }}</td>
                    <td>{{ $item_sertifikat[$key]['gambar'] }}</td>
                    <td>
                        <form action="{{url('sertifikat/'.$item_sertifikat[$key]['id'])}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Apakah anda akan mengahpus sertifikat {{ $item_sertifikat[$key]['judul_sertifikat'] }} ...?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Belum ada sertifikat yang di unggah</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="{{ url('sertifikat') }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title">Form Sertifikat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="judul_sertifikat">Judul Sertifikat</label>
                            <input type="text" name="judul_sertifikat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">File Sertifikat</label>
                            <small style="color: red">*jpg, jpeg, png, gif</small>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->