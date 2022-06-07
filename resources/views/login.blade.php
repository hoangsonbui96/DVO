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
    <title>Login page</title>
</head>
<body class="hold-transition login-page" style="height: 75vh">
    <div class="login-box" style="width:400px">
      <div class="login-logo">
        <a href="#"><b>Đăng Nhập</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body"> 
          <form id="SubmitForm">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="mt-2" style="font-size: 16px;" data-valmsg-for="loginfail"></div>
            <!-- Create Post Form -->
            <div class="row justify-content-center">
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" id="loginbtn" style="font-size:15px">Đăng nhập</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
    
    <!-- jQuery -->
    <script src="{{asset("/assets/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("/assets/dist/js/adminlte.min.js")}}"></script>
    <script src={{asset("assets/js/login/login.js")}}></script>
    </body>
</html>