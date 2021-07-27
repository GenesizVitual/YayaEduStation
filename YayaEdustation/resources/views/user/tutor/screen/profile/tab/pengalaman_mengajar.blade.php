<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
     aria-labelledby="custom-tabs-one-home-tab">
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nama_lembaga">Nama Lembaga</label>
                    <input type="text" class="form-control" name="nama_lembaga"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="thn_mulai">Tahun Mulai</label>
                    <input type="number" class="form-control" name="thn_mulai"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="thn_berkahir">Tahun Akhir</label>
                    <input type="number" class="form-control" name="thn_berkahir"/>
                </div>
            </div>
            <div class="col-md-12">
                <button class="btn btn-info float-right">Simpan</button>
                <button class="btn btn-warning float-left">Batal</button>
            </div>
            <div class="col-md-12">
                <hr/>
            </div>
        </div>
    </form>
    @if(!empty($user->linkToPengalaman))
        <div class="row">
            @foreach($user->linkToPengalaman as $data_pengalaman)
                <blockquote>
                    <form action="{{ url('pengalaman-mengajar/'.$data_pengalaman->id) }}" method="post"
                          style="width: 100%">

                        <div class="col-md-12">

                            {{--<p>{{ $data_pengalaman->nama_lembaga }}</p>--}}
                            {{--<span>{{ $data_pengalaman->thn_mulai }} - {{ $data_pengalaman->thn_berkahir }}</span>--}}
                            {{--<a href="" class="btn btn-warning float-right" style="margin: 1px"><i class="fa fa-pen"></i> </a>--}}
                            {{--<a href="" class="btn btn-danger float-right" style="margin: 1px"><i class="fa fa-eraser"></i> </a>--}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <label for="nama_lembaga">Nama Lembaga</label>
                                        <input type="text" class="form-control"
                                               value="{{ $data_pengalaman->nama_lembaga }}" name="nama_lembaga"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thn_mulai">Tahun Mulai</label>
                                        <input type="number" class="form-control"
                                               value="{{ $data_pengalaman->thn_mulai }}" name="thn_mulai"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thn_berkahir">Tahun Akhir</label>
                                        <input type="number" class="form-control"
                                               value="{{ $data_pengalaman->thn_berkahir }}" name="thn_berkahir"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info float-right" name="_method" value="put">
                                        Simpan
                                    </button>
                                    <button type="submit" class="btn btn-danger float-left"
                                            onclick="return confirm('Apakah anda akan menghapus {{ $data_pengalaman->nama_lembaga }} ... ?')"
                                            name="_method" value="delete">Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </blockquote>

            @endforeach
        </div>
    @endif


</div>