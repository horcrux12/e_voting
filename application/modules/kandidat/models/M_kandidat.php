<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kandidat extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->load->helper('guzzle_request_helper');
    }
    
    public function get_datatables($postData=null)
    {   

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order']; // Column index
        // $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $data = array();
        $search_filter = array();
        $search_query = "";
        $search = $postData['search']['value'];
        $filter_kegiatan = $postData['filterKegiatan'];
        $filter_pemilihan = $postData['filterPemilihan'];

        if ($search != '') {
            $search_filter[] = " ( 
            kandidat.nama_kandidat like '%".$search."%'";
        }
        if ($filter_kegiatan) {
            $search_filter[] = " kandidat.id_kegiatan='".$filter_kegiatan."'";
        }

        if ($filter_pemilihan) {
            $search_filter[] = " kandidat.id_pemilihan='".$filter_pemilihan."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('kandidat')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('kandidat')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('kandidat.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.nama_kegiatan AS nama_kegiatan, pemilihan.id_pemilihan AS id_pemilihan, pemilihan.nama_pemilihan AS nama_pemilihan');
        $this->db->from('kandidat');
        $this->db->join('kegiatan', 'kandidat.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->join('pemilihan', 'kandidat.id_pemilihan = pemilihan.id_pemilihan');
        if($search_query != '')
        $this->db->where($search_query);
        foreach ($postData['order'] as $order) {
            if ($order['column'] == 0) {
                $this->db->order_by('kegiatan.nama_kegiatan', $order['dir']);
            }
            if ($order['column'] == 1) {
                $this->db->order_by('pemilihan.nama_pemilihan', $order['dir']);
            }
            if ($order['column'] == 2) {
                $this->db->order_by('kandidat.nama_kandidat', $order['dir']);
            }
            if ($order['column'] == 3) {
                $this->db->order_by('pemilihan.no_urut', $order['dir']);
            }
            if ($order['column'] == 5) {
                $this->db->order_by('kandidat.hasil', $order['dir']);
            }
        }
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		foreach ($records as $field) {
            $row = array();
            $row ['nama_kegiatan']  = $field['nama_kegiatan'];
            $row ['nama_pemilihan'] = $field['nama_pemilihan'];
            $row ['nama_kandidat']  = $field['nama_kandidat'];
            $row ['no_urut']        = $field['no_urut'];
            $row ['foto']           = '<img src="'.base_url().'assets/images/uploads/kandidat/'.$field['foto'].'" alt="'.$field['nama_kandidat'].'" class="img-fluid d-block rounded" width="150">';
            $row ['hasil']          = $field['hasil'];
            $row ['action']         = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'kandidat/edit-kandidat/'.$field['id_kandidat'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Kandidat ini?\')" style="margin-bottom:5px" href="'.base_url().'kandidat/hapus-kandidat/'.$field['id_kandidat'].'"><i class="fas fa-trash"></i></a>';
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

    function get_last_kandidat(){
        $this->db->select('*');
        $this->db->from('kandidat');
        $query = $this->db->get();
        $data = $query->last_row();
        if ($data != '') {
            $last_id = $data->id_kandidat;
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
    }

    function validate_no($where,$username){
        $this->db->select('*');
        $this->db->from("kandidat");
        $this->db->where("id_pemilihan",$where);
        $this->db->where("no_urut like binary",$username);
        $query = $this->db->get();
        return $query;
    }
}
