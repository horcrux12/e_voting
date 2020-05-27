$(document).ready(function(){
    $("#shown").on('click',function() {
        var $pwd = $("#inputPassword");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });

    // $("#user_datatable").DataTable({
    //     lengthMenu: [[10, 25, 60, -1], [10, 25, 60, "All"]],
	// 	cahce: false
    // });

    // $.ajax({
    //     method : 'POST',
    //     url : baseurl+'menu-user',
    //     dataType : 'JSON',
    //     success: function(param){
    //         console.log(param)
    //     }
    //  });

    var userDataTable = $('#user_datatable').DataTable({
        oLanguage: {
			sSearch: 'Cari Pemilih:'
		  },
		processing : true,
		serverSide: true,
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'atur-bilik/server-side',
			data: function(data){
				
			}
		},
        columns: [
            { data: 'no_identitas' },
            { data: 'nama' },
            { data: 'gender'},
            { data: 'ttl', orderable : false},
            { data: 'asal_sekolah'},
            { data: 'kelas_fakultas' },
            { data: 'jurusan' },
            { data: 'no_urut'},
            { data: 'nama_tps'},
            { data: 'no_bilik'},
            { data: 'status'},
            { data: 'action', orderable : false },
        ],
        order : [[8, 'asc'],[7,'asc']]
     });

     $('#filter_kegiatan').change(function(){
        let id = $(this).val();
        getTPS(id);
        $('#filter_tps').val('');
        userDataTable.draw();
     });
     $('#filter_tps').change(function(){
        userDataTable.draw();
       //  console.log($(this).val())
    });

    $('#user_datatable tbody').delegate('.button','click',function(){
        $('#identitas').val($(this).data('id'));
        var id      = $(this).data('id');
        var nama    = $(this).data('nama');
        // alert($('#identitas').val());
        if (confirm("Anda memilih "+nama+"("+id+") Apakah Anda yakin ??")) {
            $('#form_isi').submit();
        }
    })

    function getTPS(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'pemilih_pelajar/getpemilih_pelajar/'+id,
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#filter_tps").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih TPS</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_tps+'">'+params[i].nama+'</option>';
                        }
                        $('#filter_tps').html(drp_down);
                        $("#filter_tps").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada TPS</option>';
                        $('#filter_tps').html(drp_down);
                        $("#filter_tps").attr('disabled',true);
                    }
                    
                }
            })	
        }else{
            $.ajax({
                type: 'POST',
                url: baseurl+'pemilih_pelajar/getpemilih_pelajar/0',
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#filter_tps").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih TPS</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_tps+'">'+params[i].nama+'</option>';
                        }
                        $('#filter_tps').html(drp_down);
                        $("#filter_tps").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada TPS</option>';
                        $('#filter_tps').html(drp_down);
                        $("#filter_tps").attr('disabled',true);
                    }
                    
                }
            })	
        }
        
    }

});