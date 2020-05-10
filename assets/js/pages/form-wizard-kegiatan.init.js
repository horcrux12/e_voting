$(document).ready(function(){
    var form = $("#wizard-validation-form");

    $(".limit").each(function(){
        console.log($(this).attr("name"));
        // $(this).on("input",function(){
            
        // })
    });

    $("#datepicker-autoclose-start").datepicker({
        autoclose: !0,
        todayHighlight: !0
    });
    $("#datepicker-autoclose-end").datepicker({
        autoclose: !0,
        todayHighlight: !0
    });
    $("#timepicker-start").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    });
    $("#timepicker-end").timepicker({
        showMeridian: !1,
        icons: {
            up: "mdi mdi-chevron-up",
            down: "mdi mdi-chevron-down"
        }
    });
    form.parsley();

    // form.validate({
    //     errorPlacement: function errorPlacement(error, element) { element.before(error); },
    //     rules: {
    //         usernametps: {
    //             required: true,
    //             maxlength: 15,
    //         },
    //         nama_tps: {
    //             required: true,
    //             maxlength: 30
    //         }
    //     },
    //     messages: {
    //         'usernametps[]': {
    //             remote: "username telah digunakan"
    //         }
    //     }
    // });  

    // let jumlah = 0;
    // $("#tps").on("input",function(){
    //     jumlah = $(this).val();
    //     create_form_tps(jumlah);
    //     // var ini = $("#isi_tps").delegate("#jumlah_bilik1","change",function(){
    //     //     var jumlah_n = $(this).val();
    //     //     console.log(jumlah_n);
    //     // });
    // });

    
    // function create_form_tps(params) {
    //     let isi_form =  '';
    //     for (let i = 0; i < parseInt(params); i++) {
    //         var no = i + 1;

    //         isi_form +='<div class="row">'+
    //         '<div class="col-lg-6">'+
    //             '<label style="font-size: 20px;">Akun TPS '+ no +'</label>'+
    //             '<hr>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="nama_tps'+no+'">Nama TPS<span class="text-danger"> *</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="required form-control" id="nama_tps'+no+'" name="nama_tps[]" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="userNametps'+ no +'">User name <span class="text-danger">*</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="required form-control" id="userNametps'+ no +'" name="usernametps[]" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="passwordtps'+ no +'"> Password <span class="text-danger">*</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input id="passwordtps'+ no +'" name="passwordtps['+ i +']" type="password" class="required form-control">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<div class="offset-lg-2 col-sm-10">'+
    //                     '<div class="checkbox checkbox-primary">'+
    //                         '<input id="checkbox'+no+'" type="checkbox">'+
    //                         '<label for="checkbox'+no+'">'+
    //                             'Show Password'+
    //                         '</label>'+
    //                     '</div>'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="lokasi'+ no +'"> Lokasi TPS '+ no +'<span class="text-danger">*</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<textarea id="lokasi'+ no +'" name="lokasi['+ i +']" class="required form-control" rows="5"></textarea>'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="nomor_tps'+ no +'"> Nomor TPS '+ no +'<span class="text-danger">*</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input id="nomor_tps'+ no +'" name="nomor_tps['+ i +']" type="text" class="required form-control">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="jumlah_bilik'+no+'"> Jumlah Bilik TPS '+ no +'<span class="text-danger">*</span></label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<select id="jumlah_bilik'+no+'" name="jumlah_bilik['+ i +']" class="required form-control">'+
    //                         '<option val="">Pilih Jumlah Bilik</option>'+
    //                         '<option val="1">1</option>'+
    //                         '<option val="2">2</option>'+
    //                         '<option val="3">3</option>'+
    //                         '<option val="4">4</option>'+
    //                         '<option val="5">5</option>'+
    //                         '<option val="6">6</option>'+
    //                         '<option val="7">7</option>'+
    //                     '</select>'+
    //                 '</div>'+
    //             '</div>'+
    //         '</div>'+
    //         '<div class="col-lg-6">'+
    //             '<label style="font-size: 20px;">Kepanitiaan TPS '+ no +'</label>'+
    //             '<hr>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="ketuaTPS'+ no +'">Nama Ketua TPS</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="ketuaTPS'+ no +'" name="ketuaTPS['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota1_'+ no +'">Nama Anggota/staff 1</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota1_'+ no +'" name="anggota1['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota2_'+ no +'">Nama Anggota/staff 2</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota2_'+ no +'" name="anggota2['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota3_'+ no +'">Nama Anggota/staff 3</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota3_'+ no +'" name="anggota3['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota4_'+ no +'">Nama Anggota/staff 4</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota4_'+ no +'" name="anggota4['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota5_'+ no +'">Nama Anggota/staff 5</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota5_'+ no +'" name="anggota5['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota6_'+ no +'">Nama Anggota/staff 6</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota6_'+ no +'" name="anggota6['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //             '<div class="form-group row">'+
    //                 '<label class="col-lg-2 control-label " for="aggota7_'+ no +'">Nama Anggota/staff 7</label>'+
    //                 '<div class="col-lg-10">'+
    //                     '<input class="form-control" id="anggota7_'+ no +'" name="anggota7['+ i +']" type="text">'+
    //                 '</div>'+
    //             '</div>'+
    //         '</div>'+
    //     '</div><br><br>';
    //     }
    //     $("#isi_tps").html(isi_form);          
    // }
    // form.children("div").steps({
    //     headerTag: "h3",
    //     bodyTag: "section",
    //     transitionEffect: "slideLeft",
    //     onStepChanging: function (event, currentIndex, newIndex)
    //     {
    //         if (currentIndex > newIndex)
    //         {
    //             return true;
    //         }else{
    //             form.validate().settings.ignore = ":disabled,:hidden";
    //             return form.valid();
    //         }
            
    //     },
    //     onFinishing: function (event, currentIndex)
    //     {
    //         form.validate().settings.ignore = ":disabled";
    //         return form.valid();
    //     },
    //     onFinished: function (event, currentIndex)
    //     {
    //         form.submit();
    //     }
    // });
});