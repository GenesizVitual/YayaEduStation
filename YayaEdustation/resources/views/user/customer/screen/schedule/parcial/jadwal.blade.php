<div class="col-md-12">
    <form action="{{ url('update-schedule-customer/'.$booking->id) }}" method="post">
        @method('put')
        <div class="form-group">
            {{ csrf_field() }}
            <input type="hidden" name="day_select_lama" value="{{ $day_select }}">
            <label>Hari:</label>
            <select name="hari_baru" class="select2 form-control">
                @foreach($day_option as $key=> $item)
                    <option value="{{ $item }}" @if($item==$day_select) selected @endif>{{$item}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Waktu belajar</label>
            <input type="time" name="waktu" value="{{ $booking->$day_select }}" class="form-control">
            <small>Waktu belajar sekarang : {{ $booking->$day_select }}</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda akan mengganti jadwal mengajar anda ... ?')">Simpan</button>
        </div>
    </form>
</div>
