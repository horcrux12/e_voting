<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends MY_Controller {

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
        $this->load->model('tps/m_tps');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_tps->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'tps/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_tps.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data TPS";

		$data = $this->m_dinamic->getData('kegiatan')->result_array();
		$page_content["data"] = $data;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// echo "tabel";
		$this->templates->pageTemplates($page_content);
	}

	public function tambah()
	{
		$page_content["page"] = 'tps/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-tps.init.js"></script>';

		$page_content["title"] = "Tambah Data TPS";
		$data = $this->m_dinamic->getData('kegiatan')->result_array();
		$page_content["data"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'tps/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-tps.init.js"></script>';

		$page_content["title"] = "Edit TPS";
		
		$data_tps = $this->m_dinamic->getWhere('admin_tps','id_tps',$id)->result_array();
		$data_kegiatan = $this->m_dinamic->getData('kegiatan')->result_array();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["tps"] = $data_tps;
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$input = $this->input->post();

		$last_id_tps = $this->m_tps->get_last_tps();

		$tps_now = $last_id_tps+1;
		$where_kegiatan = $this->input->post('kegiatan');

		$data_TPS = array(
			'id_tps'		=> $tps_now,
			'nama'			=> $this->input->post('nama_tps'),
			'username'		=> $this->input->post('username'),
			'password'		=> md5($this->input->post('password')),
			'lokasi'		=> $this->input->post('lokasi'),
			'no_tps'		=> $this->input->post('no_tps'),
			'jumlah_bilik'	=> 0,
			'id_kegiatan'	=> $this->input->post('kegiatan'),
		);

		$data_panitia = array(
			'ketua'				=> $this->input->post('ketua'),
			'anggota_staff_1'	=> $this->input->post('anggota_staff_1'),
			'anggota_staff_2'	=> $this->input->post('anggota_staff_2'),
			'anggota_staff_3'	=> $this->input->post('anggota_staff_3'),
			'anggota_staff_4'	=> $this->input->post('anggota_staff_4'),
			'anggota_staff_5'	=> $this->input->post('anggota_staff_5'),
			'anggota_staff_6'	=> $this->input->post('anggota_staff_6'),
			'anggota_staff_7'	=> $this->input->post('anggota_staff_7'),
			'id_kegiatan'		=> $this->input->post('kegiatan'),
			'id_tps'			=> $tps_now
		);

		$last_jumlah_bilik = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$where_kegiatan)->result_array();
		$data_kegiatan = array(
			'jumlah_tps' 		=> $last_jumlah_bilik[0]['jumlah_tps'] + 1
		);
		
		$save_tps 			= $this->m_tps->store('admin_tps',$data_TPS);
		$update_kegiatan	= $this->m_dinamic->update_data('id_kegiatan',$where_kegiatan, $data_kegiatan,'kegiatan');
		$save_panitia 		= $this->m_tps->store('panitia',$data_panitia);

		if ($save_tps) {
			if ($update_kegiatan) {
				if ($save_panitia) {
					echo "<script>
					alert('Data Berhasil ditambah');
					window.location.href='".base_url('tps')."';
					</script>";
				}else {
					echo "<script>
					alert('Data Panitia Gagal ditambah');
					window.history.back();
					</script>";
				}
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
		$where = $input['id_tps'];

		$data_tps = array(
			'nama'			=> $input['nama_tps'],
			'username'		=> $input['username'],
			'password'		=> md5($input['password']),
			'lokasi'		=> $input['lokasi'],
			'no_tps'		=> $input['no_tps'],
			'id_kegiatan'	=> $input['kegiatan'],
		);

		$input_tps = $this->m_dinamic->update_data('id_tps',$where,$data_tps,'admin_tps');

		if ($input_tps) {
			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('tps')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}
	}

	public function drop($id){
		$data_tps = $this->m_dinamic->getWhere ('admin_tps','id_tps',$id)->result_array();
		
		$delete_tps = $this->m_dinamic->delete_data('admin_tps','id_tps',$id);
		$delete_panitia = $this->m_dinamic->delete_data('panitia','id_tps',$id);
		if ($data_tps[0]['jumlah_bilik'] > 0) {
			$delete_bilik = $this->m_dinamic->delete_data('user_bilik','id_tps',$id);
		}

		
		$where_kegiatan = $data_tps[0]['id_kegiatan']; 
		$last_jumlah_tps = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$where_kegiatan)->result_array();
		$data_kegiatan = array(
			'jumlah_tps' 		=> $last_jumlah_tps[0]['jumlah_tps'] - 1
		);
		
		
		if ($delete_tps) {
			if ($delete_panitia) {
				if ($data_tps[0]['jumlah_bilik'] > 0) {
					if ($delete_bilik) {
						$delete_kegiatan = $this->m_dinamic->update_data('id_kegiatan',$where_kegiatan, $data_kegiatan,'kegiatan');
						echo "<script>
						alert('Data Berhasil dihapus');
						window.location.href='".base_url('tps')."';
						</script>";
					}else {
						echo "<script>
						alert('Data Gagal dihapus');
						window.history.back();
						</script>";
					}
				}else{
					$delete_kegiatan = $this->m_dinamic->update_data('id_kegiatan',$where_kegiatan, $data_kegiatan,'kegiatan');
					echo "<script>
					alert('Data Berhasil dihapus');
					window.location.href='".base_url('tps')."';
					</script>";
				}
			}else {
				echo "<script>
				alert('Data Gagal dihapus');
				window.history.back();
				</script>";
			}
		}else{
			echo "<script>
			alert('Data Gagal dihapus');
			window.history.back();
			</script>";
		}
	}

	public function checkTPS($id){
		$username = $this->input->post('username');
		// $username = $a;
		if (isset($username)) {
			if ($id == 0) {
				$ini = $this->m_tps->validate($username);
				if($ini->num_rows() == 0)
				{
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}
			}else{
				$isi = $this->m_dinamic->getWhere ('admin_tps','id_tps',$id)->result_array();
				if ($username != $isi[0]['username']) {
					$ini = $this->m_tps->validate($username);
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

	public function checknoTPS($id){
		$no_tps = $this->input->post('notps');
		$id_tps = $this->input->post('id');
		// $username = $a;
		if (isset($no_tps)) {
			if (isset($id_tps)) {
				$isi = $this->m_dinamic->getWhere ('admin_tps','id_tps',$id_tps)->result_array();
				if ($no_tps != $isi[0]['no_tps']) {
					$ini = $this->m_tps->validate_no($id,$no_tps);
					if($ini->num_rows() == 0)
					{
						$output = array(
							'post' => $no_tps,
						);
						echo json_encode($output);
					}
				}else{
					$output = array(
						'post' => $id_tps,
					);
					echo json_encode($output);
				}
			}else{
				$ini = $this->m_tps->validate_no($id,$no_tps);
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
