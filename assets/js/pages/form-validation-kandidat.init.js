$(document).ready(function() {

    "use strict";

    // get_pemilihan_form($("#kegiatan").find(":selected").val());

    window.Parsley
        .addValidator('filemaxmegabytes', {
            requirementType: 'string',
            validateString: function (value, requirement, parsleyInstance) {

                if (!window.FormData) {
                    return true;
                }

                var file = parsleyInstance.$element[0].files;
                var maxBytes = requirement * 1048576;

                if (file.length == 0) {
                    return true;
                }

                return file.length === 1 && file[0].size <= maxBytes;

            },
            messages: {
                en: 'File tidak boleh lebih besar dari 2 MB'
            }
        })
        .addValidator('filemimetypes', {
            requirementType: 'string',
            validateString: function (value, requirement, parsleyInstance) {

                if (!window.FormData) {
                    return true;
                }

                var file = parsleyInstance.$element[0].files;

                if (file.length == 0) {
                    return true;
                }

                var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
                return allowedMimeTypes.indexOf(file[0].type) !== -1;

            },
            messages: {
                en: 'File type not allowed'
            }
        })
        .addValidator("checkno_kandidat",{
            validateString: function(value)
            {
                return $.ajax({
                    url: baseurl+"kandidat/check-no/"+$('#pemilihan').val(),
                    method: "POST",
                    data: {
                        nokandidat : value,
                        id : $("#id_kandidat").val()
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
        get_pemilihan_form($(this).val());
        $("#pemilihan").val('');
    });

    $("#pemilihan").on("change",function(){
        if ($(this).val() != '') {
            $("#no_urut").attr('disabled',false);
        }else{
            $("#no_urut").attr('disabled',true);
        }
    });

    $("#foto_kandidat").change(function(){
        var files = this.files[0];
        if (files == undefined) {
            if ($("#foto_sebelum").val() == undefined) {
                // console.log("form tambah");                
                $('#view_gambar').empty();
            }else{
                var image = '<small>Foto Sebelumnya : </small>'+
                '<img class="img-fluid d-block rounded" width="250" src="'+$("#foto_sebelum").val()+'"></img>';
                $('#view_gambar').html(image);
            }
        }else{
            if ($(this).parsley().isValid()) {
                if (!/\.(jpe?g|png|gif)$/i.test(files.name)) {
                    return alert(files.name + " is not an image");
                }
                var reader = new FileReader();
                reader.addEventListener("load", function() {
                    $('#view_gambar').empty();
                    var image = '<img class="img-fluid d-block rounded" width="250" src="'+this.result+'" title="'+files.name+'" alt="'+files.name+'"></img>'
                    $('#view_gambar').html(image);
                    // console.log(this);
                });
        
                reader.readAsDataURL(files);
            }
        }
    })

    function get_pemilihan_form(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'kandidat/getpemilihan/'+id,
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#pemilihan").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih Pemilihan</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_pemilihan+'">'+params[i].nama_pemilihan+'</option>';
                        }
                        $('#pemilihan').html(drp_down);
                        $("#pemilihan").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada pemilihan</option>';
                        $('#pemilihan').html(drp_down);
                        $("#pemilihan").attr('disabled',true);
                        $("#no_urut").attr('disabled',true);
                    }
                }
            });	
        }else{
            var drp_down = '<option value="">Pilih Pemilihan</option>';
            $('#pemilihan').html(drp_down);
            $("#pemilihan").attr('disabled',true);
            $("#no_urut").attr('disabled',true);
        }
    }
});