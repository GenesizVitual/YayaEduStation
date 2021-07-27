<!-- Message to the right -->
<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">{{ $data->linkToIdUser->linkToProfileUser->nama }}</span>
        <span class="direct-chat-timestamp float-left">{{ date('d M h:i A', strtotime($data->created_at)) }}</span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="{{ asset('user/tutor/photo/'.$data->linkToIdUser->linkToProfileUser->foto) }}"
         alt="Message User Image" style="width: 40px; height: 40px;">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        {{ $data->content }}
    </div>
    <!-- /.direct-chat-text -->
</div>
<!-- /.direct-chat-msg -->