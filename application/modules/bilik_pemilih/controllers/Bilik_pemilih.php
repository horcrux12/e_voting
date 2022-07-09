<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilik_pemilih extends MY_Controller {

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
        $this->load->model('bilik_pemilih/m_bilik_pemilih_pelajar');
        $this->load->model('bilik_pemilih/m_bilik_pemilih_umum');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		if ($this->session->userdata('id_jenis') == 1) {
			$data = $this->m_bilik_pemilih_umum->get_datatables($postData);
		}else{
			$data = $this->m_bilik_pemilih_pelajar->get_datatables($postData);
		}

		echo json_encode($data);
    }

	public function table($id)
	{
		if ($this->session->userdata('id_jenis') == 1) {
			$page_content["page"] 	= 'bilik_pemilih/tables_umum';
			$datatables 			= 'assets/js/menu_bilik_pemilih_umum.js?v='.rand();
		}else{
			$page_content["page"] 	= 'bilik_pemilih/tables_pelajar';
			$datatables 			= 'assets/js/menu_bilik_pemilih_pelajar.js';

		}
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url($datatables).'"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		
		if ($this->session->userdata('id_jenis') == 1) {
			$page_content["title"] 	= "Data Pemilih Umum";
		}else{
			$page_content["title"] 	= "Data Pemilih Pelajar";
		}
		$page_content["data"] 	= $id;

		$this->templates->pageTemplates($page_content);
	}

	public function isibilik(){
		// print_r($this->input->post());
		$input 			= $this->input->post();
		
		$data_bilik 	= array(
			'id_pemilih'	=> $input['identitas']
		);
		$data_pemilih 	= array(
			'status'		=> 2
		); 

		
		$input_bilik 	= $this->m_dinamic->update_data('id_bilik',$input['id_bilik'],$data_bilik,'user_bilik');
		if ($this->session->userdata('id_jenis') == 1) {
			$input_pemilih 	= $this->m_dinamic->update_data('no_identitas',$input['identitas'],$data_pemilih,'data_pemilih_umum');
		}else{
			$input_pemilih 	= $this->m_dinamic->update_data('no_identitas',$input['identitas'],$data_pemilih,'data_pemilih_pelajar');
		}

		// print_r($input_pemilih);

		if ($input_bilik) {
			if ($input_pemilih) {
				echo "<script>
				alert('Berhasil mengatur pemilih');
				window.location.href='".base_url('dashboard')."';
				</script>";
			}else{
				echo "<script>
				alert('Gagal mengatur pemilih');
				window.history.back();
				</script>";
			}
		}else{
			echo "<script>
			alert('Gagal mengatur pemilih');
			window.history.back();
			</script>";
		}


	}

	public function get_pemilih_pelajar($id){
		if ($id != 0) {
			$data = $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$id)->result_array();
		}else{
			$data = $this->m_pemilih_pelajar->get_tps_pelajar ()->result_array();
		}
		echo json_encode($data);
	}

	public function tambah()
	{
		$page_content["page"] = 'pemilih_pelajar/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilih_pelajar.init.js"></script>';

		$page_content["title"] = "Tambah Data Pemilih Pelajar";
		$data = $this->m_dinamic->getWhere('kegiatan','id_jenis',2)->result_array();
		$page_content["data"] = $data;

		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'pemilih_pelajar/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilih_pelajar.init.js"></script>';

		$page_content["title"] = "Edit Pemilih Pelajar";
		
		$data_identitas = $this->m_dinamic->getWhere('data_pemilih_pelajar','no_identitas',$id)->result_array();
		$data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$data_identitas[0]['id_kegiatan'])->result_array();
		$data_kegiatan 	= $this->m_dinamic->getWhere('kegiatan','id_jenis',2)->result_array();

		// echo "<pre>";
		// print_r($data_identitas);
		// echo "</pre>";
		
		$page_content["data"]["pemilih"] = $data_identitas;
		$page_content["data"]["tps"] = $data_tps;
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}	
}
