<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends MY_Controller {

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
        $this->load->model('pemilihan/m_pemilihan');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_pemilihan->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'pemilihan/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_pemilihan.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data Pemilihan";

		$data = $this->m_pemilihan->get_kegiatan();
		$page_content["data"] = $data;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// echo "tabel";
		$this->templates->pageTemplates($page_content);
	}

	public function tambah()
	{
		$page_content["page"] = 'pemilihan/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilihan.init.js"></script>';

		$page_content["title"] = "Tambah Pemilihan";
		$data = $this->m_pemilihan->get_kegiatan();
		$page_content["data"]["kegiatan"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'pemilihan/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-pemilihan.init.js"></script>';

		$page_content["title"] = "Edit Kegiatan";
		
		$data_pemilihan 	= $this->m_dinamic->getWhere('pemilihan','id_pemilihan',$id)->result_array();
		$data_kegiatan 		= $this->m_pemilihan->get_kegiatan();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["pemilihan"] 	= $data_pemilihan;
		$page_content["data"]["kegiatan"]	= $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$input 		= $this->input->post();
		$kegiatan 	= $this->m_dinamic->getWhere('kegiatan','id_kegiatan',$input['kegiatan'])->result_array();
 
		$data_pemilihan = array(
			'nama_pemilihan' 	=> $input['nama_pemilihan'],
			'jumlah_kandidat' 	=> 0,
			'id_kegiatan' 		=> $input['kegiatan']
		);

		$data_kegiatan = array(
			'jumlah_pemilihan' => $kegiatan[0]['jumlah_pemilihan'] + 1
		);

		$save_kegiatan 	= $this->m_dinamic->update_data('id_kegiatan',$input['kegiatan'],$data_kegiatan,'kegiatan');
		$save_pemilihan	= $this->m_pemilihan->store('pemilihan',$data_pemilihan);

		if ($save_pemilihan) {
			echo "<script>
			alert('Data Berhasil ditambah');
			window.location.href='".base_url('pemilihan')."';
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
 
		$data_pemilihan = array(
			'nama_pemilihan' 	=> $input['nama_pemilihan'],
			'id_kegiatan' 		=> $input['kegiatan']
		);

		$save_pemilihan	= $this->m_dinamic->update_data('id_pemilihan',$input['id_pemilihan'],$data_pemilihan,'pemilihan');

		if ($save_pemilihan) {
			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('pemilihan')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}
	}

	public function drop($id){
		$delete_kegiatan = $this->m_dinamic->delete_data('kegiatan','id_kegiatan',$id);
		$delete_tps = $this->m_dinamic->delete_data('admin_tps','id_kegiatan',$id);
		$delete_panitia = $this->m_dinamic->delete_data('panitia','id_kegiatan',$id);
		$delete_bilik = $this->m_dinamic->delete_data('user_bilik','id_kegiatan',$id);

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
