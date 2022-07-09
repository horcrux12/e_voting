<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        parent::__construct();
        $this->load->model('dashboard/m_dashboard');
    }
	
	 public function index(){

		if ($this->session->userdata('level_admin') == 1) {
			$page_content["page"] = 'dashboard/v_dashboard_admin';
		}else{
			$page_content["page"] = 'dashboard/v_dashboard';
		}
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
			<style>
				.disabled{
					cursor: not-allowed;
				}
			</style>';
		$page_content["js"] = '
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.time.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.resize.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.pie.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
			<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.selection.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script src="'.base_url().'assets/js/pages/dashboard_2.init.js"></script>
			<script src="'.base_url().'assets/js/dashboard.js"></script>';
		$page_content["title"] = "Dashboard";
		
		if ($this->session->userdata('level_admin') == 1) {
			$page_content["data"] = '';
		
		}else{
			if ($this->session->userdata('id_jenis') == 1) {
				$jumlah_pemilih			= $this->m_dashboard->get_tps_umum($this->session->userdata('id_login'));
				$jumlah_belum_memilih	= $this->m_dashboard->get_tps_free_umum($this->session->userdata('id_login'));
				$bilik					= $this->m_dashboard->get_bilik_umum($this->session->userdata('id_login'))->result_array();
			}else{
				$jumlah_pemilih			= $this->m_dashboard->get_tps_pelajar($this->session->userdata('id_login'));
				$jumlah_belum_memilih	= $this->m_dashboard->get_tps_free_pelajar($this->session->userdata('id_login'));
				$bilik					= $this->m_dashboard->get_bilik_pelajar($this->session->userdata('id_login'))->result_array();
			}
			$kegiatan	= $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
			$tps		= $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
			
			$page_content["data"]['pemilih'] 		= $jumlah_pemilih;
			$page_content["data"]['belum_memilih'] 	= $jumlah_belum_memilih;
			$page_content["data"]['bilik']		 	= $bilik;
			$page_content["data"]['kegiatan']		= $kegiatan[0];
			$page_content["data"]['tps']			= $tps[0];
		}
		// print_r($bilik);
		$this->templates->pageTemplates($page_content);
	}

	public function detail(){
		if ($this->session->userdata('level_admin') != 2) {
            show_404();
        }
		$page_content["page"] 	= 'dashboard/detail-kegiatan';
		$page_content["css"] 	= '';
		$page_content["js"] 	= '';
		$page_content["title"] 	= "Detail Kegiatan";

		$data_tps 			= $this->m_dashboard->get_tps_data($this->session->userdata('id_login'))->result_array();
		$data_pemilihan 	= $this->m_dinamic->getWhere ('pemilihan','id_kegiatan',$data_tps[0]['id_kegiatan'])->result_array();
		
		$page_content["data"]["tps"] 		= $data_tps;
		$page_content["data"]["pemilihan"] 	= $data_pemilihan;
		
		// print_r($data_pemilihan);

		$this->templates->pageTemplates($page_content);
	}

	public function tambah_waktu(){
		if ($this->session->userdata('level_admin') != 2) {
            show_404();
		}
		
		$data['tps'] 			= $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
		$data['kegaiatan'] 		= $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();

		if (!isset($data['tps'][0]['tambahan_waktu'])) {
			$tengat = $data['kegaiatan'][0]['end_date'];
		}else{
			$tengat = $data['tps'][0]['tambahan_waktu'];
		}
		// $tengat =  date();

		// print_r($tengat);

		$page_content["page"] 	= 'dashboard/tambah-waktu';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/bootstrap-datetimepicker/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css"/>';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>
			<script src="'.base_url().'assets/libs/jquery-validation/jquery.validate.min.js"></script>
			<script type="text/javascript">

				$(function () {
					$(\'#wizard-validation-form\').validate({
						ignore:"",
						rules :{
							tambah_tanggal :{
								required: true
							}
						},
						messages:{
							tambah_tanggal:{
								required: "Pilih waktu terlebih dahulu"
							}
						}
					});

					$(\'#datetimepicker13\').datetimepicker({
						defaultDate: moment("'.$tengat.'"),
						useCurrent: false,
						inline: true,
						sideBySide: true,
						format: \'dddd, MMMM Do YYYY, HH:mm\',
						
					});
					
					$(\'a[title="Increment Hour"]\').css(\'color\',\'#797979\');
					$(\'a[title="Increment Minute"]\').css(\'color\',\'#797979\');
					$(\'a[title="Decrement Hour"]\').css(\'color\',\'#797979\');
					$(\'a[title="Decrement Minute"]\').css(\'color\',\'#797979\');
					
					$(\'#datetimepicker13\').on(\'change.datetimepicker\', function (e) {
						$(\'#tambah_tanggal\').val(moment(e.date).format(\'YYYY-MM-DD HH:mm:ss\'));
						// console.log($(\'#tambah_tanggal\').val());
					});

					$(\'#datetimepicker13\').datetimepicker(\'minDate\', moment("'.$tengat.'"));
				});
			</script>';
		$page_content["title"] 	= "Tambah Waktu Kegiatan";
		
		$page_content["data"]	= '';
		
		// print_r($data_pemilihan);

		$this->templates->pageTemplates($page_content);
	}

	public function store_waktu(){
		$input 	= $this->input->post();
		$update = array(
			'tambahan_waktu' => $input['tambah_tanggal']
		);
		$up		= $this->m_dinamic->update_data('id_tps',$this->session->userdata('id_login'),$update,'admin_tps');
		if ($up) {
			echo "<script>
			alert('Waktu berhasil ditambah');
			window.location.href='".base_url('dashboard')."';
			</script>";
		}else{
			echo "<script>
			alert('Waktu gagal ditambah');
			window.history.back();
			</script>";
		}
		// print_r($input);
	}

	public function limit(){
		$data['kegiatan'] 		= $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
		if ($data['kegiatan'][0]['id_jenis'] == 2) {
			$data['bilik'] 		= $this->m_dashboard->get_bilik_pelajar ($this->session->userdata('id_login'))->result_array();
		}else{
			$data['bilik'] 		= $this->m_dashboard->get_bilik_umum ($this->session->userdata('id_login'))->result_array();
		}
		$data['tps'] 			= $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
		echo json_encode($data);
	}
}
