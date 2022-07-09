<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bilik_pemilihan extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->load->helper('guzzle_request_helper');
    }

    function getKandidat ($table,$field,$where){
        $this->db->where($field,$where);
        $query = $this->db->get($table);
        return $query;
    }

    function get_bilik_pelajar($id_bilik){
        $this->db->select('user_bilik.*,data_pemilih_pelajar.nama AS nama, data_pemilih_pelajar.no_identitas AS no_identitas');
        $this->db->from('user_bilik');
        $this->db->join('data_pemilih_pelajar','user_bilik.id_pemilih = data_pemilih_pelajar.no_identitas','left');
        $this->db->where('user_bilik.id_bilik',$id_bilik);
        $q = $this->db->get();
        return $q;
    }

    function get_bilik_umum($id_bilik){
        $this->db->select('user_bilik.*,data_pemilih_umum.nama AS nama, data_pemilih_umum.no_identitas AS no_identitas');
        $this->db->from('user_bilik');
        $this->db->join('data_pemilih_umum','user_bilik.id_pemilih = data_pemilih_umum.no_identitas','left');
        $this->db->where('user_bilik.id_bilik',$id_bilik);
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
}
