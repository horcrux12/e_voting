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
        order : [[ 1, 'desc' ]],
		serverMethod: 'POST',
		ajax : {
            dataType: 'json',
			url: baseurl+'pemilihan/server-side',
			data: function(data){
				data.filterKegiatan = $('#filter_kegiatan').val();
			}
		},
        columns: [
            { data: 'nomor' , orderable : false },
            { data: 'nama_pemilihan' },
            { data: 'nama_kegiatan' },
            { data: 'jumlah_kandidat' },
            { data: 'action', orderable : false },
        ]
     });

     $('#filter_kegiatan').change(function(){
         userDataTable.draw();
        //  console.log($(this).val())
     });

     

});