<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih_umum extends MY_Controller {

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
        $this->load->model('pemilih_umum/m_pemilih_umum');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_pemilih_umum->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'pemilih_umum/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_pemilih_umum.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		if ($this->session->userdata('level_admin') == 1) {
			$page_content["title"] 	= "Data Pemilih Umum";
		}else{
			$page_content["title"] 	= "Data Pemilih";
		}

		if ($this->session->userdata('level_admin') == 1) {
			$data_kegiatan	= $this->m_dinamic->getWhere('kegiatan','id_jenis',1)->result_array();
			$data_tps 		= '';
		}else{
			$data_kegiatan	= $this->m_dinamic->getWhere('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
			$data_tps 		= $this->m_dinamic->getWhere('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
		}
		
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		$page_content["data"]["tps"] = $data_tps;

		$this->templates->pageTemplates($page_content);
	}

	public function get_pemilih_umum($id){
		if ($id != 0) {
			$data = $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$id)->result_array();
		}else{
			$data = $this->m_pemilih_umum->get_tps_umum ()->result_array();
		}
		echo json_encode($data);
	}

	public function tambah()
	{
		$page_content["page"] = 'pemilih_umum/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilih_umum.init.js"></script>';

		$page_content["title"] = "Tambah Data Pemilih Umum";
		// $data = $this->m_dinamic->getWhere('kegiatan','id_jenis',1)->result_array();

		if ($this->session->userdata('level_admin') == 1) {
			$data 		= $this->m_dinamic->getWhere('kegiatan','id_jenis',1)->result_array();
			$data_tps 	= '';
		}else{
			$data 		= $this->m_dinamic->getWhere('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
			$data_tps 	= $this->m_dinamic->getWhere('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
		}

		$page_content["data"]["kegiatan"] 	= $data;
		$page_content["data"]["tps"] 		= $data_tps;

		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'pemilih_umum/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilih_umum.init.js"></script>';

		$page_content["title"] = "Edit Bilik";
		
		$data_identitas = $this->m_dinamic->getWhere('data_pemilih_umum','no_identitas',$id)->result_array();
		// $data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$data_identitas[0]['id_kegiatan'])->result_array();
		// $data_kegiatan 	= $this->m_dinamic->getWhere('kegiatan','id_jenis',1)->result_array();
		if ($this->session->userdata('level_admin') == 1) {
			$data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$data_identitas[0]['id_kegiatan'])->result_array();
			$data_kegiatan 	= $this->m_dinamic->getWhere('kegiatan','id_jenis',1)->result_array();
		}else{
			$data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_login'))->result_array();
			$data_kegiatan 	= $this->m_dinamic->getWhere('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["pemilih"] = $data_identitas;
		$page_content["data"]["tps"] = $data_tps;
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$input = $this->input->post();

		$last_no_urut 	= $this->m_pemilih_umum->last_no_urut( $input['kegiatan'], $input['tps']);
		$jumlah			= count($last_no_urut);
		if ($jumlah == 0) {
			$no_urut = 1;
		}elseif ($jumlah > 0) {
			for ($i=0; $i < $jumlah + 1; $i++) { 
				$no[] = $i + 1;
			}
			foreach ($last_no_urut as $key) {
				for ($i=0; $i < count($no); $i++) { 
					if ($no[$i] == $key['no_urut']) {
						unset($no[$i]);
					}
				}
			}
			foreach ($no as $u) {
				$no_urut = $u;
			}
		}

		// $where_tps = $input['tps'];

		$data_pemilih_umum = array(
			'no_identitas'		=> $input['no_identitas'],
			'no_kk'				=> $input['no_kk'],
			'nama'				=> $input['nama'],
			'gender'			=> $input['gender'],
			'tempat_lahir'		=> $input['tempat_lahir'],
			'tanggal_lahir'		=> nice_date($input['tanggal_lahir'],'Y-m-d'),
			'alamat'			=> $input['alamat'],
			'provinsi'			=> $input['provinsi'],
			'kecamatan'			=> $input['kecamatan'],
			'kab_kot'			=> $input['kab_kot'],
			'desa_kelurahan'	=> $input['desa_kel'],
			'no_urut'			=> $no_urut,
			'status'			=> 1,
			'pekerjaan'			=> $input['pekerjaan'],
			'id_kegiatan'		=> $input['kegiatan'],
			'id_tps'			=> $input['tps']
		);

		// print_r($data_pemilih_umum);
		
		$save_pemilih_umum 		= $this->m_pemilih_umum->store('data_pemilih_umum',$data_pemilih_umum);

		if ($save_pemilih_umum) {
			echo "<script>
			alert('Data Berhasil ditambah');
			window.location.href='".base_url('pemilih_umum')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal ditambah');
			window.history.back();
			</script>";
		}
	}

	public function update(){
		$input 		= $this->input->post();
		$where 		= $input['id_identitas'];
		$prev_data	= $this->m_dinamic->getWhere ('data_pemilih_umum','no_identitas',$where)->result_array();

		if ($input['tps'] == $prev_data[0]['id_tps']) {
			$data_pemilih = array(
				'no_identitas'		=> $input['no_identitas'],
				'no_kk'				=> $input['no_kk'],
				'nama'				=> $input['nama'],
				'gender'			=> $input['gender'],
				'tempat_lahir'		=> $input['tempat_lahir'],
				'tanggal_lahir'		=> nice_date($input['tanggal_lahir'],'Y-m-d'),
				'alamat'			=> $input['alamat'],
				'provinsi'			=> $input['provinsi'],
				'kecamatan'			=> $input['kecamatan'],
				'kab_kot'			=> $input['kab_kot'],
				'desa_kelurahan'	=> $input['desa_kel'],
				'pekerjaan'			=> $input['pekerjaan'],
				'id_kegiatan'		=> $input['kegiatan'],
				'id_tps'			=> $input['tps']
			);
		}else{

			$last_no_urut 	= $this->m_pemilih_umum->last_no_urut( $input['kegiatan'], $input['tps']);
			$jumlah			= count($last_no_urut);
			if ($jumlah == 0) {
				$no_urut = 1;
			}elseif ($jumlah > 0) {
				for ($i=0; $i < $jumlah + 1; $i++) { 
					$no[] = $i + 1;
				}
				foreach ($last_no_urut as $key) {
					for ($i=0; $i < count($no); $i++) { 
						if ($no[$i] == $key['no_urut']) {
							unset($no[$i]);
						}
					}
				}
				foreach ($no as $u) {
					$no_urut = $u;
				}
			}

			$data_pemilih = array(
				'no_identitas'		=> $input['no_identitas'],
				'no_kk'				=> $input['no_kk'],
				'nama'				=> $input['nama'],
				'gender'			=> $input['gender'],
				'tempat_lahir'		=> $input['tempat_lahir'],
				'tanggal_lahir'		=> nice_date($input['tanggal_lahir'],'Y-m-d'),
				'alamat'			=> $input['alamat'],
				'provinsi'			=> $input['provinsi'],
				'kab_kot'			=> $input['kab_kot'],
				'desa_kelurahan'	=> $input['desa_kel'],
				'no_urut'			=> $no_urut,
				'status'			=> 1,
				'pekerjaan'			=> $input['pekerjaan'],
				'id_kegiatan'		=> $input['kegiatan'],
				'id_tps'			=> $input['tps']
			);
		}

		$input_pemilih_umum = $this->m_dinamic->update_data('no_identitas',$where,$data_pemilih,'data_pemilih_umum');

		if ($input_pemilih_umum) {
			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('pemilih_umum')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}
	}

	public function drop($id){
		
		// $data_pemilih_umum		= $this->m_dinamic->getWhere ('user_pemilih_umum','id_pemilih_umum',$id)->result_array();
		$delete_pemilih_umum 	= $this->m_dinamic->delete_data('data_pemilih_umum','no_identitas',$id);
		
		
		if ($delete_pemilih_umum) {
			echo "<script>
			alert('Data Berhasil dihapus');
			window.location.href='".base_url('pemilih_umum')."';
			</script>";
		}else {
			echo "<script>
			alert('Data Gagal dihapus');
			window.history.back();
			</script>";
		}
	}

	public function check_pemilih_umum(){
		$indentitas = $this->input->post('no_identitas');
		$last_identitas = $this->input->post('id');
		// $username = $a;
		if (isset($indentitas)) {
			if (isset($last_identitas)) {
				if ($last_identitas == $indentitas) {
					$output = array(
						'success' => true
					);
					echo json_encode($output);
				}else{
					$ini = $this->m_pemilih_umum->validate($indentitas);
					if($ini->num_rows() == 0)
					{
						$output = array(
							'success' => true
						);
						echo json_encode($output);
					}
				}
			}else{
				$ini = $this->m_pemilih_umum->validate($indentitas);
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