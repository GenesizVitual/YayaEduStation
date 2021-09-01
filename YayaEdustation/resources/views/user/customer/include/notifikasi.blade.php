{{--<div class="alert alert-info alert-dismissible">--}}
{{--    --}}{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
{{--    <h6><i class="icon fas fa-info"></i> Data anda akan diverifikasi oleh admin sebelum ditampilkan dihalaman pencarian--}}
{{--        tutor </h6>--}}
{{--</div>--}}
@if(!empty($customer))
    @if(empty($customer->linkToProfileCs->alamat) || empty($customer->linkToProfileCs->no_hp))
        <div class="alert alert-warning alert-dismissible">
            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
            <h6><i class="icon fas fa-info"></i> Lengkapi profil anda <a href="{{ url('customer-profile') }}"> Klik
                    disini</a></h6>
        </div>
    @endif
@endif


@if(!empty(Session::get('message_succes')))
    <div class="alert alert-success alert-dismissible">
        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        <h6><i class="icon fas fa-info"></i> {{ Session::get('message_succes') }}</h6>
    </div>
@endif

@if(!empty(Session::get('message_fail')))
    <div class="alert alert-warning alert-dismissible">
        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        <h6><i class="icon fas fa-info"></i> {{ Session::get('message_fail') }}</h6>
    </div>
@endif

@if(!empty(Session::get('message_tr_warning')))
    <div class="alert alert-warning alert-dismissible">
        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        <h6><i class="icon fas fa-info"></i> {{ Session::get('message_tr_warning') }}</h6>
    </div>
@endif

@if(!empty(Session::get('message_tr_success')))
    <div class="alert alert-success alert-dismissible">
        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        <h6><i class="icon fas fa-info"></i> {{ Session::get('message_tr_success') }}</h6>
    </div>
@endif
