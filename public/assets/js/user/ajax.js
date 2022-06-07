$(document).ready(function(){
    //hiển thị thông báo thành công khi edit
    if(window.location.hash == '#success')
    {
        $("#successBar").css("display","block");
        history.replaceState("", document.title, window.location.pathname);
        setTimeout(function(){
            $('#successBar').remove()
        }, 5000);
    }
    $(window).on('load', function() {
        $("#nav-user").addClass('active');
    });

    $("#searchBtn").on('click', function(){
        var query = $("#Search").val();
        var _token = $('meta[name="_token"]').attr('content');
        $('.data-table').remove();
        $.ajax({
            url:"http://127.0.0.1:8000/user/search",
            method:"get",
            data:{query:query, _token:_token},
            success:function(data){
                console.log(_token);
                let output = '';
                $.each(data, function (index, value) {
                    output += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${value.name}</td>
                        <td>${value.username}</td>
                        <td>${value.email}</td>
                        <td>${value.phone}</td>
                        <td>
                            <a href="user/edit/${value._id}" title="Edit"><i class="fas fa-edit"></i></a>
                            <button style="border: none; background: none"  data-toggle="modal" data-target="#deleteConfirm${value._id}"><a href="#" title="Delete"><i class="fas fa-ban"></i></a></button>
                            <form action="user/destroy/${value._id}" method="POST">
                            <input type="hidden" name="_token" value="${_token}">
                            <div class="modal fade" id="deleteConfirm${value._id}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm${value._id}" aria-hidden="true">
                              <div class="modal-dialog" role="document" style="margin: 18.75rem auto!important">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <span>Bạn có chắc chắn muốn xóa tài khoản <b class="blue-color">${value.username}</b>?</span>
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
                    `;
                });
                $('.t-body').html(output);
            }
        })
    });

    $('#Search').on('keypress', function (e) {
        if(e.which === 13){
            var query = $("#Search").val();
            $.ajax({
                url:"http://127.0.0.1:8000/user/search",
                method:"get",
                data:{query:query},
                success:function(data){
                    $('.t-body').html(data);
                }
            })
        }
    });


    $('.SubmitForm').on('submit',function(e){
        e.preventDefault();
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
        if($.trim(username) == ''){
            $("div[data-valmsg-for = 'username']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'username']").text("Username không được để trống");
        }
        if($.trim(phone) == ''){
            $("div[data-valmsg-for = 'phone']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'phone']").text("Số điện thoại không được để trống");
        }
        if($.trim(password) == ''){
            $("div[data-valmsg-for = 'password']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'password']").text("Mật khẩu không được để trống");
        }
        if($.trim(password_confirmation) == ''){
            $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
            $("div[data-valmsg-for = 'password_confirmation']").text("Xác nhận mật khẩu không được để trống");
        }
        $.ajax({
            url:"http://127.0.0.1:8000/user/create",
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
                window.location = "http://127.0.0.1:8000/user";
            },error:function(response){
                if(response.responseJSON.errors.username){
                    $("div[data-valmsg-for = 'username']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'username']").text(response.responseJSON.errors.username);
                }
                if(response.responseJSON.errors.email){
                    $("div[data-valmsg-for = 'email']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'email']").text(response.responseJSON.errors.email);
                }
                if(response.responseJSON.errors.password){
                    $("div[data-valmsg-for = 'password_confirmation']").addClass('alert alert-danger');
                    $("div[data-valmsg-for = 'password_confirmation']").text(response.responseJSON.errors.password);
                }
            },
        });
    });

    $('#InputName').on('keydown', function(){
        $("div[data-valmsg-for = 'name']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'name']").text("");
    });
    $('#InputUserName').on('keydown', function(){
        $("div[data-valmsg-for = 'username']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'username']").text("");
    });
    $('#InputEmail').on('keydown', function(){
        $("div[data-valmsg-for = 'email']").removeClass('alert alert-danger');
        $("div[data-valmsg-for = 'email']").text("");
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

    setTimeout(function(){
        $('#successBar').remove()
    }, 5000);

  });