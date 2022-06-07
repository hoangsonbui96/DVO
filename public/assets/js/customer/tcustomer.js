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
    //load Pagination when open page
    $(window).on('load', function() {
        var query = $("#Search").val();
        $("#nav-tcustomer").addClass('active');
        
        $.ajax({
            url:"http://127.0.0.1:8000/tcustomer/search",
            method:"get",
            data:{query:query},
            success:function(data){
                // $('.t-body').html(data);
                //console.log(data);
                //console.log(data.data);
                let output = '';
                $.each(data.data, function(index, value){

                    // let birthday ; 
                    // $.each(value.birth_day, function(index, val){
                    //     birthday = val.$numberLong;
                    // });
                    
                    // var currentTime = new Date(Number(birthday));
                    // var month = currentTime.getMonth() + 1
                    // var day = currentTime.getDate()
                    // var year = currentTime.getFullYear()
                    // var date = day + "/" + month + "/" + year
                    
                    output += `
                    <tr class="data-table">
                        <td>${index + 1}</td>
                        <td>${value.user_name}</td>
                        <td>${value.full_name}</td>
                        <td>${value.birth_day}</td>
                        <td>${value.phone}</td>
                        <td>${value.email}</td>
                        <td>                 
                            <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    `;
                });

                let previousBtn = '';
                let nextBtn = '';
                let pagiItem ='';
                let pagiLength = data.links.length; 
                $.each(data.links, function(index, value){
                    if(index == 0){
                        previousBtn +=`<a page="${index}" query="${query}" id="prevousBtn" class="page-link" href="${value.url}">Previous</a>`;
                    }else if(index == pagiLength -1){
                        nextBtn +=`<a page="${index}" query="${query}" id="nextBtn" class="page-link" href="${value.url}">Next</a>`;
                    }else{
                        pagiItem +=`<li class="paginate_button">
                                        <a page="${index}" query="${query}" class="number-page page-link" href="${value.url}">${index}</a>
                                    </li>`;
                    }
                });
                let totalPage = `<div id='total-page' total-page='${data.last_page}'></div>`;
                $('.t-body').html(output);
                //$('#pagi-bar').html(pagi_bar);
                $('#totalPage').html(totalPage);
                
                $('#example1_previous').html(previousBtn);
                $('#example1_next').html(nextBtn);
                $('#item_pagi').html(pagiItem);
                $('a[page="1"]').addClass('selected-background');

            }
        })
    });

    // Search when click
    $("#searchBtn").on('click', function(){
        var query = $("#Search").val();
        $("#remove-bar").remove();
            //var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"http://127.0.0.1:8000/tcustomer/search",
            method:"get",
            data:{query:query},
            success:function(data){
                // $('.t-body').html(data);
                console.log(data);
                //console.log(data.data);
                let output = '';
                $.each(data.data, function(index, value){
                    // let birthday ; 
                    // $.each(value.birth_day, function(index, val){
                    //     birthday = val.$numberLong;
                    // });

                    // var currentTime = new Date(Number(birthday));
                    // var month = currentTime.getMonth() + 1
                    // var day = currentTime.getDate()
                    // var year = currentTime.getFullYear()
                    // var date = day + "/" + month + "/" + year

                    output += `
                    <tr class="data-table">
                        <td>${index + 1}</td>
                        <td>${value.user_name}</td>
                        <td>${value.full_name}</td>
                        <td>${value.birth_day}</td>
                        <td>${value.phone}</td>
                        <td>${value.email}</td>
                        <td>                 
                            <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    `;
                });

                let previousBtn = '';
                let nextBtn = '';
                let pagiItem ='';
                let pagiLength = data.links.length; 
                $.each(data.links, function(index, value){
                    if(index == 0){
                        previousBtn +=`<a page="${index}" query="${query}" id="prevousBtn" class="page-link" href="${value.url}">Previous</a>`;
                    }else if(index == pagiLength -1){
                        nextBtn +=`<a page="${index}" query="${query}" id="nextBtn" class="page-link" href="${value.url}">Next</a>`;
                    }else{
                        pagiItem +=`<li class="paginate_button">
                                        <a page="${index}" query="${query}" class="number-page page-link" href="${value.url}">${index}</a>
                                    </li>`;
                    }
                });
                let totalPage = `<div id='total-page' total-page='${data.last_page}'></div>`;
                $('.t-body').html(output);
                //$('#pagi-bar').html(pagi_bar);
                $('#totalPage').html(totalPage);
                $('.t-body').attr("current-page", 1);
                $('#example1_previous').html(previousBtn);
                $('#example1_next').html(nextBtn);
                $('#item_pagi').html(pagiItem);
                $('a[page="1"]').addClass('selected-background');
            }
        })
    });

    // Search when enter
    $('#Search').on('keypress', function (e) {
        if(e.which === 13){
            var query = $("#Search").val();
            $("#remove-bar").remove();
                //var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"http://127.0.0.1:8000/tcustomer/search",
                method:"get",
                data:{query:query},
                success:function(data){
                    // $('.t-body').html(data);
                    console.log(data);
                    //console.log(data.data);
                    let output = '';
                    $.each(data.data, function(index, value){
                        // let birthday ; 
                        // $.each(value.birth_day, function(index, val){
                        //     birthday = val.$numberLong;
                        // });
                        
                        // var currentTime = new Date(Number(birthday));
                        // var month = currentTime.getMonth() + 1
                        // var day = currentTime.getDate()
                        // var year = currentTime.getFullYear()
                        // var date = day + "/" + month + "/" + year

                        output += `
                        <tr class="data-table">
                            <td>${index + 1}</td>
                            <td>${value.user_name}</td>
                            <td>${value.full_name}</td>
                            <td>${value.birth_day}</td>
                            <td>${value.phone}</td>
                            <td>${value.email}</td>
                            <td>                 
                                <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        `;
                    });
    
                    let previousBtn = '';
                    let nextBtn = '';
                    let pagiItem ='';
                    let pagiLength = data.links.length; 
                    $.each(data.links, function(index, value){
                        if(index == 0){
                            previousBtn +=`<a page="${index}" query="${query}" id="prevousBtn" class="page-link" href="${value.url}">Previous</a>`;
                        }else if(index == pagiLength -1){
                            nextBtn +=`<a page="${index}" query="${query}" id="nextBtn" class="page-link" href="${value.url}">Next</a>`;
                        }else{
                            pagiItem +=`<li class="paginate_button">
                                            <a page="${index}" query="${query}" class="number-page page-link" href="${value.url}">${index}</a>
                                        </li>`;
                        }
                    });
                    let totalPage = `<div id='total-page' total-page='${data.last_page}'></div>`;
                    $('.t-body').html(output);
                    //$('#pagi-bar').html(pagi_bar);
                    $('#totalPage').html(totalPage);
                    $('.t-body').attr("current-page", 1);
                    $('#example1_previous').html(previousBtn);
                    $('#example1_next').html(nextBtn);
                    $('#item_pagi').html(pagiItem);
                    $('a[page="1"]').addClass('selected-background');
                }
            })
        }
    });

    // When click number of page
    $(document).on('click', '.number-page', function(event){
        event.preventDefault();
        var page = $(this).attr('page');
        var query = $(this).attr('query');
        var totalPage = $("#totalPage").attr('total-page');
        var _token = $("input[name=_token]").val();
        //set background for current click btn
        $(".number-page").removeClass('selected-background');
        $(this).addClass('selected-background');

        $.ajax({
            url:"http://127.0.0.1:8000/tcustomer/search",
            method:"get",
            data:{_token:_token, page:page, query:query},
            success:function(data)
            {
              let output =''
              var itemNum = 0;
              itemNum = (data.current_page - 1) * data.per_page;

              $.each(data.data, function(index, value){
                // let birthday ; 
                // $.each(value.birth_day, function(index, val){
                //     birthday = val.$numberLong;
                // });

                // var currentTime = new Date(Number(birthday));
                // var month = currentTime.getMonth() + 1
                // var day = currentTime.getDate()
                // var year = currentTime.getFullYear()
                // var date = day + "/" + month + "/" + year

                itemNum++;

                output += `
                    <tr class="data-table">
                        <td>${itemNum}</td>
                        <td>${value.user_name}</td>
                        <td>${value.full_name}</td>
                        <td>${value.birth_day}</td>
                        <td>${value.phone}</td>
                        <td>${value.email}</td>
                        <td>                 
                            <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    `;
              })
              $('.t-body').attr("current-page", data.current_page);
              $('.t-body').html(output);
            }
          });
     });

    $(document).on('click', '#prevousBtn', function(event){
        event.preventDefault();
        var page = $('.t-body').attr("current-page");
        var query = $(this).attr('query');
        var totalPage = $("#totalPage").attr('total-page');
        var _token = $("input[name=_token]").val();
        var currentPage = $('.t-body').attr("current-page");
        console.log(currentPage);
        if(parseInt(page) > 1){
            var prevousPage = parseInt(page) - 1;
        }else{
            return false;
        }
        $(".number-page").removeClass('selected-background');
        $('a[page="'+prevousPage+'"]').addClass('selected-background');

        $.ajax({
            url:"http://127.0.0.1:8000/tcustomer/search",
            method:"get",
            data:{_token:_token, page:prevousPage, query:query},
            success:function(data)
            {
              let output =''
              var itemNum = 0;
              itemNum = (data.current_page - 1) * data.per_page;

              $.each(data.data, function(index, value){
                // let birthday ; 
                // $.each(value.birth_day, function(index, val){
                //     birthday = val.$numberLong;
                // });

                // var currentTime = new Date(Number(birthday));
                // var month = currentTime.getMonth() + 1
                // var day = currentTime.getDate()
                // var year = currentTime.getFullYear()
                // var date = day + "/" + month + "/" + year

                itemNum++;

                output += `
                    <tr class="data-table">
                        <td>${itemNum}</td>
                        <td>${value.user_name}</td>
                        <td>${value.full_name}</td>
                        <td>${value.birth_day}</td>
                        <td>${value.phone}</td>
                        <td>${value.email}</td>
                        <td>                 
                            <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    `;
              })
              $('.t-body').attr("current-page", prevousPage);
              $('.t-body').html(output);
            }
          });
     });

    $(document).on('click', '#nextBtn', function(event){
        event.preventDefault();
        var page = $('.t-body').attr("current-page");
        var query = $(this).attr('query');
        var totalPage = $("#total-page").attr('total-page');
        var _token = $("input[name=_token]").val();
        if(parseInt(page) < parseInt(totalPage)){
            var nextPage = parseInt(page) + 1;
        }else{
            return false;
        }

        $(".number-page").removeClass('selected-background');
        $('a[page="'+nextPage+'"]').addClass('selected-background');

        $.ajax({
            url:"http://127.0.0.1:8000/tcustomer/search",
            method:"get",
            data:{_token:_token, page:nextPage, query:query},
            success:function(data)
            {
              let output =''
              var itemNum = 0;
              itemNum = (data.current_page - 1) * data.per_page;

              $.each(data.data, function(index, value){
                // let birthday ; 
                // $.each(value.birth_day, function(index, val){
                //     birthday = val.$numberLong;
                // });
                
                // var currentTime = new Date(Number(birthday));
                // var month = currentTime.getMonth() + 1
                // var day = currentTime.getDate()
                // var year = currentTime.getFullYear()
                // var date = day + "/" + month + "/" + year

                itemNum++;

                output += `
                    <tr class="data-table">
                        <td>${itemNum}</td>
                        <td>${value.user_name}</td>
                        <td>${value.full_name}</td>
                        <td>${value.birth_day}</td>
                        <td>${value.phone}</td>
                        <td>${value.email}</td>
                        <td>                 
                            <a href="customer/edit/${value._id.$oid}" title="Edit"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    `;
              })
              $('.t-body').attr("current-page", nextPage);
              $('.t-body').html(output);
            }
          });
     });
});