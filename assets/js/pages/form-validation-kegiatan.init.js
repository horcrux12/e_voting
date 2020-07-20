$(document).ready(function() {
    $("form").parsley();
        
    $("#tanggal_kegiatan").daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        locale: {
          format: 'MM/DD/YYYY HH:mm'
        }
      });
});