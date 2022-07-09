<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('kegiatan/m_kegiatan');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_kegiatan->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'kegiatan/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_kegiatan.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data Kegiatan";

		$data = $this->m_kegiatan->get_jenis_kegiatan();
		$page_content["data"] = $data;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// echo "tabel";
		$this->templates->pageTemplates($page_content);
	}

	public function tambah()
	{
		$page_content["page"] = 'kegiatan/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-kegiatan.init.js"></script>';

		$page_content["title"] = "Tambah Kegiatan";
		$data = $this->m_kegiatan->get_jenis_kegiatan();
		$page_content["data"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'kegiatan/form-edit';
		$page_content["css"] = '
		<link href="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-kegiatan.init.js"></script>';

		$page_content["title"] = "Edit Kegiatan";
		
		$data_kegiatan = $this->m_dinamic->getWhere('kegiatan','id_kegiatan',$id)->result_array();
		$data_jenis = $this->m_kegiatan->get_jenis_kegiatan();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		$page_content["data"]["jenis"] = $data_jenis;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$last_id_kegiatan = $this->m_kegiatan->get_last_kegiatan();
		// $last_id_tps = $this->m_kegiatan->get_last_tps();
		$tanggal 	= $this->input->post('tanggal_kegiatan');
		$tgl		= explode("-",$tanggal);


		$kegiatan_now = $last_id_kegiatan + 1;
		$tanggal_mulai = nice_date($tgl[0],'Y-m-d H:i:s');
		$tanggal_akhir = nice_date($tgl[1],'Y-m-d H:i:s');

		$data_Kegiatan = array(
			'id_kegiatan' 		=> $kegiatan_now,
			'nama_kegiatan' 	=> $this->input->post('nama_kegiatan'),
			'alamat' 			=> $this->input->post('alamat_kegiatan'),
			'start_date'		=> $tanggal_mulai,
			'end_date'			=> $tanggal_akhir,
			'jumlah_tps'		=> 0,
			'jumlah_pemilihan'	=> 0,
			'id_jenis'			=> $this->input->post('jenis_kegiatan')
		);

		// echo "<pre>";
		// print_r($data_Kegiatan);
		// echo "</pre>";

		// $data_tps = [];
		// $data_bilik = [];
		// $data_panitia = [];

		// for ($i=0; $i < $this->input->post('jumlah__tps'); $i++) { 
		// 	// Data TPS
		// 	$tps_now = $tps_now + 1;
		// 	$datas ['id_tps'] 			= $tps_now;
		// 	$datas ['nama'] 			= $this->input->post('nama_tps['.$i.']');
		// 	$datas ['username'] 		= $this->input->post('usernametps['.$i.']');
		// 	$datas ['password'] 		= md5($this->input->post('passwordtps['.$i.']'));
		// 	$datas ['lokasi'] 			= $this->input->post('lokasi['.$i.']');
		// 	$datas ['no_tps'] 			= $this->input->post('nomor_tps['.$i.']');
		// 	$datas ['jumlah_bilik'] 	= $this->input->post('jumlah_bilik['.$i.']');
		// 	$datas ['id_kegiatan'] 		= $kegiatan_now;

		// 	// Data Panitia
		// 	$data_p ['ketua']			= $this->input->post('ketuaTPS['.$i.']');
		// 	$data_p ['anggota_staff_1']	= $this->input->post('anggota1['.$i.']');
		// 	$data_p ['anggota_staff_2']	= $this->input->post('anggota2['.$i.']');
		// 	$data_p ['anggota_staff_3']	= $this->input->post('anggota3['.$i.']');
		// 	$data_p ['anggota_staff_4']	= $this->input->post('anggota4['.$i.']');
		// 	$data_p ['anggota_staff_5']	= $this->input->post('anggota5['.$i.']');
		// 	$data_p ['anggota_staff_6']	= $this->input->post('anggota6['.$i.']');
		// 	$data_p ['anggota_staff_7']	= $this->input->post('anggota7['.$i.']');
		// 	$data_p ['id_kegiatan']		= $kegiatan_now;
		// 	$data_p ['id_tps']			= $datas ['id_tps'];

		// 	for ($j=0; $j < $datas ['jumlah_bilik']; $j++) { 
				
		// 		$no_bil = $j+1;
		// 		// Data Bilik
		// 		$data_b ['nama']		= $datas ['nama']." Bilik ".$no_bil;
		// 		$data_b ['username']	= $datas ['username']."_bilik_".$no_bil;
		// 		$data_b ['password']	= $datas ['password'];
		// 		$data_b ['id_pemilih']	= null;
		// 		$data_b ['no_bilik']	= "0".$no_bil;
		// 		$data_b ['id_tps']		= $datas ['id_tps'];
		// 		$data_b ['id_kegiatan']	= $kegiatan_now;

				
		// 		$data_bilik[] 	= $data_b;
		// 	}

		// 	$data_panitia[] 	= $data_p;
		// 	$data_tps[] 		= $datas;
		// }

		$save_kegiatan 	= $this->m_kegiatan->store('kegiatan',$data_Kegiatan);
		// $save_tps 		= $this->m_kegiatan->store_batch('admin_tps',$data_tps);
		// $save_panitia 	= $this->m_kegiatan->store_batch('panitia',$data_panitia);
		// $save_bilik 	= $this->m_kegiatan->store_batch('user_bilik',$data_bilik);

		if ($save_kegiatan) {
			echo "<script>
			alert('Data Berhasil ditambah');
			window.location.href='".base_url('kegiatan')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal ditambah');
			window.history.back();
			</script>";
		}
	}

	public function update(){
		$data = $this->input->post();
		
		$tanggal 	= $this->input->post('tanggal_kegiatan');
		$tgl		= explode("-",$tanggal);

		$tanggal_mulai 	= nice_date($tgl[0],'Y-m-d H:i:s');
		$tanggal_akhir 	= nice_date($tgl[1],'Y-m-d H:i:s');
		$where 			= $this->input->post('id');

		$data_kegiatan = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'alamat' 		=> $this->input->post('alamat_kegiatan'),
			'start_date'	=> $tanggal_mulai,
			'end_date'		=> $tanggal_akhir,
			'id_jenis'		=> $this->input->post('jenis_kegiatan')
		);

		$input_kegiatan = $this->m_dinamic->update_data('id_kegiatan',$where,$data_kegiatan,'kegiatan');

		if ($input_kegiatan) {
			$data_tps	= $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$where)->result_array();
			if(!empty($data_tps)){
				foreach($data_tps as $key){
					$inp	= array(
						'tambahan_waktu' => null,
					);
					$this->m_dinamic->update_data('id_tps',$key['id_tps'],$inp,'admin_tps');
				}
			}

			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('kegiatan')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}
	}

	public function drop($id){
		$delete_kegiatan 	= $this->m_dinamic->delete_data('kegiatan','id_kegiatan',$id);
		$delete_tps 		= $this->m_dinamic->delete_data('admin_tps','id_kegiatan',$id);
		$delete_pemilihan 	= $this->m_dinamic->delete_data('pemilihan','id_kegiatan',$id);
		$delete_kandidat  	= $this->m_dinamic->delete_data('kandidat','id_kegiatan',$id);
		$delete_panitia 	= $this->m_dinamic->delete_data('panitia','id_kegiatan',$id);
		$delete_bilik 		= $this->m_dinamic->delete_data('user_bilik','id_kegiatan',$id);

		if ($delete_kegiatan) {
			if ($delete_tps) {
				if ($delete_panitia) {
					if ($delete_bilik) {
						echo "<script>
						alert('Data Berhasil dihapus');
						window.location.href='".base_url('kegiatan')."';
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
		}else{
			echo "<script>
			alert('Data Gagal dihapus');
			window.history.back();
			</script>";
		}
	}

	public function checkTPS(){
		$username = $this->input->post('username');
		$ini = $this->m_kegiatan->validate($username);
		echo $ini;
	}
	
}
