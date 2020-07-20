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
			sSearch: 'Cari Kandidat:'
		  },
		processing : true,
		serverSide: true,
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'kandidat/server-side',
			data: function(data){
				data.filterKegiatan = $('#filter_kegiatan').val();
				data.filterPemilihan = $('#filter_pemilihan').val();
			}
		},
        columns: [
            { data: 'nama_kegiatan' },
            { data: 'nama_pemilihan' },
            { data: 'nama_kandidat' },
            { data: 'no_urut' },
            { data: 'foto' , orderable : false },
            { data: 'hasil' },
            { data: 'action', orderable : false },
        ]
     });

     $('#filter_kegiatan').change(function(){
        get_pemilihan_form($(this).val());
        $("#filter_pemilihan").val('');
        userDataTable.draw();
        //  console.log($(this).val())
     });

     $('#filter_pemilihan').change(function(){
        userDataTable.draw();
        //  console.log($(this).val())
     });

     function get_pemilihan_form(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'kandidat/getpemilihan/'+id,
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#filter_pemilihan").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Semua Pemilihan</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_pemilihan+'">'+params[i].nama_pemilihan+'</option>';
                        }
                        $('#filter_pemilihan').html(drp_down);
                        $("#filter_pemilihan").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada Pemilihan</option>';
                        $('#filter_pemilihan').html(drp_down);
                        $("#filter_pemilihan").attr('disabled',true);
                    }
                    
                }
            })	
        }else{
            $.ajax({
                type: 'POST',
                url: baseurl+'kandidat/getpemilihan/0',
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#filter_pemilihan").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Semua Pemilihan</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_pemilihan+'">'+params[i].nama_pemilihan+'</option>';
                        }
                        $('#filter_pemilihan').html(drp_down);
                        $("#filter_pemilihan").attr('disabled',false);
                    }else{
                        drp_down += '<option value="">Tidak Ada pemilihan</option>';
                        $('#filter_pemilihan').html(drp_down);
                        $("#filter_pemilihan").attr('disabled',true);
                    }
                    
                }
            })	
        }
        
    }
     

});