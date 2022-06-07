@extends('master')
@section('title', 'Chỉnh sửa thông tin khách hàng')
@section('content')
    <div class="card-body container">
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <div class="content-header row">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Chỉnh sửa thông tin khách hàng</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content w-600">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                            <form class="SubmitForm" action="{{ route('customer.update', $customers->id) }}">
                                @csrf
                                <input id="customersId" class="d-none" type="text" value="{{$customers->id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputName">Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" name="full_name" class="form-control" id="InputName" placeholder="Họ và tên" value="{{ $customers->full_name }}" >
                                        <div class="mt-2" data-valmsg-for="full_name"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputUsername">Tên tài khoản <span class="text-danger">*</span></label>
                                        <input type="text" name="user_name" class="form-control" id="InputUsername" placeholder="Tên tài khoản" readonly value="{{ $customers->user_name }}" >
                                        <div class="mt-2" data-valmsg-for="customersname"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Email" readonly value="{{ $customers->email }}" >
                                        <div class="mt-2" data-valmsg-for="email"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPhone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Số điện thoại" value="{{ $customers->phone }}" >
                                        <div class="mt-2" data-valmsg-for="phone"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputBirthday">Ngày sinh</label>
                                        <input type="date" name="birth_day" class="form-control datetime-picker" id="InputBirthday" placeholder="Ngày tháng năm sinh" value="{{ $customers->birth_day }}" >
                                        <div class="mt-2" data-valmsg-for="birth_day"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Mật khẩu">
                                        <div class="mt-2" data-valmsg-for="password"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" class="form-control" id="InputPasswordCf" placeholder="Xác nhận mật khẩu">
                                        <div class="mt-2" data-valmsg-for="password_confirmation"></div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button id="submitBtn" type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                                    <button class="btn btn-secondary"><a href="{{route('customer')}}" class="text-white">Quay lại</a></button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('ajax')
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script src={{asset("assets/js/customer/editCustomer.js")}}></script>
@endsection