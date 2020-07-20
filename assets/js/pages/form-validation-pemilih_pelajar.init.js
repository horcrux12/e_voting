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

    $("#datepicker-autoclose-start").datepicker({
        autoclose: !0,
        todayHighlight: !0,

    }).on('changeDate', function(e) {
            // Revalidate the date field
            $(this).parsley().validate();
        });

    let cek = $("#id_identitas").val();

    if (cek !=undefined ) {
        window.ParsleyValidator.addValidator("check_indentitas",{
            validateString: function(value)
            {
                return $.ajax({
                    url: baseurl+"pemilih_umum/check-user/",
                    method: "POST",
                    data: {no_identitas:value, id:cek},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                });
                
            }
        });
    }else{
        window.ParsleyValidator.addValidator("check_indentitas",{
            validateString: function(value)
            {
                return $.ajax({
                    url: baseurl+"pemilih_umum/check-user/",
                    method: "POST",
                    data: {no_identitas:value},
                    dataType: "JSON",
                    success: function(data){
                        return true;
                    }
                });
                
            }
        });
    }

    // console.log($("#id_tps").val());

    $("#kegiatan").on("change",function(){
        let id_kegiatan = $(this).val();
        get_tps_form(id_kegiatan);
    });
    

    function get_tps_form(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'pemilih_pelajar/getpemilih_pelajar/'+id,
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
            $("#tps").val('');	
            $("#tps").attr('disabled',true);	
        }
        
    }
});