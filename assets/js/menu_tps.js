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
			sSearch: 'Cari TPS:'
		  },
		processing : true,
		serverSide: true,
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'tps/server-side',
			data: function(data){
				data.filterKegiatan = $('#filter_kegiatan').val();
			}
		},
        columns: [
            { data: 'nama_kegiatan' },
            { data: 'nama' },
            { data: 'lokasi' },
            { data: 'username' },
            { data: 'no_tps' },
            { data: 'jumlah_bilik' },
            { data: 'action', orderable : false },
        ]
     });

     $('#filter_kegiatan').change(function(){
         userDataTable.draw();
        //  console.log($(this).val())
     });

     

});