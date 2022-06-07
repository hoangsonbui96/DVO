@extends('master')
@section('title','User')
@section('content')
<div class="container pt-5">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản trị người dùng</h3>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="">
          <label class="d-inline-flex pl-4 mt-2 align-item-center">
            <div class="width-45">Tìm kiếm</div> 
            <input type="search" class="form-control form-control-sm ml-2" name="" id="Search">
            <button class="btn btn-primary ml-2 fz-12" id="searchBtn"><i class="fas fa-search"></i></button>
          </label>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 text-right ">
          <a href="/user/create" class="btn btn-primary mt-1 mr-3">Tạo tài khoản</a>
      </div>
    </div>
    <div class="card-body container pt-0">
      <table class="table table-bordered" id="userTable">
        <thead>
          <tr>
            <th style="width: 10px">STT</th>
            <th>Họ và tên</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th style="width: 75px">Tác vụ</th>
          </tr>
        </thead>
        <tbody class="t-body">
          @php
              $i=0;
          @endphp
          @foreach ($users as $user)
              @php
                  $i++;
              @endphp
              <tr class="data-table">
                  <td>{{$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>                 
                    <a href="{{route('edit', $user->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
                    <button style="border: none; background: none"  data-toggle="modal" data-target="#deleteConfirm{{$user->id}}"><a href="#" title="Delete"><i class="fas fa-ban"></i></a></button>
                    {{-- start from modal --}}
                    <form action="{{route('destroy', $user->id)}}" method="POST">
                      @csrf
                      <div class="modal fade" id="deleteConfirm{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm{{$user->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="margin: 18.75rem auto!important">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <span>Bạn có chắc chắn muốn xóa tài khoản <b class="blue-color">{{$user->username}}</b>?</span>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                              <button type="submit" class="btn btn-primary">Xóa</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </td>
              </tr>
          @endforeach
              <tr class="data-table-ajax"></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
{{-- <form method="post" action="{{ route('user.indexpost') }}">
  @csrf
  <button id="sendsbtn">send</button>
</form> --}}
@if(Session::has('success'))
    <div class="alert alert-success fixed-pos" id="successBar">
      <div>
        <p class="m-0">{{Session::get('success')}}</p>
      </div>
    </div>
@endif
<div class="alert alert-success fixed-pos" id="successBar" style="display:none">
  <div>
    <p class="m-0">Chỉnh sửa thành công</p>
  </div>
</div>
@endsection
@section('ajax')
  <script src={{asset("assets/js/user/ajax.js")}}></script>
@endsection