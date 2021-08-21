@extends('user.customer.base')

@section('css')

@stop
@section('page_header')
    @include('user.customer.include.header',[
   'title'=>'Profile',
        'breadcrumb'=> [
               'Home'=>'#',
               'Profile'=>'customer-profile',
        ]
   ])
@stop
@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-4">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-12"></div>
        <div class="col-md-4">
            <form action="{{ url('customer-profile/'.$customer->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="card card-warning">
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama<label style="color: red">*</label></label>
                            <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="email" value="{{ $customer->email }}"
                                   readonly/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat<label style="color: red">*</label></label>
                            <textarea class="form-control" name="alamat"
                                      required>@if(!empty($customer->linkToProfileCs->alamat)) {{ $customer->linkToProfileCs->alamat }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. Telepon/Hp<label style="color: red">*</label></label>
                            <input type="text" class="form-control" name="no_hp"
                                   @if(!empty($customer->linkToProfileCs->no_hp)) value="{{ $customer->linkToProfileCs->no_hp }}"
                                   @endif required/>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto<label style="color: red">*</label></label>
                            @if(!empty($customer->linkToProfileCs->foto_profile))
                                <div class="widget-user-image" style="padding-left: 30%;padding-bottom: 10px;">
                                    <img class="img-circle elevation-2" src="{{ asset('user/customer/photo/'.$customer->linkToProfileCs->foto_profile) }}" alt="User Avatar" style="width: 100px; height: 100px; margin: auto">
                                </div>
                            @else
                                <small style="color: orange">belum ada foto</small>
                            @endif
                            <input type="file" class="form-control" name="foto" required/>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Pastikan profile yang anda masukan dengan benar')">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('user/asset') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('user/asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script
        src="{{ asset('user/asset') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            })
        });
    </script>
@stop
