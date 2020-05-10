<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

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
        $this->load->model('menu_user/m_user');
    }
	 
	public function table()
	{
		// $page_content["page"] 	= 'menu_user/tables';
		// $page_content["css"] 	= '
		// 	<link href="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		// 	<link href="'.base_url().'assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />';
		// $page_content["js"] 	= '
		// 	<script src="'.base_url().'assets/libs/flot-charts/jquery.flot.js"></script>
		// 	<script src="'.base_url().'assets/libs/datatables/jquery.dataTables.min.js"></script>
		// 	<script src="'.base_url().'assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
		// 	<!-- Datatables init -->
		// 	<script src="'.base_url().'assets/js/pages/datatables.init.js"></script>
		// 	<script src="'.base_url().'assets/js/menu_user.js"></script>
		// 	<script src="'.base_url().'assets/libs/moment/moment.min.js"></script>';
		// $page_content["title"] 	= "Data User";

		// $data = $this->m_user->ambil_data('user')->result_array();
		// $page_content["data"] 	= $data;

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		// $this->templates->pageTemplates($page_content);
		// $draw = $postData['draw'];
        $start = 0;
        $rowperpage = 10; // Rows display per page
        // $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = "nama"; // Column name
        // if ($columnNames == "nama") {
        //     $columnName = "jenis_kegiatan.".$columnNames;
        // }else{
        //     $columnName = "kegiatan.".$columnNames;
        // }

        $columnSortOrder = "DESC"; // asc or desc
        $rows = array();
        $search_filter = array();
        $search_query = "";
        $search = "ketua";
        $filter_kegiatan = "";
        $filter_tps = "";

        if ($search != '') {
            $search_filter[] = " (panitia.ketua like '%".$search."%' or 
            panitia.anggota_staff_1 like '%".$search."%' or
            panitia.anggota_staff_2 like '%".$search."%' or
            panitia.anggota_staff_3 like '%".$search."%' or
            panitia.anggota_staff_4 like '%".$search."%' or
            panitia.anggota_staff_5 like '%".$search."%' or
            panitia.anggota_staff_6 like '%".$search."%' or
            panitia.anggota_staff_7 like '%".$search."%') ";
        }
        if ($filter_kegiatan) {
            $search_filter[] = " panitia.id_kegiatan='".$filter_kegiatan."'";
        }
        if ($filter_tps) {
            $search_filter[] = " panitia.id_tps='".$filter_tps."'";
        }


        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('panitia')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('panitia')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('panitia.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.nama_kegiatan AS nama_kegiatan, admin_tps.id_tps AS id_tps, admin_tps.nama AS nama_tps');
        $this->db->from('panitia');
        $this->db->join('kegiatan', 'panitia.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->join('admin_tps', 'panitia.id_tps = admin_tps.id_tps');
        if($search_query != '')
        $this->db->where($search_query);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		foreach ($records as $field) {
            $row = array();
            $row ['nama_kegiatan']       = $field['nama_kegiatan'];
            $row ['nama_tps']       = $field['nama_tps'];
            $row ['ketua']          = $field['ketua'];
            $row ['anggota']        = 'Anggota/Staff 1 :'.$field['anggota_staff_1'].'<br>'.
            'Anggota/Staff 2 :'.$field['anggota_staff_2'].'<br>'.
            'Anggota/Staff 3 :'.$field['anggota_staff_3'].'<br>'.
            'Anggota/Staff 4 :'.$field['anggota_staff_4'].'<br>'.
            'Anggota/Staff 5 :'.$field['anggota_staff_5'].'<br>'.
            'Anggota/Staff 6 :'.$field['anggota_staff_6'].'<br>'.
            'Anggota/Staff 7 :'.$field['anggota_staff_7'];
            $row ['action']         = '<a title="Edit" class="btn btn-icon waves-effect btn-warning btn-sm" style="margin-bottom:5px" href="'.base_url().'kegiatan/edit-kegiatan/'.$field['id_panitia'].'"><i class="fas fa-pencil-alt"></i></a>';
            $data[] = $row;
        }
		
		// print_r($data);

        // echo json_encode($data);
        echo 'true';
	}

	public function tambah()
	{
		$page_content["page"] = 'menu_user/form-tambah';
        $page_content["css"] = '';
		$page_content["js"] = '
			<script src="'.base_url().'assets/js/menu_user.js"></script>
			<script src="'.base_url().'assets/js/pages/icon.init.js"></script>';
		$page_content["title"] = "Tambah User";
		
		$data = $this->m_dinamic->getData('level')->result_array();

		$page_content["data"] = $data;
		
		$this->templates->pageTemplates($page_content);
	}
	
	public function simpan()
	{
		$data_store = array(
			'nama' 		=> $this->input->post('nama'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->encrypt->encode($this->input->post('password')),
			'id_level' 	=> $this->input->post('level')
		);

		$this->m_user->tambah_data($data_store);
		
		redirect('menu-user');
	}

	public function interval(){
		$data = $this->m_dinamic->getData('kegiatan')->result_array();

		echo json_encode($data);
	}
}
