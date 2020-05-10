<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function __construct(){
        parent::__construct();
        // $this->load->helper('guzzle_request_helper');
    }
    
    function tambah_data($data)
    {
        $this->db->insert('user', $data);
    }

    function ambil_data(){
        $this->db->select('
			user.*, level.id_level AS id_level, level.nama_level,
		');
		$this->db->from('user');
		// $this->db->order_by('id_guru','DESC');
		$this->db->join('level','user.id_level = level.id_level');
		$query = $this->db->get();
		return $query;
    }
}
