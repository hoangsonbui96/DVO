@extends('master')
@section('title', 'Thêm mới thông tin dòng họ')
@section('content')
<div class="card-body container">
    <div class="align-items-center justify-content-center">
        <div class="content-header row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tạo thông tin</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                    {{-- <form action="{{ route('store') }}" method="POST"> --}}
                    <form class="SubmitForm">
                        @csrf
                        <div class="card-body row">
                            <div class="col-5">
                                <h3>Thông tin dòng họ</h3>
                                <div class="form-group">
                                    <label for="InputFamilyName">Tên dòng họ<span class="text-danger">*</span></label>
                                    <input type="text" name="family_name" class="form-control" id="InputFamilyName" placeholder="Tên dòng họ">
                                    <div class="mt-2" data-valmsg-for="family_name"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputFamilyHT">Quê quán</label>
                                    <input type="text" name="family_hometown" class="form-control" id="InputFamilyHT" placeholder="Quê quán">
                                    <div class="mt-2" data-valmsg-for="family_hometown"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputFamilyAni">Ngày kỷ niệm</label>
                                    <input type="date" name="family_anniversary" class="form-control" id="InputFamilyAni" placeholder="Ngày kỷ niệm">
                                    <div class="mt-2" data-valmsg-for="family_anniversary"></div>
                                </div>
                                
                                <div class="row mt-4">
                                    <h3 class="col-9">Thông tin database</h3>
                                    <div method="put">
                                        <button id="testConnect" class="btn btn-warning d-flex justify-content-center align-items-center" style="font-size: 12px;">Test connection</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputDbHost">Database host<span class="text-danger">*</span></label>
                                    <input type="text" name="db_host" class="form-control" id="InputDbHost" placeholder="Database host" value="{{$db_host}}">
                                    <div class="mt-2" data-valmsg-for="db_host"></div>
                                </div>
    
                                <div class="form-group">
                                    <label for="InputDbPort">Database port<span class="text-danger">*</span></label>
                                    <input type="text" name="db_port" class="form-control" id="InputDbPort" value="27017" placeholder="Database port" value="{{$db_port}}">
                                    <div class="mt-2" data-valmsg-for="db_port"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputDbUser">Tài khoản database<span class="text-danger">*</span></label>
                                    <input type="text" name="db_user" class="form-control" id="InputDbUser" placeholder="Tài khoản database">
                                    <div class="mt-2" data-valmsg-for="db_user"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputDbPw">Mật khẩu database<span class="text-danger">*</span></label>
                                    <input type="password" name="db_pwd" class="form-control" id="InputDbPw" placeholder="Mật khẩu database">
                                    <div class="mt-2" data-valmsg-for="db_pwd"></div>
                                </div>
                            </div>   
                            <hr class="hr-custom">
                            <div class="col-5">
                                <h3 style="position: relative">Thông tin khách hàng</h3>
                                <div class="form-group">
                                    <label for="InputFullName">Họ và tên khách hàng<span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" id="InputFullName" placeholder="Họ và tên khách hàng">
                                    <div class="mt-2" data-valmsg-for="full_name"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputUserName">Tài khoản khách hàng<span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" class="form-control" id="InputUserName" placeholder="Tài khoản khách hàng">
                                    <div class="mt-2" data-valmsg-for="user_name"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Mật khẩu<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Mật khẩu">
                                    <div class="mt-2" data-valmsg-for="password"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputPasswordCf">Xác nhận mật khẩu<span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" id="InputPasswordCf" placeholder="Xác nhận mật khẩu">
                                    <div class="mt-2" data-valmsg-for="password_confirmation"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputBirthDay">Ngày sinh<span class="text-danger">*</span></label>
                                    <input type="date" name="birth_day" class="form-control" id="InputBirthDay" placeholder="Tài khoản khách hàng">
                                    <div class="mt-2" data-valmsg-for="birth_day"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email khách hàng<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="vd: example@gmail.com">
                                    <div class="mt-2" data-valmsg-for="email"></div>
                                </div>
                                <div class="form-group">
                                    <label for="InputPhone">Số điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Số điện thoại">
                                    <div class="mt-2" data-valmsg-for="phone"></div>
                                </div>                    
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button id="submitBtn" type="submit" class="btn btn-primary mr-2" style="">Tạo</button>
                            <button class="btn btn-secondary"><a href="{{route('mfamily.index')}}" class="text-white">Quay lại</a></button>
                        </div>
                    </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-danger fixed-pos" id="failBar" style="display: none">
        <div>
          <p class="m-0" id="failMess"></p>
        </div>
    </div>
    <div class="alert alert-success fixed-pos" id="successBar" style="display: none">
        <div>
          <p class="m-0" id="successMess"></p>
        </div>
    </div>

</div>
@endsection
@section('ajax')
  <script src={{asset("assets/js/mfamily/createMFamily.js")}}></script>
@endsection