<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <input type="hidden" name="code_uid" id="code_uid">
            <div class="card card-primary card-outline direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Chat dengan tutor {{ $course->linkToProfile->nama }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" onclick="$('#exampleModalCenter').modal('hide')"
                                data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" id="chat_body">

                    </div>
                    <!--/.direct-chat-messages-->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form action="#" method="post" id="chat_box">
                        <input type="hidden" id="to_id" name="to_id">
                        <input type="hidden" id="id_kursus" name="id_kursus">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" name="content" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                        <button type="button" id="send-chat" class="btn btn-primary">Send</button>
                    </span>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
</div>