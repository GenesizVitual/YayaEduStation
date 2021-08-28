<div class="col-md-12">
    <div class="form-group row">
        <table>
            <tr>
                <td>Nama Tutor</td>
                <td style="width: 20px">:</td>
                <td>{{ $booking->linkToCustomer->name }}</td>
            </tr>
            <tr>
                <td>Pelajaran</td>
                <td style="width: 20px">:</td>
                <td>{{ $booking->linkToKursus->linkToPembelajaran->pelajaran }}</td>
            </tr>
            <tr>
                <td>Durasi belajar</td>
                <td style="width: 20px">:</td>
                <td>{{ date('H:i:s', strtotime($booking->durasi)) }}</td>
            </tr>
            <tr>
                <td>Biaya Perjam</td>
                <td style="width: 20px">:</td>
                <td>{{ number_format($booking->linkToKursus->harga,0,',','.') }}</td>
            </tr>
        </table>
    </div>
</div>
