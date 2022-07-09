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
			sSearch: 'Cari Bilik:'
		  },
		processing : true,
		serverSide: true,
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'bilik/server-side',
			data: function(data){
				data.filterKegiatan = $('#filter_kegiatan').val();
				data.filterTps = $('#filter_tps').val();
			}
		},
        columns: [
            { data: 'nama_kegiatan' },
            { data: 'nama_tps' },
            { data: 'nama_bilik' },
            { data: 'username' },
            { data: 'no_bilik'},
            { data: 'action', orderable : false },
        ]
     });

     $('#filter_kegiatan').on('change',function(){
        let id = $(this).val();
        getTPS(id);
        $('#filter_tps').val('');
        userDataTable.draw();
     });
     
     $('#filter_tps').on('change',  function(){
        userDataTable.draw();
       //  console.log($(this).val())
    });

    function getTPS(id){
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: baseurl+'bilik/gettps/'+id,
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
                url: baseurl+'panitia/gettps/0',
                dataType: 'JSON',
                beforeSend: function(){
                    $("#loader").show();
                    $("#filter_tps").attr('disabled',true);
                },
                success: function(params) {
                    $("#loader").hide();
                    $("#filter_tps").attr('disabled',false);
                    var drp_down = '';
                    if (params.length > 0) {
                        drp_down += '<option value="">Pilih TPS</option>';
                        for (let i = 0; i < params.length; i++) {
                            drp_down += '<option value="'+params[i].id_tps+'">'+params[i].nama+'</option>';
                        }
                        $('#filter_tps').html(drp_down);
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