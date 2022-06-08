$(document).ready(function(){
    let _token = $("input[name=_token]").val();

    $("#logout-btn").on("click", function(e){
        //alert("smth");
        e.preventDefault();
        $.ajax({
            url:"http://127.0.0.1:8000/api/logout",
            method:"delete",
            data:{_token: _token},
            success:function(response){
                console.log(response.message);
                window.location = "http://127.0.0.1:8000/";
            },error:function(response){
                console.log(response);
            }
        })
    });
})