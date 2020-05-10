$(document).ready(function() {

    $("form").parsley();

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
        });

    let cek = $("#id_kandidat").val();
    if (cek !=undefined ) {
        let last_id = $("#kegiatan").find('option:selected').val();
        window.ParsleyValidator.addValidator("checkno_kandidat",{
            validateString: function(value)
            {
                return $.ajax({
                    url: baseurl+"kandidat/check-no/"+last_id,
                    method: "POST",
                    data: {nokandidat:value, id:cek},
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        return true;
                    }
                })
            }
        });
        
        $("#kegiatan").on("change",function(){
            let id = $(this).val();
            if (id != last_id) {
                window.ParsleyValidator.addValidator("checkno_kandidat",{
                    validateString: function(value)
                    {
                        return $.ajax({
                            url: baseurl+"kandidat/check-no/"+id,
                            method: "POST",
                            data: {nokandidat:value},
                            dataType: "JSON",
                            success: function(data){
                                return true;
                            }
                        })
                    }
                });
            }else{
                window.ParsleyValidator.addValidator("checkno_kandidat",{
                    validateString: function(value)
                    {
                        return $.ajax({
                            url: baseurl+"kandidat/check-no/"+id,
                            method: "POST",
                            data: {nokandidat:value, id:cek},
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
            window.ParsleyValidator.addValidator("checkno_kandidat",{
                validateString: function(value)
                {
                    return $.ajax({
                        url: baseurl+"kandidat/check-no/"+id,
                        method: "POST",
                        data: {nokandidat:value},
                        dataType: "JSON",
                        success: function(data){
                            return true;
                        }
                    })
                }
            });
        });
    }
});