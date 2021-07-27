<script>

    var default_url = $('#form-kursus').attr('action');

    const load_data = function () {
        $('#container-pembelajaran').html("");
        $.ajax({
            url: '{{ url('kursus/data') }}',
            type: 'get',
            success: function (result) {
                console.log(result);
                if (result.status == 200 || result.status == 202) {
                    $.each(result.data, function (index, value) {
                        $('#container-pembelajaran').append(value);
                    });
                }
            }, error: function (xhr, status, error) {
//                alert('Failed to load data, Check you connection');
            }
        });
    }

    $('#pembelajaran').click(function () {
        $('#modal-pembelajaran').modal('show');
    });

    edit_pembelajaran = function (kode) {
        $.ajax({
            url: "{{ url('kursus') }}/" + kode + "/edit",
            type: 'get',
            success: function (result) {
                if (result.status == '200') {
                    $('#modal-pembelajaran').modal('show');
                    $('[name="id_pelajaran"]').val(result.data.id_pelajaran).trigger('change');
                    $('[name="harga"]').val(result.data.harga);
                    $('[name="durasi"]').val(result.data.durasi);
                    $('[name="tentang_materi"]').val(result.data.tentang_materi);
                    var default_url = $('#form-kursus').attr('action', '{{ url('kursus') }}/' + kode);
                    $('[name="_method"]').val('put');
                }
            }, error: function (xhr, status, error) {
                alert('Failed to update you data, Check you connection');
            }
        });
    }

    $('#button-posting').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: $('#form-kursus').attr('action'),
            type: 'post',
            data: $('#form-kursus').serialize(),
            success: function (result) {
                if (result.status == 202) {
                    load_data();
                    $('[name="_method"]').val('post');
                    $('#modal-pembelajaran').modal('hide');
                }
            }
        })
    });

    delete_pembelajaran = function (kode) {
        if (confirm('Apakah anda akan menghapus pembelajaran ini..?')) {
            $.ajax({
                url: '{{ url('kursus') }}/' + kode,
                type: 'post',
                data: {
                    '_method': 'delete',
                    '_token': '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result.status == 202) {
                        load_data();
                        alert('Pembelajaran telah dihapus');
                    }
                },
                error: function (xhr, message, status) {
                    alert('Failed to erase you data, check you connection');
                }
            })
        } else {
            alert('proses dibatalkan');
        }
    }

    showJadwal = function (kode) {
        console.log(kode)
        $('#calendar').html("");
        $('#calendar-container').show();
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: {
                url: '{{ url('jadwal-tutor') }}/' + kode,
                type: 'get'
            },
            color:'red',
            'themeSystem': 'bootstrap',
            selectable: true,
            dateClick: function (info) {
                $('#modal-jadwal-tutor').modal('show');
                $('[name="tgl"]').val(info.dateStr);
                $('[name="id_kursus"]').val(kode);
            },
        });
        calendar.render();
    }

    {{--showJadwal_old = function (kode) {--}}
    {{--$('#calendar-container').show();--}}
    {{--var calendarEl = document.getElementById('calendar');--}}
    {{--var calendar = new FullCalendar.Calendar(calendarEl, {--}}
    {{--initialView: 'dayGridMonth',--}}
    {{--selectable: true,--}}
    {{--dateClick: function (info) {--}}
    {{--console.log(info.dateStr);--}}
    {{--$('#modal-jadwal-tutor').modal('show');--}}
    {{--$('[name="tgl"]').val(info.dateStr);--}}
    {{--},--}}
    {{--resources: {--}}
    {{--url: '{{ url('jadwal-tutor/') }}' + kode,--}}
    {{--method: 'get'--}}
    {{--}--}}
    {{--});--}}
    {{--calendar.render();--}}
    {{--}--}}

    $('#button-posting-jadwal').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: $('#form-jadwal-kursus').attr('action'),
            type: 'post',
            data: $('#form-jadwal-kursus').serialize(),
            success: function (result) {
                $('#modal-jadwal-tutor').modal('hide');
            },
            error: function (xhr, messages, status) {
                alert('Failed to mark you day, check you connection');
            }
        })
    })
</script>