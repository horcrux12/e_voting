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
            redirect('dashboard');
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

            echo "<pre>";
            print_r($response);
            echo "</pre>";

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

        }
        
        
        // print_r($response);
        // if($response['user']['total_data'] == 1)
        // {
        //     foreach($response['user']['data'] as $user)
        //     {
        //         if($user['username_manager'] == $username && $user['email_manager'] == $email && $user['password_manager'] == $password)
        //         {
        //             if($user['layanan']['status_lk'] == "1")
        //             {
        //                 $data_session = [
        //                     'id_manager' => $user['id_manager'],
        //                     'username' => $user['username_manager'],
        //                     'lk_id' => $user['lk_id'],
        //                     'level_manager' => $user['level_manager'],
        //                     'status_manager' => $user['layanan']['status_lk'],
        //                     'nama_lk' => $user['layanan']['nama_lk'],
        //                     'induk_id' => $user['layanan']['induk_id'],
        //                     'token' => $response['token'],
        //                     'image' => $user['layanan']['logo_lk'],
        //                     'logged' => 1
        //                 ];
    
        //                 $this->session->set_userdata($data_session);
    
        //                 redirect(base_url('dashboard'));
    
        //             }else{
        //                 echo "<script>
        //                 alert('Oopss! your account is not activated');
        //                 window.location.href='".base_url('login')."';
        //                 </script>";
        //             }
        //         }
        //         echo "<script>
        //         alert('Oopss! Kombinasi salah');
        //         window.location.href='".base_url('login')."';
        //         </script>";
        //     }
        // }else{
        //     echo "<script>
        //     alert('Oopss! Kombinasi salah');
        //     window.location.href='".base_url('login')."';
        //     </script>";
        // }

    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('login');
    }
}
