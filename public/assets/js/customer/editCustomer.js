$(document).ready(function(){  
    $('.SubmitForm').on('submit',function(e){
        e.preventDefault();
        var id_user = $("#customersId").val();

        var full_name = $("#InputName").val();
        var username = $("#InputUsername").val();
        var email =$("#InputEmail").val();
        var phone =$("#InputPhone").val();
        var birth_day =$("#InputBirthday").val();
        var password =$("#InputPassword").val();
        var password_confirmation =$("#InputPasswordCf").val();
        let _token = $("input[name=_token]").val();
        console.log(birth_day);
        if($.trim(full_name) == ''){
            $("div[data-valmsg-for = 'full_name']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'full_name']").text("Họ và tên không được để trống");
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
        if($.trim(birth_day) == ''){
            $("div[data-valmsg-for = 'birth_day']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'birth_day']").text("Ngày sinh không được để trống");
        }
        $.ajax({
            url:"http://127.0.0.1:8000/customer/update/" + id_user,
            type:"POST",
            data:{
                _token: _token,
                full_name:full_name,
                username:username,
                email:email,
                phone:phone,
                birth_day:birth_day,
                password:password,
                password_confirmation:password_confirmation
            },success:function(response){
                $('#successMsg').show();
                //console.log(response);
                window.location = "http://127.0.0.1:8000/customer#success";
            },error:function(response){
                if(response.responseJSON.errors.password){
                    $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không trùng khớp");
                }
            },

        });
    });

    $('#InputName').on('keydown', function(){
        $("div[data-valmsg-for = 'full_name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'full_name']").text("");
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
    $('#InputBirthday').on('change', function(){
        $("div[data-valmsg-for = 'birth_day']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'birth_day']").text("");
    });
});