@extends('master')
@section('title', 'Edit')
@section('content')
    <div class="card-body container">
        <div class="d-flex align-items-center vh80 justify-content-center">
            <div>
                <div class="content-header row">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Chỉnh sửa tài khoản</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content w-600">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                            <form class="SubmitForm" action="{{ route('update', $user->id) }}">
                                @csrf
                                <input id="userId" class="d-none" type="text" value="{{$user->id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputName">Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="InputName" placeholder="Họ và tên" value="{{ $user->name }}" >
                                        <div class="mt-2" data-valmsg-for="name"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputUserName">Tên tài khoản <span class="text-danger">*</span></label>
                                        <input type="text" name="username" class="form-control" id="InputUserName" placeholder="Tên tài khoản" readonly value="{{ $user->username }}" >
                                        <div class="mt-2" data-valmsg-for="username"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Email" readonly value="{{ $user->email }}" >
                                        <div class="mt-2" data-valmsg-for="email"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPhone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Số điện thoại" value="{{ $user->phone }}" >
                                        <div class="mt-2" data-valmsg-for="phone"></div>
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
                                    <button class="btn btn-secondary"><a href="{{route('user.index')}}" class="text-white">Quay lại</a></button>
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
  <script src={{asset("assets/js/user/editvalidate.js")}}></script>
@endsection
    
