<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('login/m_login_super');
    }

	public function index()
	{
        if (isset($this->session->userdata['logged'])) {
            if ($this->session->userdata('level_admin') == 3) {
                redirect('Bilik-pemilihan/bilik/');
            }else{
                redirect('dashboard');
            }
        }
        $this->load->view('choose_login');
    }

    public function login_super(){
        if (isset($this->session->userdata['logged'])) {
            redirect('dashboard');
        }
        $data['data_level'] = 1;
        $this->load->view('login_super',$data);
    }

    public function login_tps(){
        if (isset($this->session->userdata['logged'])) {
            redirect('dashboard');
        }
        $data['data_level'] = 2;
        $this->load->view('login_super',$data);
    }

    public function login_bilik(){
        if (isset($this->session->userdata['logged'])) {
            redirect('dashboard');
        }
        if (isset($this->session->flashdata['message'])) {
            echo "<script>
            alert('".$this->$this->flashdata('message')."');
            </script>";
        }
        $data['data_level'] = 3;
        $this->load->view('login_super',$data);
    }
    
    public function auth_super()
    {
        $username = $this->input->post('username');
        $level = $this->input->post('level');
        $password_raw = $this->input->post('password');
        $password = md5($password_raw);

        if ($level == 1) {
            $response = $this->m_login_super->auth_super($username,$password);
            if ($response != '') {
                $data_session = [
                    'id_login' => $response[0]['id_admin'],
                    'nama' => $response[0]['nama'],
                    'level_admin' => 1,
                    'logged' => 1
                ];
                
                $this->session->set_userdata($data_session);
                redirect('dashboard');
            }else{
                echo "<script>
                alert('Oopss! Kombinasi salah');
                window.location.href='".base_url('login/super-admin')."';
                </script>";
            }
        }
        if($level == 2){
            $response = $this->m_login_super->auth_tps($username,$password);

            // echo "<pre>";
            // print_r($response);
            // echo "</pre>";

            if ($response != '') {

                $data_session = [
                    'id_login'          => $response[0]['id_tps'],
                    'id_kegiatan'       => $response[0]['id_kegiatan'],
                    'id_jenis'          => $response[0]['id_jenis'],
                    'nama'              => $response[0]['nama'],
                    'no_tps'            => $response[0]['no_tps'],
                    'nama_kegiatan'     => $response[0]['nama_kegiatan'],
                    'alamat_kegiatan'   => $response[0]['alamat'],
                    'start_date'        => $response[0]['start_date'],
                    'end_date'          => $response[0]['end_date'],
                    'lokasi'            => $response[0]['lokasi'],
                    'level_admin'       => 2,
                    'logged'            => 1
                ];
                
                $this->session->set_userdata($data_session);
                redirect('dashboard');
            }else{
                echo "<script>
                alert('Oopss! Kombinasi salah');
                window.location.href='".base_url('login/admin-tps')."';
                </script>";
            }
        }
        if($level == 3){
            $response = $this->m_login_super->auth_bilik($username,$password);

            if ($response[0]['status_login'] == 1) {
                echo "<script>
                if(confirm('Bilik telah digunakan!! klik \"OK\" jika Anda ingin tetap menggunakan akun ini ??')){
                    window.location.href='".base_url('login/bilik-force/').$response[0]['id_bilik']."';
                }else{
                    window.location.href='".base_url('login/bilik/')."';
                }
                </script>";
            }else{
                $data=array(
                    'status_login' => 1
                );
                $this->m_dinamic->update_data('id_bilik',$response[0]['id_bilik'],$data,'user_bilik');
                if ($response != '') {
                    $data_session = [
                        'id_login'          => $response[0]['id_bilik'],
                        'id_kegiatan'       => $response[0]['id_kegiatan'],
                        'id_jenis'          => $response[0]['id_jenis'],
                        'id_tps'            => $response[0]['id_tps'],
                        'nama'              => $response[0]['nama_bilik'],
                        'no_bilik'          => $response[0]['no_bilik'],
                        'level_admin'       => 3,
                        'logged'            => 1
                    ];
                    
                    $this->session->set_userdata($data_session);
                    redirect('bilik-suara/bilik/');
                }
                else{
                    echo "<script>
                    alert('Oopss! Kombinasi salah');
                    window.location.href='".base_url('login/admin-tps')."';
                    </script>";
                }
            }
            // echo "<pre>";
            // print_r($response);
            // echo "</pre>";  
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('login');
    }

    public function force($id){
        $data = array(
            'status_login' => 0
        );
        $up = $this->m_dinamic->update_data('id_bilik',$id,$data,'user_bilik');
        if ($up) {
            echo "<script>
            alert('Silahkan login kembali');
            window.location.href='".base_url('login/bilik')."';
            </script>";
            // redirect('login/bilik');
        }
    }
}
