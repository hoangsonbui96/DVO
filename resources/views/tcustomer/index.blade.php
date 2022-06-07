@extends('master')
@section('cssframework', 'https://cdn.tailwindcss.com')
@section('title', 'Thông tin khách hàng')
@section('content')
    
<div class="container pt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Thông tin khách hàng</h3>
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
        {{-- <div class="col-sm-12 col-md-6 text-right ">
            <a href="/user/create" class="btn btn-primary mt-1 mr-3">Tạo tài khoản</a>
        </div> --}}
      </div>
      <div class="card-body container pt-0">
        <table class="table table-bordered" id="userTable">
          <thead>
            <tr>
              <th style="width: 10px">STT</th>
              <th>Tên tài khoản</th>
              <th>Họ và tên</th>
              <th>Ngày sinh</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th style="width: 75px">Tác vụ</th>
            </tr>
          </thead>
          <tbody class="t-body" current-page="1">
                @include('tcustomer.pagination_child')
          </tbody>
        </table>
        @csrf
        <div id="pagi-bar" class="row mt-3">
          <div class="col-sm-12 col-md-5"></div>
          <div class="col-sm-12 col-md-7 d-flex justify-content-end">
              <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                  <li class="paginate_button page-item previous" id="example1_previous"></li>
                  <div id="item_pagi" class="d-flex">

                  </div>
                  <li class="paginate_button page-item next" id="example1_next"></li>
                </ul>
              </div>
          </div>
      </div>
      <div id="totalPage" class="d-none"></div>
      </div>
    </div>
  </div>

  <div class="alert alert-success fixed-pos" id="successBar" style="display:none">
    <div>
      <p class="m-0">Chỉnh sửa thành công</p>
    </div>
  </div>
@endsection

@section('ajax')
  <script src={{asset("assets/js/customer/tcustomer.js")}}></script>
@endsection