$(document).ready(function() {

    $('#checkbox2').click(function(){
        if($(this).prop("checked") == true){
            $('#password').attr('type','text');
        }
        else if($(this).prop("checked") == false){
            $('#password').attr('type','password')
        }
    });

    $("form").parsley();

    let cek = $("#id_tps").val();
    if (cek !=undefined ) {
        let last_id = $("#kegiatan").find('option:selected').val();
        window.ParsleyValidator.addValidator("checknotps",{
            validateString: function(value)
            {
                return $.ajax({
                    url: baseurl+"tps/check-no/"+last_id,
                    method: "POST",
                    data: {notps:value, id:cek},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                })
            }
        });
        
        $("#kegiatan").on("change",function(){
            let id = $(this).val();
            if (id != last_id) {
                console.log("gak sama");
                window.ParsleyValidator.addValidator("checknotps",{
                    validateString: function(value)
                    {
                        return $.ajax({
                            url: baseurl+"tps/check-no/"+id,
                            method: "POST",
                            data: {notps:value},
                            dataType: "JSON",
                            success: function(data){
                                return true;
                            }
                        })
                    }
                });
            }else{
                console.log("sama");
                window.ParsleyValidator.addValidator("checknotps",{
                    validateString: function(value)
                    {
                        return $.ajax({
                            url: baseurl+"tps/check-no/"+id,
                            method: "POST",
                            data: {notps:value, id:cek},
                            dataType: "JSON",
                            success: function(data){
                                return true;
                            }
                        })
                    }
                });
            }
            
        });
    }else{
        $("#kegiatan").on("change",function(){
            let id = $(this).val();
            window.ParsleyValidator.addValidator("checknotps",{
                validateString: function(value)
                {
                    return $.ajax({
                        url: baseurl+"tps/check-no/"+id,
                        method: "POST",
                        data: {notps:value},
                        dataType: "JSON",
                        success: function(data){
                            return true;
                        }
                    })
                }
            });
        });
    }

    // console.log($("#id_tps").val());
    window.ParsleyValidator.addValidator("checkusername",{
        validateString: function(value)
        {
            let id = $("#id_tps").val();
            if (id == undefined) {
                return $.ajax({
                    url: baseurl+"tps/check-user/0",
                    method: "POST",
                    data: {username:value},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                })
            }else{
                return $.ajax({
                    url: baseurl+"tps/check-user/"+id,
                    method: "POST",
                    data: {username:value},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                })
            }
            
        }
    });
});