<div class="card card-default" style="color: black;">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group" style="width: 100%">
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        <h4>{{ $pembelajaran->linkToPembelajaran->pelajaran }}</h4>
                        <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="#" onclick="showJadwal({{ $pembelajaran->id }})">Atur Jadwal</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="window.location.href='{{ url('materi/'.$pembelajaran->id) }}'">Materi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="edit_pembelajaran({{$pembelajaran->id}})">ubah pembelajaran</a>
                            <a class="dropdown-item" href="#" onclick="delete_pembelajaran({{$pembelajaran->id}})">hapus pembelajaran</a>
                        </div>
                    </button>
                </div>
            </div>
            <dt class="col-sm-4">Harga</dt>
            <dd class="col-sm-8"><i class="fa">Rp.</i> {{ number_format($pembelajaran->harga,0,',','.') }}</dd>
            <dt class="col-sm-4">Durasi</dt>
            <dd class="col-sm-8"><i></i> {{ date('H:i',strtotime($pembelajaran->durasi)) }} Perjam</dd>
        </div>
    </div>
</div>