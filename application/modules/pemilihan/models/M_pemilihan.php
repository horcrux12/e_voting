<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilihan extends CI_Model {

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
            $search_filter[] = " (pemilihan.nama_pemilihan like '%".$search."%' or 
            pemilihan.jumlah_kandidat like '%".$search."%') ";
        }
        if ($filter_kegiatan != '') {
            $search_filter[] = " pemilihan.id_kegiatan='".$filter_kegiatan."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('pemilihan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('pemilihan')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('pemilihan.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.nama_kegiatan AS nama_kegiatan');
        $this->db->from('pemilihan');
        $this->db->join('kegiatan', 'pemilihan.id_kegiatan = kegiatan.id_kegiatan');
        if($search_query != '')
        $this->db->where($search_query);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

        $no = $start + 1;
		foreach ($records as $field) {
            $row = array();
            $row ['nomor']              = $no++;
            $row ['nama_pemilihan']     = $field['nama_pemilihan'];
            $row ['jumlah_kandidat']    = $field['jumlah_kandidat'];
            $row ['nama_kegiatan']      = $field['nama_kegiatan'];
            $row ['action']             = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" onclick="return confirm(\'Anda yakin ingin mengubah Data ini?\')" href="'.base_url().'pemilihan/edit-pemilihan/'.$field['id_pemilihan'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Data ini?\')" style="margin-bottom:5px" href="'.base_url().'pemilihan/hapus-pemilihan/'.$field['id_pemilihan'].'"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data,
            "datas" => $postData['filterKegiatan']
        );

        return $response;
    }

    function get_kegiatan()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->order_by('nama_kegiatan','DESC');
        $query = $this->db->get();
        return $query->result_array();
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
