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
			<link href="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">';
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
			<script src="'.base_url().'assets/js/pages/dashboard_2.init.js"></script>';
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
			$bilik	= $this->m_dashboard->get_bilik($this->session->userdata('id_login'))->result_array();
			
			$page_content["data"]['pemilih'] 		= $jumlah_pemilih;
			$page_content["data"]['belum_memilih'] 	= $jumlah_belum_memilih;
			$page_content["data"]['bilik']		 	= $bilik;
		}
		
		$this->templates->pageTemplates($page_content);
	}

	public function detail(){
		$page_content["page"] 	= 'dashboard/detail-kegiatan';
		$page_content["css"] 	= '';
		$page_content["js"] 	= '';
		$page_content["title"] 	= "Dashboard";

		$data = $this->m_dashboard->get_tps_data($this->session->userdata('id_login'))->result_array();
		$page_content["data"] 	= $data;
		
		$this->templates->pageTemplates($page_content);
	}
}
