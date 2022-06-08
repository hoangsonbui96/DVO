<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("/assets/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset("/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/assets/dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/app.css")}}">
    <script src="@yield('cssframework')"></script>
    <title>@yield('title')</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                  <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="fas fa-user-circle mr-3" style="font-size: 32px"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mr-4">
                        @csrf
                        <a href="{{route('logins')}}" class="dropdown-item" id="logout-btn">Đăng xuất</a>
                    </div>
                  </li>
                </ul>


            </nav>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh!important">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
              <span class="brand-text font-weight-light">DVO Manager</span>
            </a>
        
            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              </div>
        
              <!-- SidebarSearch Form -->
        
              <!-- Sidebar Menu -->
              <nav class="mt-10">.

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a href="/user" class="nav-link" id="nav-user">
                      <i class="fas fa-users"></i>
                      <p>
                          Quản trị người dùng
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/customer" class="nav-link" id="nav-tcustomer">
                      <i class="fas fa-users"></i>
                      <p>
                          Thông tin khách hàng
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/mfamily" class="nav-link" id="nav-mfamily">
                      <i class="fas fa-users"></i>
                      <p>
                          Thông tin dòng họ
                      </p>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
        <div class="content-wrapper">
            <!-- Content Replace -->
            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
<script src={{asset("/assets/plugins/jquery/jquery.min.js")}}></script>
<!-- Bootstrap 4 -->
<script src={{asset("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("assets/dist/js/adminlte.min.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("assets/dist/js/demo.js")}}></script>
<script src={{asset("assets/js/master.js")}}></script>
@yield('ajax')

</body>
</html>