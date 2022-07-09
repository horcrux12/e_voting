<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bilik extends CI_Model {

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
        $filter_tps = $postData['filterTps'];

        if ($search != '') {
            $search_filter[] = " (user_bilik.nama_bilik like '%".$search."%' or 
            user_bilik.username like '%".$search."%' or
            user_bilik.no_bilik like '%".$search."%') ";
        }
        if ($filter_kegiatan) {
            $search_filter[] = " user_bilik.id_kegiatan='".$filter_kegiatan."'";
        }
        if ($filter_tps) {
            $search_filter[] = " user_bilik.id_tps='".$filter_tps."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('user_bilik')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('user_bilik')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('user_bilik.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.nama_kegiatan AS nama_kegiatan, admin_tps.id_tps AS id_tps, admin_tps.nama AS nama_tps');
        $this->db->from('user_bilik');
        $this->db->join('kegiatan', 'user_bilik.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->join('admin_tps', 'user_bilik.id_tps = admin_tps.id_tps');
        if($search_query != '')
        $this->db->where($search_query);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		foreach ($records as $field) {
            $row = array();
            $row ['nama_kegiatan']  = $field['nama_kegiatan'];
            $row ['nama_tps']       = $field['nama_tps'];
            $row ['nama_bilik']     = $field['nama_bilik'];
            $row ['username']       = $field['username'];
            $row ['no_bilik']       = $field['no_bilik'];
            $row ['action']         = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'bilik/edit-bilik/'.$field['id_bilik'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Bilik ini?\')" style="margin-bottom:5px" href="'.base_url().'bilik/hapus-bilik/'.$field['id_bilik'].'"><i class="fas fa-trash"></i></a>';
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

    function store($tabel, $data){
        return $this->db->insert($tabel, $data);
    }

    function store_batch($tabel, $data){
        return $this->db->insert_batch($tabel, $data);
    }

    // validate
    function validate($username){
        $this->db->select('*');
        $this->db->from("user_bilik");
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
        $this->db->from("user_bilik");
        $this->db->where("id_tps",$where);
        $this->db->where("no_bilik like binary",$username);
        $query = $this->db->get();
        return $query;
        // $this->db->select('username');
        // $this->db->from('admin_tps');
        // $query = $this->db->get();
        // return $query->result_array();
    }
}
