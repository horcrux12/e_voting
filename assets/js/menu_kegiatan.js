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
			sSearch: 'Cari Kegiatan:'
		  },
		processing : true,
		serverSide: true,
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'kegiatan/server-side',
			data: function(data){
				data.filterJenis = $('#filter_jenis_kegiatan').val();
            }
		},
        columns: [
            { data: 'nama_kegiatan' },
            { data: 'alamat' },
            { data: 'start_date' },
            { data: 'end_date' },
            { data: 'jumlah_tps' },
            { data: 'jumlah_pemilihan'},
            { data: 'nama_jenis' },
            { data: 'action', orderable : false },
        ]
     });

     $('#filter_jenis_kegiatan').change(function(){
         userDataTable.draw();
        //  console.log($(this).val())
     });

     

});