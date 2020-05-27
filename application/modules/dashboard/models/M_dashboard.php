<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->load->helper('guzzle_request_helper');
    }

    function get_tps_data($id_tps){
        $this->db->select('admin_tps.*, kegiatan.*');
        $this->db->from('admin_tps');
        $this->db->join('kegiatan','admin_tps.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->where('admin_tps.id_tps',$id_tps);
        $q = $this->db->get();
        return $q;
    }

    function get_tps_pelajar($id_tps){
        $this->db->select('*');
        $this->db->from('data_pemilih_pelajar');
        $this->db->where('id_tps', $id_tps);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function get_tps_umum($id_tps){
        $this->db->select('*');
        $this->db->from('data_pemilih_umum');
        $this->db->where('id_tps', $id_tps);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function get_tps_free_pelajar($id_tps){
        $this->db->select('*');
        $this->db->from('data_pemilih_pelajar');
        $this->db->where('id_tps', $id_tps);
        $this->db->where('status', 1);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function get_tps_free_umum($id_tps){
        $this->db->select('*');
        $this->db->from('data_pemilih_umum');
        $this->db->where('id_tps', $id_tps);
        $this->db->where('status', 1);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function get_bilik($id_tps){
        $this->db->select('*');
        $this->db->from('user_bilik');
        $this->db->where('id_tps',$id_tps);
        $q = $this->db->get();
        return $q;
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
