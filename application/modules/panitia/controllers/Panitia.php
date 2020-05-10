<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends MY_Controller {

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
        $this->load->model('panitia/m_panitia');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_panitia->get_datatables($postData);

		echo json_encode($data);
    }

	public function table()
	{
		$page_content["page"] 	= 'panitia/tables';
		$page_content["css"] 	= '
			<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] 	= '
			<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
			<!-- Datatables init -->
			<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
			<script src="'.base_url().'assets/js/menu_panitia.js"></script>
			<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		$page_content["title"] 	= "Data Panitia";

		$data_kegiatan = $this->m_dinamic->getData('kegiatan')->result_array();
		$data_tps = $this->m_dinamic->getData('admin_tps')->result_array();
		
		$page_content["data"]["kegiatan"] = $data_kegiatan;
		$page_content["data"]["tps"] = $data_tps;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// echo "tabel";
		$this->templates->pageTemplates($page_content);
	}

	public function getTPS($id){
		if ($id != 0) {
			$data = $this->m_dinamic->getWhere ('admin_tps','id_kegiatan',$id)->result_array();
		}else{
			$data = $this->m_dinamic->getData ('admin_tps')->result_array();
		}
		echo json_encode($data);
	}

	public function edit($id){
		$page_content["page"] = 'panitia/form-edit';
		$page_content["css"] = '
			<link href="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
			<link href="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />';
		$page_content["js"] = '
			<!-- Plugin js-->
			<script src="'.base_url().'assets/libs/parsleyjs/parsley.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script src="'.base_url().'assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

			<!-- Validation init js-->
			<script src="'.base_url().'assets/js/pages/form-validation-panitia.init.js"></script>';

		$page_content["title"] = "Edit Panitia";
		
		$data_panitia 	= $this->m_dinamic->getWhere('panitia','id_panitia',$id)->result_array();
		$data_kegiatan 	= $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$data_panitia[0]['id_kegiatan'])->result_array();
		$data_tps 		= $this->m_dinamic->getWhere ('admin_tps','id_tps',$data_panitia[0]['id_tps'])->result_array();

		// echo "<pre>";
		// print_r($data_tps);
		// echo "</pre>";
		
		$page_content["data"]["panitia"] 	= $data_panitia;
		$page_content["data"]["kegiatan"] 	= $data_kegiatan;
		$page_content["data"]["tps"] 		= $data_tps;
		
		$this->templates->pageTemplates($page_content);
	}

	public function update(){
		$data 	= $this->input->post();
		$where 	= $this->input->post('id_panitia');

		$data_panitia = array(
			'ketua' 			=> $this->input->post('nama_ketua'),
			'anggota_staff_1' 	=> $this->input->post('nama_anggota_staff_1'),
			'anggota_staff_2' 	=> $this->input->post('nama_anggota_staff_2'),
			'anggota_staff_3' 	=> $this->input->post('nama_anggota_staff_3'),
			'anggota_staff_4' 	=> $this->input->post('nama_anggota_staff_4'),
			'anggota_staff_5' 	=> $this->input->post('nama_anggota_staff_5'),
			'anggota_staff_6' 	=> $this->input->post('nama_anggota_staff_6'),
			'anggota_staff_7' 	=> $this->input->post('nama_anggota_staff_7')
		);

		$input_panitia = $this->m_dinamic->update_data('id_panitia',$where,$data_panitia,'panitia');

		if ($input_panitia) {
			echo "<script>
			alert('Data Berhasil diubah');
			window.location.href='".base_url('panitia')."';
			</script>";
		}else{
			echo "<script>
			alert('Data Gagal diubah');
			window.history.back();
			</script>";
		}
	}

	
}
