<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita_acara extends CI_Model {

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

    function get_pemilihan($where){
        $this->db->select('*');
        $this->db->where('id_kegiatan',$where);
        $this->db->where('jumlah_kandidat >',0);
        $query = $this->db->get('pemilihan');
        return $query;
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
        $this->db->where('status', 3);
        $q = $this->db->get();
        return $q->num_rows();
    }

    function get_tps_free_umum($id_tps){
        $this->db->select('*');
        $this->db->from('data_pemilih_umum');
        $this->db->where('id_tps', $id_tps);
        $this->db->where('status', 3);
        $q = $this->db->get();
        return $q->num_rows();
    }
}
