<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
     aria-labelledby="custom-tabs-one-home-tab">
    <form action="{{ url('profile-tutor/'. $user->id) }}" method="post">
        <div class="row">
            <div class="col-md-12">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                           readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label><label style="color: red">*</label>
                    <input type="text" class="form-control" name="nama"
                           value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->nama }} @endif"
                           required>
                </div>
                <div class="form-group">
                    <label for="nik">Nik</label><label style="color: red">*</label>
                    <input type="text" class="form-control" name="nik"
                           value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->kode }} @endif"
                           required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label><label style="color: red">*</label>
                    <br/>
                    <input type="radio" name="jenis_kelamin" value="Pria"
                           @if(!empty($user->linkToProfileUser)) @if($user->linkToProfileUser->jenis_kelamin=="Pria") checked
                           @endif @endif
                           required/> Pria <input type="radio"
                                                  name="jenis_kelamin"
                                                  @if(!empty($user->linkToProfileUser)) @if($user->linkToProfileUser->jenis_kelamin=="Wanita") checked
                                                  @endif @endif

                                                  value="Wanita"/>
                    Wanita
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_telp">Telepon/Hp</label><label style="color: red">*</label>
                    <input type="text" class="form-control" name="no_telp"
                           value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->no_telp }} @endif"
                           required>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label><label style="color: red">*</label>
                    <input type="text" class="form-control" name="tempat_lahir"
                           value="@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->tempat_lahir }} @endif"
                           required>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label><label style="color: red">*</label>
                    <input type="date" class="form-control" name="tgl_lahir"
                           value="@if(!empty($user->linkToProfileUser)){{$user->linkToProfileUser->tgl_lahir}}@endif"
                           required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat">Alamat</label><label style="color: red">*</label> <br/>
                    <textarea class="form-control" name="alamat"
                              required>@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->alamat }} @endif</textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat">Ceritakan secara singkat tentang anda.</label><label style="color: red">*</label> <br/>
                    <textarea class="form-control" name="tentang_tutor"
                              required>@if(!empty($user->linkToProfileUser)) {{ $user->linkToProfileUser->tentang_tutor }} @endif</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <small style="color: red">*) Harap diisi</small>
                    <button class="btn btn-success float-right">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
