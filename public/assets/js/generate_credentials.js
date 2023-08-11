$(".gnrtpw").click(function(){
    var user_type=$(this).attr("data-user_type");
    var user_id=$(this).attr("data-user_id");
    var user_name=$(this).attr("data-user_name");

    if(user_id){

        $.confirm({
            title: 'Confirm!',
            icon: 'mdi mdi-alert',
            type: 'red',
            content: 'Are you sure you want to regenerate the password for <span class="bg-warning bg-soft">'+user_name+'</span> ?',
            buttons: {
                confirm: {
                    text:'Yes, Confirm',
                    action:function(){

                        var formData = new FormData();
                        formData.append("user_id",user_id);
                        formData.append("user_type",user_type);

                        $.ajax({
                            url: base_url+"/admin/regenerate-password",
                            type: 'post',
                            dataType: "JSON",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response, status)
                            {
                                if(status=='success'){
                                    console.log(response);
                                    $("#pwdModel").modal('show');

                                    $("#gnt_email_id").html(response['data']['email_id']);
                                    $("#gnt_pwd").html(response['data']['password']);

                                    $("#user_id").val(user_id);
                                    $("#new_password").val(response['data']['password']);
                                    $("#user_type").val(user_type);
                                }
                            },
                            error: function (xhr, desc, err)
                            {

                            }
                        });
                    }
                },
                close: function () {

                }
            }
        });

    }else{
        alert("Error while processing your query.");
    }
});
