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
        
    }
}