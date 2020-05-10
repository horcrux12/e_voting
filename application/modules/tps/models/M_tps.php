<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tps extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->load->helper('guzzle_request_helper');
    }
    
    public function get_datatables($postData=null)
    {   

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $data = array();
        $search_filter = array();
        $search_query = "";
        $search = $postData['search']['value'];
        $filter_kegiatan = $postData['filterKegiatan'];

        if ($search != '') {
            $search_filter[] = " ( 
            admin_tps.lokasi like '%".$search."%' or
            admin_tps.username like '%".$search."%') ";
        }
        if ($filter_kegiatan) {
            $search_filter[] = " admin_tps.id_kegiatan='".$filter_kegiatan."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('admin_tps')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('admin_tps')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('admin_tps.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.nama_kegiatan AS nama_kegiatan');
        $this->db->from('admin_tps');
        $this->db->join('kegiatan', 'admin_tps.id_kegiatan = kegiatan.id_kegiatan');
        if($search_query != '')
        $this->db->where($search_query);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		foreach ($records as $field) {
            $row = array();
            $row ['nama_kegiatan']  = $field['nama_kegiatan'];
            $row ['nama']           = $field['nama'];
            $row ['lokasi']         = $field['lokasi'];
            $row ['username']       = $field['username'];
            $row ['no_tps']         = $field['no_tps'];
            $row ['jumlah_bilik']   = $field['jumlah_bilik'];
            $row ['action']         = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'tps/edit-tps/'.$field['id_tps'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus TPS ini?\')" style="margin-bottom:5px" href="'.base_url().'tps/hapus-tps/'.$field['id_tps'].'"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    function get_jenis_kegiatan()
    {
        $this->db->select('*');
        $this->db->from('jenis_kegiatan');
        $this->db->order_by('nama','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get Last ID
    function get_last_kegiatan(){
        $this->db->select('*');
        $this->db->from('kegiatan');
        $query = $this->db->get();
        $data = $query->last_row();
        if ($data != '') {
            $last_id = $data->id_kegiatan;
        }else{
            $last_id = 0;
        }
        return $last_id;
    }

    function get_last_tps(){
        $this->db->select('*');
        $this->db->from('admin_tps');
        $query = $this->db->get();
        $data = $query->last_row();
        if ($data != '') {
            $last_id = $data->id_tps;
        }else{
            $last_id = 0;
        }
        return $last_id;
    }

    function get_last_bilik(){
        $this->db->select('*');
        $this->db->from('user_bilik');
        $query = $this->db->get();
        $data = $query->last_row();
        if ($data != '') {
            $last_id = $data->id_bilik;
        }else{
            $last_id = 0;
        }
        return $last_id;
    }
    // END Get Last ID

    function store($tabel, $data){
        return $this->db->insert($tabel, $data);
    }

    function store_batch($tabel, $data){
        return $this->db->insert_batch($tabel, $data);
    }

    // validate
    function validate($username){
        $this->db->select('*');
        $this->db->from("admin_tps");
        $this->db->where("username like binary",$username);
        $query = $this->db->get();
        return $query;
        // $this->db->select('username');
        // $this->db->from('admin_tps');
        // $query = $this->db->get();
        // return $query->result_array();
    }

    function validate_no($where,$username){
        $this->db->select('*');
        $this->db->from("admin_tps");
        $this->db->where("id_kegiatan",$where);
        $this->db->where("no_tps like binary",$username);
        $query = $this->db->get();
        return $query;
        // $this->db->select('username');
        // $this->db->from('admin_tps');
        // $query = $this->db->get();
        // return $query->result_array();
    }
}
