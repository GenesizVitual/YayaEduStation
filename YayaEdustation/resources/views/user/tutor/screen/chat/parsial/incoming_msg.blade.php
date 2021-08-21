<div class="incoming_msg">
    <div class="incoming_msg_img"><img class="img-circle" style="height: 50px"
                @if(!empty(Session::get('id_users')) || !empty(Session::get('id_customer')))
                    @if(!empty(Session::get('id_users')))
                        @if(!empty($data->linkFromIdUser->linkToProfileUser->foto))
                            src="{{ asset('user/tutor/photo/'.$data->linkFromIdUser->linkToProfileUser->foto) }}"
                        @else
                            src="https://ptetutorials.com/images/user-profile.png"
                        @endif
                    @endif
                    @if(!empty(Session::get('id_customer')))
                       @if(!empty($data->linkToIdUser->linkToProfileCs->foto_profile))
                        src="{{ asset('user/customer/photo/'.$data->linkToIdUser->linkToProfileCs->foto_profile) }}"
                       @else
                                       src="https://ptetutorials.com/images/user-profile.png"
                                       @endif
                    @endif
                @else
                     src="https://ptetutorials.com/images/user-profile.png"
                @endif
                alt="sunil">
    </div>
    <div class="received_msg">
        <div class="received_withd_msg">
            <p>{{ $data->content }}</p>
            <span class="time_date"> {{ date('h:i A | d M', strtotime($data->created_at)) }}</span></div>
    </div>
</div>
