<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
     aria-labelledby="custom-tabs-one-home-tab">
    <form action="{{ url('pendidikan/'.$user->id) }}" method="post">
        <div class="form-group">
            @method('put')
            {{ csrf_field() }}
            <label for="jenjang_pendidikan">Pendidikan Terakhir</label>
            <select name="jenjang_pendidikan" class="form-control" style="width: 100%" required>
                @foreach($jenjang as $item_jenjang)
                    <option value="{{ $item_jenjang }}"
                            @if(!empty($user->linkToProfileUser)) @if($user->linkToProfileUser->jenjang_pendidikan==$item_jenjang) selected @endif @endif >{{ $item_jenjang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pt">Nama Sekolah/Perguruan Tinggi</label>
            <input type="text" class="form-control" name="pt"
                   value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->pt }} @endif">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" name="jurusan"
                   value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->jurusan }} @endif">
        </div>
        <div class="form-group">
            <label for="durasi_pendidikan">Tamat Tahun</label>
            <input type="number" class="form-control" name="durasi_pendidikan"
                   value="@if(!empty($user->linkToProfileUser)){{ $user->linkToProfileUser->durasi_pendidikan }}@endif">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </div>
    </form>
</div>