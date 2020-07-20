<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model {

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
        $filter_jenis = $postData['filterJenis'];

        if ($search != '') {
            $search_filter[] = " (kegiatan.nama_kegiatan like '%".$search."%' or 
            kegiatan.alamat like '%".$search."%') ";
        }
        if ($filter_jenis) {
            $search_filter[] = " kegiatan.id_jenis='".$filter_jenis."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('kegiatan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('kegiatan')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('kegiatan.*, jenis_kegiatan.id_jenis AS id_jenis, jenis_kegiatan.nama AS nama_jenis');
        $this->db->from('kegiatan');
        $this->db->join('jenis_kegiatan', 'kegiatan.id_jenis = jenis_kegiatan.id_jenis');
        if($search_query != '')
        $this->db->where($search_query);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		foreach ($records as $field) {
            $row = array();
            $row ['nama_kegiatan']      = $field['nama_kegiatan'];
            $row ['alamat']             = $field['alamat'];
            $row ['start_date']         = format_indo($field['start_date']);
            $row ['end_date']           = format_indo($field['end_date']);
            $row ['jumlah_tps']         = $field['jumlah_tps'];
            $row ['jumlah_pemilihan']   = $field['jumlah_pemilihan'];
            $row ['nama_jenis']         = $field['nama_jenis'];
            $row ['action']             = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'kegiatan/edit-kegiatan/'.$field['id_kegiatan'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Kegiatan ini?\')" style="margin-bottom:5px" href="'.base_url().'kegiatan/hapus-kegiatan/'.$field['id_kegiatan'].'"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data,
            "pastData" => $postData
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
        if($query->num_rows() > 0)
        {
        return "false";
        }
        return "true";
        // $this->db->select('username');
        // $this->db->from('admin_tps');
        // $query = $this->db->get();
        // return $query->result_array();
    }
}
