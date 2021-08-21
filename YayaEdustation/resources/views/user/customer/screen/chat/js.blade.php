<script>
    $('#send_chat').click(function (e) {
        e.preventDefault();
        var to_id = $('#to_id').val();
        if (to_id =='') {
            alert('Anda harus memilih customer yang akan mengirim pesan');
        } else {
            $.ajax({
                url: '{{ url('replay-message') }}',
                type: 'post',
                data: $('#chat_box').serialize(),
                success: function (result) {
                   if(result.status == true){
                       load_chat(result.uid);
                   }
                }
            })
        }
    })

    load_chat = function (uid) {
        $.ajax({
            url: '{{ url('message-chat') }}/' + uid,
            type: 'get',
            success: function (result) {
                $('.msg_history').html("");
                 $('#to_id').val(result.to_id);
                 $('#no_unique').val(result.uid);
                 $('#id_kursus').val(result.id_kursus);
                $.each(result.data, function (i, v) {
                    $('.msg_history').append(v.content);
                });
            }
        })
    }
</script>