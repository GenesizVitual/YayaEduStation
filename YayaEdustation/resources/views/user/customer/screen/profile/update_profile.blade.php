@extends('user.customer.base')

@section('css')

@stop

@section('content')
    <div class="row">
        <!-- Notifikasi -->
        <div class="col-md-4">
            @include('user.customer.include.notifikasi')
        </div>
        <div class="col-12"></div>
        <div class="col-md-4">
            <form action="{{ url('customer-profile/'.$customer->id) }}" method="post">
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
                            <input type="email" class="form-control" name="email" value="{{ $customer->email }}" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat<label style="color: red">*</label></label>
                            <textarea class="form-control" name="alamat" required>@if(!empty($customer->linkToProfileCs->alamat)) {{ $customer->linkToProfileCs->alamat }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. Telepon/Hp<label style="color: red">*</label></label>
                            <input  type="text" class="form-control" name="no_hp" @if(!empty($customer->linkToProfileCs->no_hp)) value="{{ $customer->linkToProfileCs->no_hp }}" @endif required/>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Pastikan profile yang anda masukan dengan benar')">Submit</button>
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
