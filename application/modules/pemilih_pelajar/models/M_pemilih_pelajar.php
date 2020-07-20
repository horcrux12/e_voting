<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilih_pelajar extends CI_Model {

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
        $data                   = array();
        $search_filter          = array();
        $search_query           = "";
        $search                 = $postData['search']['value'];
        
        if ($this->session->userdata('level_admin') == 1) {
            $filter_kegiatan    = $postData['filterKegiatan'];
            $filter_tps         = $postData['filterTps'];
        }
        

        if ($search != '') {
            $search_filter[] = " (data_pemilih_pelajar.no_identitas like '%".$search."%' or
            data_pemilih_pelajar.nama like '%".$search."%' or
            data_pemilih_pelajar.asal_sekolah like '%".$search."%' or
            data_pemilih_pelajar.kelas_fakultas like '%".$search."%' or
            data_pemilih_pelajar.jurusan like '%".$search."%' or
            data_pemilih_pelajar.semester like '%".$search."%') ";
        }
        if ($this->session->userdata('level_admin') == 1) {
            if ($filter_kegiatan) {
            $search_filter[] = " data_pemilih_pelajar.id_kegiatan='".$filter_kegiatan."'";
            }
            if ($filter_tps) {
                $search_filter[] = "data_pemilih_pelajar.id_tps='".$filter_tps."'";
            } 
        }if ($this->session->userdata('level_admin') == 2) {
            $search_filter[] = " data_pemilih_pelajar.id_tps='".$this->session->userdata('id_login')."'";
        }

        if (count($search_filter) > 0) {
            $search_query = implode(" and ",$search_filter);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('data_pemilih_pelajar')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($search_query != '')
        $this->db->where($search_query);
        $records = $this->db->get('data_pemilih_pelajar')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        // Get data
        $this->db->select('data_pemilih_pelajar.*, kegiatan.id_kegiatan AS id_kegiatan,
         kegiatan.nama_kegiatan AS nama_kegiatan, admin_tps.id_tps AS id_tps, admin_tps.nama AS nama_tps,
         user_bilik.id_bilik AS id_bilik, user_bilik.nama AS nama_bilik, user_bilik.no_bilik');
        $this->db->from('data_pemilih_pelajar');
        $this->db->join('kegiatan', 'data_pemilih_pelajar.id_kegiatan = kegiatan.id_kegiatan','left');
        $this->db->join('admin_tps', 'data_pemilih_pelajar.id_tps = admin_tps.id_tps','left');
        $this->db->join('user_bilik', 'data_pemilih_pelajar.id_bilik = user_bilik.id_bilik','left');
        if($search_query != '')
        $this->db->where($search_query);
        foreach ($postData['order'] as $order) {
            if ($order['column'] == 0) {
                $this->db->order_by('data_pemilih_pelajar.no_identitas', $order['dir']);
            }
            if ($order['column'] == 1) {
                $this->db->order_by('data_pemilih_pelajar.nama', $order['dir']);
            }
            if ($order['column'] == 2) {
                $this->db->order_by('data_pemilih_pelajar.gender', $order['dir']);
            }
            if ($order['column'] == 3) {
                $this->db->order_by('data_pemilih_pelajar.tempat_lahir', $order['dir']);
                $this->db->order_by('data_pemilih_pelajar.tanggal_lahir', $order['dir']);
            }
            if ($order['column'] == 4) {
                $this->db->order_by('data_pemilih_pelajar.asal_sekolah', $order['dir']);
            }
            if ($order['column'] == 5) {
                $this->db->order_by('data_pemilih_pelajar.kelas_fakultas', $order['dir']);
            }
            if ($order['column'] == 6) {
                $this->db->order_by('data_pemilih_pelajar.jurusan', $order['dir']);
            }
            if ($order['column'] == 7) {
                $this->db->order_by('data_pemilih_pelajar.no_urut', $order['dir']);
            }
            if ($order['column'] == 8) {
                $this->db->order_by('admin_tps.nama', $order['dir']);
            }
            if ($order['column'] == 9) {
                $this->db->order_by('user_bilik.no_bilik', $order['dir']);
            }
            if ($order['column'] == 10) {
                $this->db->order_by('data_pemilih_pelajar.status', $order['dir']);
            }
        }
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

        
		foreach ($records as $field) {
            $status = '';
            if ($field['status'] == 1) {
                $status = "Belum Memilih";
            }elseif ($field['status'] == 2) {
                $status = "Sedang Memilih";
            }else{
                $status = "Sudah Memilih";
            }

            $row = array();
            $row ['no_identitas']   = $field['no_identitas'];
            $row ['nama']           = $field['nama'];
            $row ['gender']         = $field['gender'];
            $row ['ttl']            = $field['tempat_lahir'].', '.format_indo($field['tanggal_lahir']);
            $row ['asal_sekolah']   = $field['asal_sekolah'];
            $row ['kelas_fakultas'] = $field['kelas_fakultas'];
            $row ['jurusan']        = $field['jurusan'];
            $row ['no_urut']        = $field['no_urut'];
            $row ['nama_tps']       = $field['nama_tps'];
            $row ['no_bilik']       = $field['no_bilik'];
            $row ['status']         = $status;
            $row ['action']         = '<a title="Edit" class="btn btn-warning waves-effect waves-light btn-xs" style="margin-bottom:5px" href="'.base_url().'pemilih_pelajar/edit-pemilih_pelajar/'.$field['no_identitas'].'"><i class="fas fa-pencil-alt"></i></a><br>
			<a title="Delete" class="btn btn-danger waves-effect waves-light btn-xs" onclick="return confirm(\'Anda yakin ingin menghapus Pemilih ini?\')" style="margin-bottom:5px" href="'.base_url().'pemilih_pelajar/hapus-pemilih_pelajar/'.$field['no_identitas'].'"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data,
            "apa" => $postData
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
        $this->db->from("data_pemilih_pelajar");
        $this->db->where("no_identitas like binary",$username);
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

    function get_tps_pelajar(){
        $this->db->select('admin_tps.*, kegiatan.id_kegiatan AS id_kegiatan, kegiatan.id_jenis AS id_jenis');
        $this->db->from('admin_tps');
        $this->db->join('kegiatan', 'admin_tps.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->where('kegiatan.id_jenis',2);
        $query = $this->db->get();
        return $query;
    }

    function last_no_urut($kegiatan, $tps){
        $this->db->select('no_urut');
        $this->db->from('data_pemilih_pelajar');
        $this->db->where('id_kegiatan',$kegiatan);
        $this->db->where('id_tps',$tps);
        $this->db->order_by('no_urut','DESC');
        $q = $this->db->get();
        // $data = $q->last_row();
        // if ($data != '') {
        //     $last_id = $data->no_urut;
        // }else{
        //     $last_id = 0;
        // }
        return $q->result_array();
    }

    function last_no_uruts($kegiatan, $tps){
        $this->db->select('no_urut');
        $this->db->from('data_pemilih_pelajar');
        $this->db->where('id_kegiatan',$kegiatan);
        $this->db->where('id_tps',$tps);
        $this->db->order_by('no_urut','ASC');
        $q = $this->db->get();
        $data = $q->last_row();
        if ($data != '') {
            $last_id = $data->no_urut;
        }else{
            $last_id = 0;
        }
        return $last_id;
    }

    function get_kegiatan_now(){
        $this->db->select('*');
        $this->db->from('tb_kegiatan');
    }
}
