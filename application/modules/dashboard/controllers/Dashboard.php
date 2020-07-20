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
			}else{
				$jumlah_pemilih			= $this->m_dashboard->get_tps_pelajar($this->session->userdata('id_login'));
				$jumlah_belum_memilih	= $this->m_dashboard->get_tps_free_pelajar($this->session->userdata('id_login'));
			}
			$bilik		= $this->m_dashboard->get_bilik($this->session->userdata('id_login'))->result_array();
			$kegiatan	= $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
			
			$page_content["data"]['pemilih'] 		= $jumlah_pemilih;
			$page_content["data"]['belum_memilih'] 	= $jumlah_belum_memilih;
			$page_content["data"]['bilik']		 	= $bilik;
			$page_content["data"]['kegiatan']		= $kegiatan[0];
		}
		
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

	public function limit(){
		$data['bilik'] = $this->m_dinamic->getWhere ('user_bilik','id_tps',$this->session->userdata('id_login'))->result_array();
		$data['kegiatan'] = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
		echo json_encode($data);
	}
}
