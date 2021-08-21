<div class="incoming_msg">
    <div class="incoming_msg_img"><img
            src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
    </div>
    <div class="received_msg">
        <div class="received_withd_msg">
            <p>{{ $data->content }}</p>
            <span class="time_date"> {{ date('h:i A | d M', strtotime($data->created_at)) }}</span></div>
    </div>
</div>