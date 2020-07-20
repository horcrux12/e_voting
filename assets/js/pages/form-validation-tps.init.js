$(document).ready(function() {

    $('#checkbox2').click(function(){
        if($(this).prop("checked") == true){
            $('#password').attr('type','text');
        }
        else if($(this).prop("checked") == false){
            $('#password').attr('type','password')
        }
    });

    $('#kegiatan').on('change',function(){
        if ($(this).val() == '') {
            $('#no_tps').attr('disabled',true);
            console.log('kosong');
        }else{
            $('#no_tps').attr('disabled',false);
            console.log('isi');
        }
    });

    window.ParsleyValidator.addValidator("checknotps",{
        validateString: function(value)
        {
            return $.ajax({
                url: baseurl+"tps/check-no/"+$('#kegiatan').val(),
                method: "POST",
                data: {
                    notps :  value, 
                    id : $("#id_tps").val()
                },
                dataType: "JSON",
                success: function(data){
                    return true;
                }
            })
        }
    });

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

    $("form").parsley();
});