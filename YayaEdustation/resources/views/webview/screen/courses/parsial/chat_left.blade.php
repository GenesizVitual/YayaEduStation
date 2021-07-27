<!-- Message. Default to the left -->
<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">{{ $data->linkToIdUser->name }}</span>
        <span class="direct-chat-timestamp float-right">{{ date('d M h:i A', strtotime($data->created_at)) }}</span>
    </div>
    <!-- /.direct-chat-infos -->
    <img class="direct-chat-img" src="{{ asset('user/asset') }}/dist/img/user1-128x128.jpg"
         alt="Message User Image">
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        {{ $data->content }}
    </div>
    <!-- /.direct-chat-text -->
</div>
<!-- /.direct-chat-msg -->