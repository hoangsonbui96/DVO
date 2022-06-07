$(document).ready(function(){
    $("#loginbtn").on("click", function(){
        event.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        let _token = $("input[name=_token]").val();

        if($.trim(username) == '' || $.trim(password) == ''){
            $("div[data-valmsg-for = 'loginfail']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'loginfail']").text("Username hoặc password không được để trống");
        }
        if($.trim(username) == '' || $.trim(password) == ''){
            return false;
        }

        $.ajax({
            url:"http://127.0.0.1:8000/api/login",
            method:"POST",
            data:{username : username , password : password, _token : _token},
            success:function(response){
                if(response.message == "Login success"){
                    console.log("thành công");
                    window.location = "http://127.0.0.1:8000/user";
                }else{
                    console.log("thất bại");
                    $("div[data-valmsg-for = 'loginfail']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'loginfail']").text("Username hoặc password không chính xác");
                }
                //console.log(response.message);
            },error:function(response){
                console.log(response);
            }
        })
    });

    $('#username').on('keydown', function(){
        $("div[data-valmsg-for = 'loginfail']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'loginfail']").text("");
    });
    $('#password').on('keydown', function(){
        $("div[data-valmsg-for = 'loginfail']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'loginfail']").text("");
    });
})