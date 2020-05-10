<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_panitia extends CI_Model {

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
            $row ['nama_kegiatan']  = $field['nama_kegiatan'];
            $row ['nama_tps']       = $field['nama_tps'];
            $row ['ketua']          = $field['ketua'];
            $row ['anggota']        = $field['anggota_staff_1'].'<br>'.
            $field['anggota_staff_2'].'<br>'.
            $field['anggota_staff_3'].'<br>'.
            $field['anggota_staff_4'].'<br>'.
            $field['anggota_staff_5'].'<br>'.
            $field['anggota_staff_6'].'<br>'.
            $field['anggota_staff_7'];
            $row ['action']         = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'panitia/edit-panitia/'.$field['id_panitia'].'"><i class="fas fa-pencil-alt"></i></a>';
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
}
