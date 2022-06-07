$(document).ready(function(){  
    $('.SubmitForm').on('submit',function(e){
        e.preventDefault();
        var id_user = $("#userId").val();
        var name = $("#InputName").val();
        var username = $("#InputUserName").val();
        var email =$("#InputEmail").val();
        var phone =$("#InputPhone").val();
        var password =$("#InputPassword").val();
        var password_confirmation =$("#InputPasswordCf").val();
        let _token = $("input[name=_token]").val();


        if($.trim(name) == ''){
            $("div[data-valmsg-for = 'name']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'name']").text("Họ và tên không được để trống");
        }
        if($.trim(phone) == ''){
            $("div[data-valmsg-for = 'phone']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'phone']").text("Số điện thoại không được để trống");
        }
        // if($.trim(password) == ''){
        //     $("div[data-valmsg-for = 'password']").addClass('alert alert-danger');
        //     $("div[data-valmsg-for = 'password']").text("Mật khẩu không được để trống");
        // }
        // if($.trim(password_confirmation) == ''){
        //     $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
        //     $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không được để trống");
        // }
        // if($.trim(password) != ""){
        //     $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
        //     $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không trùng khớp để trống");
        // }

        $.ajax({
            url:"http://127.0.0.1:8000/user/update/" + id_user,
            type:"POST",
            data:{
                _token: _token,
                name:name,
                username:username,
                email:email,
                phone:phone,
                password:password,
                password_confirmation:password_confirmation
            },success:function(response){
                $('#successMsg').show();
                console.log(response);
                window.location = "http://127.0.0.1:8000/user#success";
            },error:function(response){
                if(response.responseJSON.errors.password){
                    $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không trùng khớp");
                }
            },

        });
    });

    $('#InputName').on('keydown', function(){
        $("div[data-valmsg-for = 'name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'name']").text("");
    });
    $('#InputPhone').on('keydown', function(){
        $("div[data-valmsg-for = 'phone']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'phone']").text("");
    });
    $('#InputPassword').on('keydown', function(){
        $("div[data-valmsg-for = 'password']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'password']").text("");
    });
    $('#InputPasswordCf').on('keydown', function(){
        $("div[data-valmsg-for = 'password_confirmation']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'password_confirmation']").text("");
    });
});