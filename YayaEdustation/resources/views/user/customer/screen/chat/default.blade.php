@extends('user.customer.base')

@section('css')
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('user/asset') }}/chat_css.css">

@stop

@section('page_header')
    @include('user.tutor.include.header',[
    'title'=>"Customer Chat",
         'breadcrumb'=> [
                'Home'=>'#',
                'Chat'=>'customer-chat',
         ]
    ])
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Daftar Chat</h4>
                                </div>
                            </div>
                            <div class="inbox_chat">
                                @if(!empty($customer_chat))
                                    @foreach($customer_chat as $key=> $customer)
                                        <div class="chat_list active_chat" id="user_id_{{ $key }}"
                                             onclick="load_chat('{{ $customer[0]->no_unique }}')">
                                            <div class="chat_people">
                                                <div class="chat_img"><img class="img-circle" style="height: 50px"
                                                        @if(empty($customer[0]->linkFromIdUser->linkToProfileUser->foto))
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        @else
                                                        src="{{ asset('user/tutor/photo/'.$customer[0]->linkFromIdUser->linkToProfileUser->foto) }}"
                                                        @endif
                                                        alt="sunil">
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>{{ $customer[0]->linkFromIdUser->linkToProfileUser->nama }}
                                                        <span
                                                            class="chat_date">{{ date('d M', strtotime($customer[0]->created_at)) }}</span>
                                                    </h5>
                                                    <p>{{ $customer[0]->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mesgs">
                            <div class="msg_history">

                            </div>
                            <form action="{{ url('replay-message') }}" id="chat_box" method="post">
                                <div class="type_msg">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="to_id" id="to_id">
                                    <input type="hidden" name="no_unique" id="no_unique">
                                    <input type="hidden" name="id_kursus" id="id_kursus">
                                    <div class="input_msg_write">
                                        <input type="text" class="write_msg" name="content"
                                               placeholder="Type a message"/>
                                        <button class="msg_send_btn" id="send_chat" type="button"><i
                                                class="fa fa-comments"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    @include('user.tutor.screen.chat.js')
    <script>
        $(function () {
        });
    </script>
@stop
