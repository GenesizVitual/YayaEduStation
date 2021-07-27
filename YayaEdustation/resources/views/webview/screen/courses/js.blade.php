<script>
    $(document).ready(function () {
        showJadwal('{{ $course->id }}')
    })

    showJadwal = function (kode) {
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: {
                url: '{{ url('jadwal-tutor') }}/' + kode,
                type: 'get'
            },
            color: 'red',
            initialView: 'timeGridWeek',
            'themeSystem': 'bootstrap',
            selectable: true,

            dateClick: function (info) {
                alert('Test');
            },
        });
        calendar.render();
    }

    chat_box = function (params1, params2) {
        $.ajax({
            url: '{{ url('send-message') }}',
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'params1': params1,
                'params2': params2,
            },
            success: function (result) {
                if (result.status == true) {
                    $('#to_id').val(result.id_tutor);
                    $('#id_kursus').val(result.id_kursus);
                    $('#code_uid').val(result.no_uid);
                    load_chat();
                    $('#exampleModalCenter').modal('show');
                } else {
                    window.location.href = "{{ url('log-in') }}";
                }
            }
        })
    }

    load_chat = function () {
        var code_uid = $('#code_uid').val();
        console.log(code_uid);
        if(code_uid){
            $.ajax({
                url: '{{ url('retrive-chat') }}',
                type: 'post',
                data : {
                    'no_unique':code_uid,
                    '_token': '{{ csrf_token() }}'
                },
                success : function(result){
                    console.log(result);
                    $('#chat_body').html("");
                    $.each(result.data, function (i, v) {
                        $('#chat_body').append(v.content);
                    })
                }
            })
        }
    }

    setInterval(load_chat, 60000);

    $('#send-chat').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{ url('send-chat') }}',
            type : 'post',
            data : $('#chat_box').serialize(),
            done: function (result) {
                $('#code_uid').val(result.data.no_unique);
                console.log(result);
            }
        })
    })

</script>