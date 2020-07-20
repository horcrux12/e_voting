$(document).ready(function() {

    $('#checkbox2').click(function(){
        if($(this).prop("checked") == true){
            $('#password').attr('type','text');
            // console.log('cek');
        }
        else if($(this).prop("checked") == false){
            $('#password').attr('type','password');
        }
    });

    window.ParsleyValidator.addValidator("checkusername",{
        validateString: function(value)
        {
            let id = $("#id_bilik").val();
            if (id == undefined) {
                return $.ajax({
                    url: baseurl+"bilik/check-user/0",
                    method: "POST",
                    data: {username:value},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                })
            }else{
                return $.ajax({
                    url: baseurl+"bilik/check-user/"+id,
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

    window.ParsleyValidator.addValidator("checknobilik",{
        validateString: function(value)
        {
            return $.ajax({
                url: baseurl+"bilik/check-no/"+$("#tps").val(),
                method: "POST",
                data: {
                    nobilik:value, 
                    id:$("#id_bilik").val()
                },
                dataType: "JSON",
                success: function(data){
                    return true;
                }
            })
        }
    });

    $("form").parsley();

    $("#kegiatan").on("change",function(){
        let id = $(this).val();
        get_tps_form(id);
        $("#tps").val('');
    });

    $("#tps").on("change",function(){
        if ($(this).val() != '') {
            $("#no_bilik").attr('readonly',false);
        }else{
            $("#no_bilik").attr('readonly',true);
        }
    });
    

    function get_tps_form(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'panitia/gettps/'+id,
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#tps").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih TPS</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_tps+'">'+params[i].nama+'</option>';
                        }
                        $('#tps').html(drp_down);
                        $("#tps").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada TPS</option>';
                        $('#tps').html(drp_down);
                        $("#tps").attr('disabled',true);
                    }
                    
                }
            })	
        }else{
            $.ajax({
                type: 'POST',
                url: baseurl+'panitia/gettps/0',
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#tps").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih TPS</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_tps+'">'+params[i].nama+'</option>';
                        }
                        $('#tps').html(drp_down);
                        $("#tps").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada TPS</option>';
                        $('#tps').html(drp_down);
                        $("#tps").attr('disabled',true);
                    }
                    
                }
            })	
        }
        
    }
});