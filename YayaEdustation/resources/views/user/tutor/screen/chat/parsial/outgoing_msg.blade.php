<div class="outgoing_msg">
    <div class="sent_msg">
        <p>{{ $data->content }}</p>
        <span class="time_date"> {{ date('h:i A | d M', strtotime($data->created_at)) }}</span></div>
</div>