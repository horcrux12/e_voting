<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function get()
	{

        $data ['id_login']      = $this->session->userdata['id_login'];
        $data ['level_admin']   = $this->session->userdata['level_admin'];

        if ($this->session->userdata['level_admin'] == 2) {
            $data ['id_login']      = $this->session->userdata['id_jenis'];
        }

        echo json_encode($data);
    }
    public function debug(){
        $draw = '';
        $start = 0;
        $rowperpage = 10; // Rows display per page
        // $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = ''; // Column name
        $columnSortOrder = ''; // asc or desc
        $data = array();
        $search_filter = array();
        $search_query = "";
        $search = '';
        $filter_kegiatan = '';

        if ($search != '') {
            $search_filter[] = " (pemilihan.nama_pemilihan like '%".$search."%' or 
            pemilihan.jumlah_kandidat like '%".$search."%') ";
        }
        if ($filter_kegiatan =! '') {
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

        $no = $rowperpage + 1;
		foreach ($records as $field) {
            $row = array();
            $row ['no']                 = $no++;
            $row ['nama_pemilihan']     = $field['nama_pemilihan'];
            $row ['jumlah_kandidat']    = $field['jumlah_kandidat'];
            $row ['nama_kegiatan']      = $field['nama_kegiatan'];
            $row ['action']             = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" onclick="return confirm(\'Anda yakin ingin mengubah Data ini?\')" href="'.base_url().'pemilihan/edit-pemilihan/'.$field['id_pemilihan'].'"><i class="fas fa-pencil-alt"></i></a>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Data ini?\')" style="margin-bottom:5px" href="'.base_url().'pemilihan/hapus-pemilihan/'.$field['id_pemilihan'].'"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
    }
}