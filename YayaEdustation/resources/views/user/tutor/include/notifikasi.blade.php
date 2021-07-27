<div class="alert alert-info alert-dismissible">
    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
    <h6><i class="icon fas fa-info"></i> Data anda akan diverifikasi oleh admin sebelum ditampilkan dihalaman pencarian
        tutor </h6>
</div>

@if(!empty($profile->linkToProfileUser))
    @if(!empty($profile->linkToProfileUser->nama) and !empty($profile->linkToProfileUser->kode) and !empty($profile->linkToProfileUser->tempat_lahir) and !empty($profile->linkToProfileUser->tgl_lahir)
    and !empty($profile->linkToProfileUser->alamat)
    and !empty($profile->linkToProfileUser->no_telp)
    and !empty($profile->linkToProfileUser->jenjang_pendidikan)
    and !empty($profile->linkToProfileUser->pt)
    )
    @else
        <div class="alert alert-warning alert-dismissible">
            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
            <h6><i class="icon fas fa-info"></i> Lengkapi profil anda</h6>
        </div>
    @endif
@endif