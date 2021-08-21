<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    @php
        $profile = profile_customer(Session::get('id_customer'));
        $name_customer = $profile->name;
        $foto_profile = $profile->linkToProfileCs->foto_profile;
    @endphp
    <div class="image">

        <img src="{{ asset('user/customer/photo/'.$foto_profile) }}" class="img-circle elevation-2" alt="User Image" style="width: 30px; height: 30px;">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ $name_customer }}</a>
    </div>
</div>
