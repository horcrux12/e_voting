<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bilik extends MY_Controller {

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
        $this->load->model('bilik/m_bilik');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_bilik->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'bilik/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_bilik.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data Bilik";

		$data_kegiatan = $this->m_dinamic->getData('kegiatan')->result_array();
		$data_tps = $this->m_dinamic->getData('admin_tps')->result_array();
		
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		$page_content["data"]["tps"] = $data_tps;

		$this->templates->pageTemplates($page_content);
	}

	public function get_bilik($id){
		if ($id != 0) {
			$data = $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$id)->result_array();
		}else{
			$data = $this->m_dinamic->getData ('admin_tps')->result_array();
		}
		echo json_encode($data);
	}

	public function tambah()
	{
		$page_content["page"] = 'bilik/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-bilik.init.js"></script>';

		$page_content["title"] = "Tambah Data Bilik Suara";
		$data = $this->m_dinamic->getData('kegiatan')->result_array();
		$page_content["data"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'bilik/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-bilik.init.js"></script>';

		$page_content["title"] = "Edit Bilik";
		
		$data_bilik 	= $this->m_dinamic->getWhere('user_bilik','id_bilik',$id)->result_array();
		$data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$data_bilik[0]['id_kegiatan'])->result_array();
		$data_kegiatan 	= $this->m_dinamic->getData('kegiatan')->result_array();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["bilik"] = $data_bilik;
		$page_content["data"]["tps"] = $data_tps;
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$input = $this->input->post();

		$where_tps = $input['tps'];

		$data_bilik = array(
			'nama'			=> $this->input->post('nama_bilik'),
			'username'		=> $this->input->post('username'),
			'password'		=> md5($this->input->post('password')),
			'no_bilik'		=> $this->input->post('no_bilik'),
			'id_kegiatan'	=> $this->input->post('kegiatan'),
			'id_tps'		=> $this->input->post('tps'),
		);

		$last_jumlah_bilik = $this->m_dinamic->getWhere ('admin_tps','id_tps',$where_tps)->result_array();
		$data_tps = array(
			'jumlah_bilik' 		=> $last_jumlah_bilik[0]['jumlah_bilik'] + 1
		);
		
		$save_bilik 			= $this->m_bilik->store('user_bilik',$data_bilik);
		$update_tps				= $this->m_dinamic->update_data('id_tps',$where_tps, $data_tps,'admin_tps');

		if ($save_bilik) {
			if ($update_tps) {
				echo "<script>
					alert('Data Berhasil ditambah');
					window.location.href='".base_url('bilik')."';
					</script>";
			}else{
				echo "<script>
				alert('Data Kegiatan Gagal ditambah');
				window.history.back();
				</script>";
			}
		}else{
			echo "<script>
			alert('Data Gagal ditambah');
			window.history.back();
			</script>";
		}
	}

	public function update(){
		$input = $this->input->post();
		$where = $input['id_bilik'];

		$data_bilik = array(
			'nama'			=> $input['nama_bilik'],
			'username'		=> $input['username'],
			'password'		=> md5($input['password']),
			'no_bilik'		=> $input['no_bilik'],
			'id_kegiatan'	=> $input['kegiatan'],
			'id_tps'		=> $input['tps'],
		);

		$input_bilik = $this->m_dinamic->update_data('id_bilik',$where,$data_bilik,'user_bilik');

		if ($input_bilik) {
			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('bilik')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}

		// echo "<pre>";
		// print_r($input);
		// echo "</pre>";
	}

	public function drop($id){
		
		$data_bilik		= $this->m_dinamic->getWhere ('user_bilik','id_bilik',$id)->result_array();
		$delete_bilik 	= $this->m_dinamic->delete_data('user_bilik','id_bilik',$id);
		
		$where_tps = $data_bilik[0]['id_tps']; 
		$last_jumlah_tps = $this->m_dinamic->getWhere ('admin_tps','id_tps',$where_tps)->result_array();
		$data_tps = array(
			'jumlah_bilik' 		=> $last_jumlah_tps[0]['jumlah_bilik'] - 1
		);
		
		
		if ($delete_bilik) {
			$delete_tps = $this->m_dinamic->update_data('id_tps',$where_tps, $data_tps,'admin_tps');
			if ($delete_tps) {
				echo "<script>
				alert('Data Berhasil dihapus');
				window.location.href='".base_url('bilik')."';
				</script>";
			}else{
				echo "<script>
				alert('Data Gagal dihapus');
				window.history.back();
				</script>";
			}
		}else {
			echo "<script>
			alert('Data Gagal dihapus');
			window.history.back();
			</script>";
		}
	}

	public function checkbilik($id){
		$username = $this->input->post('username');
		// $username = $a;
		if (isset($username)) {
			if ($id == 0) {
				$ini = $this->m_bilik->validate($username);
				if($ini->num_rows() == 0)
				{
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}
			}else{
				$isi = $this->m_dinamic->getWhere ('user_bilik','id_bilik',$id)->result_array();
				if ($username != $isi[0]['username']) {
					$ini = $this->m_bilik->validate($username);
					if($ini->num_rows() == 0)
					{
						$output = array(
							'success' => true
						);
						echo json_encode($output);
					}
				}else{
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}
			}
		}		
	}

	public function checknobilik($id){
		$no_bilik = $this->input->post('nobilik');
		$id_tps = $id;
		$id_bilik = $this->input->post('id');
		// $username = $a;
		if (isset($no_bilik)) {
			if (isset($id_bilik)) {
				$isi = $this->m_dinamic->getWhere ('user_bilik','id_bilik',$id_bilik)->result_array();
				if ($no_bilik != $isi[0]['no_bilik']) {
					$ini = $this->m_bilik->validate_no($id_tps,$no_bilik);
					if($ini->num_rows() == 0)
					{
						$output = array(
							'success' => true
						);
						echo json_encode($output);
					}
				}else{
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}
			}else{
				$ini = $this->m_bilik->validate_no($id_tps,$no_bilik);
				if($ini->num_rows() == 0)
				{
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}
			}
		}
	}	
}
