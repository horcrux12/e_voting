<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends MY_Controller {

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
	 * @see htkandidat://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->model('kandidat/m_kandidat');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_kandidat->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'kandidat/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_kandidat.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data Kandidat";

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
		$page_content["page"] = 'kandidat/form-tambah';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!--Form Wizard-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-kandidat.init.js"></script>';

		$page_content["title"] = "Tambah Data kandidat";
		$data = $this->m_dinamic->getData('kegiatan')->result_array();
		$page_content["data"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}

	public function edit($id){
		$page_content["page"] = 'kandidat/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-kandidat.init.js"></script>';

		$page_content["title"] = "Edit kandidat";
		
		$data_kandidat = $this->m_dinamic->getWhere('kandidat','id_kandidat',$id)->result_array();
		$data_kegiatan = $this->m_dinamic->getData('kegiatan')->result_array();

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		$page_content["data"]["kandidat"] = $data_kandidat;
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		
		$this->templates->pageTemplates($page_content);
	}

	public function store(){
		
		$input = $this->input->post();
		$last_kandidat = $this->m_kandidat->get_last_kandidat()+1;

		$nama_gambar = $last_kandidat."_".str_replace(" ","_",$input['nama_kandidat']);

		$config['upload_path']          = './assets/images/uploads/kandidat/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $nama_gambar;
		$config['overwrite']			= true;
		// $config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("foto_kandidat")) {
			$gambar = $this->upload->data("file_name");
		}else{
			echo "<script>
			alert('".$this->upload->display_errors()."');
			window.history.back();
			</script>";
		}
		
		$data_kandidat = array(
			'id_kandidat'	=> $last_kandidat,
			'no_urut'		=> $input['no_urut'],
			'foto'			=> $gambar,
			'nama_kandidat'	=> $input['nama_kandidat'],
			'saksi'			=> $input['nama_saksi'],
			'id_kegiatan'	=> $input['kegiatan']
		);

		$save_kandidat 		= $this->m_kandidat->store('kandidat',$data_kandidat);

		if ($save_kandidat) {
			echo "<script>
			alert('Data Berhasil ditambah');
			window.location.href='".base_url('kandidat')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal ditambah');
			window.history.back();
			</script>";
		}
	}

	public function update(){
		$input 			= $this->input->post();
		$where 			= $input['id_kandidat'];
		$last_kandidat 	= $this->m_dinamic->getWhere ('kandidat', 'id_kandidat', $where)->result_array();
		$nama_gambar 	= $where."_".str_replace(" ","_",$input['nama_kandidat']);

		if (!empty($_FILES['foto_kandidat']['name'])) {	
			
			if ($last_kandidat[0]['nama_kandidat'] != $input['nama_kandidat']) {
				$file_name = base_url().'assets/images/uploads/kandidat/'.$input['last_foto'];
				unlink($file_name);
			}

			$config['upload_path']          = './assets/images/uploads/kandidat/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['file_name']            = $nama_gambar;
			$config['overwrite']			= true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload("foto_kandidat")) {
				$gambar = $this->upload->data("file_name");
			}else{
				echo "<script>
				alert('".$this->upload->display_errors()."');
				window.history.back();
				</script>";
			}
		}else{
			if ($last_kandidat[0]['nama_kandidat'] != $input['nama_kandidat']) {

				$type 		= substr($input['last_foto'], strpos($input['last_foto'], ".") + 1);
				$file_name 	= FCPATH .'assets/images/uploads/kandidat/'.$input['last_foto'];
				$new_name 	= FCPATH .'assets/images/uploads/kandidat/'.$nama_gambar.'.'.$type;

				rename($file_name,$new_name);
				$gambar 	= $nama_gambar.'.'.$type;
			}else{
				$gambar 	= $input['last_foto'];
			}
		}

		$data_kandidat = array(
			'no_urut'		=> $input['no_urut'],
			'foto'			=> $gambar,
			'nama_kandidat'	=> $input['nama_kandidat'],
			'saksi'			=> $input['nama_saksi'],
			'id_kegiatan'	=> $input['kegiatan']
		);

		$input_kandidat = $this->m_dinamic->update_data('id_kandidat',$where,$data_kandidat,'kandidat');

		// if ($input_kandidat) {
		// 	echo "<script>
		// 	alert('Data Berhasil diubah');
		// 	window.location.href='".base_url('kandidat')."';
		// 	</script>";
		// }else{
		// 	echo "<script>
		// 	alert('Data Gagal diubah');
		// 	window.history.back();
		// 	</script>";
		// }
	}

	public function drop($id){
		$data_kandidat 	= $this->m_dinamic->getWhere ('kandidat','id_kandidat',$id)->result_array();
		$file_name 		= FCPATH.'assets/images/uploads/kandidat/'.$data_kandidat[0]['foto'];

		if (unlink($file_name)) {
			
			$delete_kandidat = $this->m_dinamic->delete_data('kandidat','id_kandidat',$id);
			if ($delete_kandidat) {
				echo "<script>
				alert('Data Berhasil dihapus');
				window.location.href='".base_url('kandidat')."';
				</script>";
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

	public function checknokandidat($id){
		$no_kandidat = $this->input->post('nokandidat');
		$id_kandidat = $this->input->post('id');
		// $username = $a;
		if (isset($no_kandidat)) {
			if (isset($id_kandidat)) {
				$isi = $this->m_dinamic->getWhere ('kandidat','id_kandidat',$id_kandidat)->result_array();
				if ($no_kandidat != $isi[0]['no_urut']) {
					$ini = $this->m_kandidat->validate_no($id,$no_kandidat);
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
				$ini = $this->m_kandidat->validate_no($id,$no_kandidat);
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
