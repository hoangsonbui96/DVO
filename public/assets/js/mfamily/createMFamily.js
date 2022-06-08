$(document).ready(function(){
    $('#testConnect').on('click' , function(e){
        let _token = $("input[name=_token]").val();
        e.preventDefault();
        $.ajax({
            url:"http://127.0.0.1:8000/mfamily/create",
            type:"PUT",
            data:{
                _token:_token
            },success:function(response){
                console.log(response)
                if(response.includes("Failed")){
                    $("#failBar").css("display","block")
                    $("#failMess").text("Kết nối thất bại");
                
                    setTimeout(function(){
                        $('#failBar').css("display","none")
                    }, 5000);
                }else{
                    $("#successBar").css("display","block")
                    $("#successMess").text("Kết nối thành công");
    
                    setTimeout(function(){
                        $('#successBar').css("display","none")
                    }, 5000);
                }
            },error:function(res){
                console.log(res)
                $("#failBar").css("display","block")
                $("#failMess").text("Kết nối thất bại");
                
                setTimeout(function(){
                    $('#failBar').css("display","none")
                }, 5000);
            }
            });
    });



    $('.SubmitForm').on('submit',function(e){
        e.preventDefault();
        //check valid family
        var family_name = $("#InputFamilyName").val();
        var family_hometown = $("#InputFamilyHT").val();
        var family_anniversary = $("#InputFamilyAni").val();
        //check valid customer
        var user_name = $("#InputUserName").val();
        var full_name = $("#InputFullName").val();
        var email = $("#InputEmail").val();
        var phone = $("#InputPhone").val();
        var birth_day = $("#InputBirthDay").val();
        var password = $("#InputPassword").val();
        var password_confirmation = $("#InputPasswordCf").val();
        //check valid database 
        var db_user = $("#InputDbUser").val();
        var db_pwd = $("#InputDbPw").val();
        var db_host = $("#InputDbHost").val();
        var db_port = $("#InputDbPort").val();
        
        let _token = $("input[name=_token]").val();

        if($.trim(family_name) == ''){
            $("div[data-valmsg-for = 'family_name']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'family_name']").text("Tên dòng họ không được để trống");
        }
        if($.trim(user_name) == ''){
            $("div[data-valmsg-for = 'user_name']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'user_name']").text("Tài khoản khách hàng không được để trống");
        }
        if($.trim(full_name) == ''){
            $("div[data-valmsg-for = 'full_name']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'full_name']").text("Họ và tên khách hàng không được để trống");
        }
        if($.trim(email) == ''){
            $("div[data-valmsg-for = 'email']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'email']").text("Email không được để trống");
        }
        if($.trim(phone) == ''){
            $("div[data-valmsg-for = 'phone']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'phone']").text("Số điện thoại không được để trống");
        }
        if($.trim(birth_day) == ''){
            $("div[data-valmsg-for = 'birth_day']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'birth_day']").text("Ngày sinh không được để trống");
        }
        if($.trim(password) == ''){
            $("div[data-valmsg-for = 'password']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'password']").text("Mật khẩu không được để trống");
        }
        if($.trim(password_confirmation) == ''){
            $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không được để trống");
        }
        if($.trim(db_user) == ''){
            $("div[data-valmsg-for = 'db_user']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'db_user']").text("Tài khoản database không được để trống");
        }
        if($.trim(db_pwd) == ''){
            $("div[data-valmsg-for = 'db_pwd']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'db_pwd']").text("Mật khẩu database không được để trống");
        }
        if($.trim(db_host) == ''){
            $("div[data-valmsg-for = 'db_host']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'db_host']").text("Database host không được để trống");
        }
        if($.trim(db_port) == ''){
            $("div[data-valmsg-for = 'db_port']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'db_port']").text("Database port không được để trống");
        }

        if($.trim(family_name) == '' || $.trim(user_name) == '' || $.trim(full_name) == '' || $.trim(email) == '' || $.trim(phone) == '' || $.trim(birth_day) == '' || $.trim(password) == '' || $.trim(password_confirmation) == '' || $.trim(db_user) == '' || $.trim(db_pwd) == '' || $.trim(db_host) == '' || $.trim(db_port) == ''){
            return false;
        }
        $.ajax({
            url:"http://127.0.0.1:8000/mfamily/create",
            type:"POST",
            data:{
                _token: _token,
                family_name:family_name,
                user_name:user_name,
                family_hometown:family_hometown,
                family_anniversary:family_anniversary,
                full_name:full_name,
                email:email,
                phone:phone,
                birth_day:birth_day,
                password:password,
                password_confirmation:password_confirmation,
                db_user:db_user,
                db_pwd:db_pwd,
                db_host:db_host,
                db_port:db_port,
            },success:function(response){
                $('#successMsg').show();
                console.log(response);
                window.location = "http://127.0.0.1:8000/mfamily#success";
            },error:function(response){
                //log ra lỗi
                console.log(response.responseJSON.message);
                if(response.responseJSON.message){
                    $("#failBar").css("display","block")
                    $("#failMess").text("Lỗi không tạo mới được");
                }
                setTimeout(function(){
                    $('#failBar').css("display","none")
                }, 5000);
                if(response.responseJSON.message.includes("E11000 duplicate key")){
                    $("div[data-valmsg-for = 'db_user']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'db_user']").text("Tài khoản database đã tồn tại!");
                }
                if(response.responseJSON.errors.family_name){
                    $("div[data-valmsg-for = 'family_name']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'family_name']").text(response.responseJSON.errors.family_name);
                }
                if(response.responseJSON.errors.user_name){
                    $("div[data-valmsg-for = 'user_name']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'user_name']").text(response.responseJSON.errors.user_name);
                }
                if(response.responseJSON.errors.full_name){
                    $("div[data-valmsg-for = 'full_name']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'full_name']").text(response.responseJSON.errors.full_name);
                }
                if(response.responseJSON.errors.email){
                    $("div[data-valmsg-for = 'email']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'email']").text(response.responseJSON.errors.email);
                }
                if(response.responseJSON.errors.phone){
                    $("div[data-valmsg-for = 'phone']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'phone']").text(response.responseJSON.errors.phone);
                }
                if(response.responseJSON.errors.birth_day){
                    $("div[data-valmsg-for = 'birth_day']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'birth_day']").text(response.responseJSON.errors.birth_day);
                }
                if(response.responseJSON.errors.password){
                    $("div[data-valmsg-for = 'password']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'password']").text(response.responseJSON.errors.password);
                }
                if(response.responseJSON.errors.db_user){
                    $("div[data-valmsg-for = 'db_user']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'db_user']").text(response.responseJSON.errors.db_user);
                }
                if(response.responseJSON.errors.db_pwd){
                    $("div[data-valmsg-for = 'db_pwd']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'db_pwd']").text(response.responseJSON.errors.db_pwd);
                }
                if(response.responseJSON.errors.db_host){
                    $("div[data-valmsg-for = 'db_host']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'db_host']").text(response.responseJSON.errors.db_host);
                }
                if(response.responseJSON.errors.db_port){
                    $("div[data-valmsg-for = 'db_port']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'db_port']").text(response.responseJSON.errors.db_port);
                }
            },
        });
    });

    $('#InputFamilyName').on('keydown', function(){
        $("div[data-valmsg-for = 'family_name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'family_name']").text("");
    });
    $('#InputUserName').on('keydown', function(){
        $("div[data-valmsg-for = 'user_name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'user_name']").text("");
    });
    $('#InputFullName').on('keydown', function(){
        $("div[data-valmsg-for = 'full_name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'full_name']").text("");
    });
    $('#InputEmail').on('keydown', function(){
        $("div[data-valmsg-for = 'email']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'email']").text("");
    });
    $('#InputPhone').on('keydown', function(){
        $("div[data-valmsg-for = 'phone']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'phone']").text("");
    });
    $('#InputBirthDay').on('change', function(){
        $("div[data-valmsg-for = 'birth_day']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'birth_day']").text("");
    });
    $('#InputPassword').on('keydown', function(){
        $("div[data-valmsg-for = 'password']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'password']").text("");
    });
    $('#InputPasswordCf').on('keydown', function(){
        $("div[data-valmsg-for = 'password_confirmation']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'password_confirmation']").text("");
    });
    $('#InputDbUser').on('keydown', function(){
        $("div[data-valmsg-for = 'db_user']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'db_user']").text("");
    });
    $('#InputDbPw').on('keydown', function(){
        $("div[data-valmsg-for = 'db_pwd']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'db_pwd']").text("");
    });
    $('#InputDbHost').on('keydown', function(){
        $("div[data-valmsg-for = 'db_host']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'db_host']").text("");
    });
    $('#InputDbPort').on('keydown', function(){
        $("div[data-valmsg-for = 'db_port']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'db_port']").text("");
    });
});