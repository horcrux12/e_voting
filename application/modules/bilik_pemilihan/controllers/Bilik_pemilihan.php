<?php

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Mpdf\Mpdf;

defined('BASEPATH') OR exit('No direct script access allowed');

class Bilik_pemilihan extends MX_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('bilik_pemilihan/m_bilik_pemilihan');
        if (!isset($this->session->userdata['logged']))
        {
            redirect('login');
        }else{
            if ($this->session->userdata['level_admin'] != 3) {
                show_404();
            }
        }
    }

	public function index()
	{
        if (isset($this->session->userdata['logged'])) {
            redirect('dashboard');
        }
        $this->load->view('choose_login');
    }

    public function bilik(){
        $data['kegiatan']   = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
        $data['tps']        = $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_tps'))->result_array();
        $data['pemilihan']  = $this->m_bilik_pemilihan->get_pemilihan ($this->session->userdata('id_kegiatan'))->result_array();
        $data['kandidat']   = $this->m_dinamic->getWhereSort ('kandidat','id_kegiatan',$this->session->userdata('id_kegiatan'),'no_urut','ASC')->result_array();
        if ($this->session->userdata('id_jenis') == 1) {
            $data['bilik']      = $this->m_bilik_pemilihan->get_bilik_umum ($this->session->userdata('id_login'))->result_array();
        }else{
            $data['bilik']      = $this->m_bilik_pemilihan->get_bilik_pelajar ($this->session->userdata('id_login'))->result_array();
        }
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $start_date = $data['kegiatan'][0]['start_date'];
        $end_date   = (isset($data['tps'][0]['tambahan_waktu']) ? $data['tps'][0]['tambahan_waktu'] : $data['kegiatan'][0]['end_date']);
        $now        = date('Y-m-d H:i:s');

        // echo $start_date."<br>".$end_date."<br>".$now."<br>";
        
        
        $coming = strtotime($start_date) - strtotime($now); // + => Coming soon
        
        // $end    = strtotime('2020-08-02 16:56:29') - strtotime($now); // - => end
        $end    = strtotime($end_date) - strtotime($now); // - => end
        

        if ($coming > 0) {
            $data['start_date'] = $start_date;
            $data['page']       = 'bilik_pemilihan/coming-soon';
            $data['js']         ='<script src="'.base_url().'assets/js/pemilihan-soon.js"></script>';
        }else{
            if ($end > 0) {
                if ($data['bilik'][0]['id_pemilih'] != null) {
                    $data['page']   = 'bilik_pemilihan/mulai_pemilihan';
                    $data['js']     ='
                        <script src="'.base_url().'assets/libs/sweetalert2-10.0.2/package/dist/sweetalert2.min.js"></script>
                        <script src="'.base_url().'assets/js/pemilihan-berlangsung.js?v='.rand().'"></script>';
                    $data['css']    = '<link rel="stylesheet" href="'.base_url().'assets/libs/sweetalert2-10.0.2/package/dist/sweetalert2.min.css">';
                }else{
                    $data['page']       = 'bilik_pemilihan/welcome';
                    $data['js']     ='<script src="'.base_url().'assets/js/pemilihan-pre.js"></script>';
                }
            }else{
                $data['end_date']   = $end_date;
                $data['page']       = 'bilik_pemilihan/end';
                $data['js']         ='<script src="'.base_url().'assets/js/pemilihan-end.js"></script>';
            }
        }
        
        $this->load->view('bilik_pemilihan/template',$data);
    }

    public function store(){
        $input = $this->input->post();
        // print_r($input);
        // echo date('Y-m-d-H-m').'_'.$this->session->userdata('id_login');
        $data['kegiatan']   = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
        $data_isi['tps']        = $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_tps'))->result_array();
        $bilik              = $this->m_dinamic->getWhere ('user_bilik','id_bilik',$this->session->userdata('id_login'))->result_array();
        // print_r($bilik[0]['id_pemilih']);
        $html_header = $this->load->view('bilik_pemilihan/header_vvpat', $data, TRUE);
        
        $mpdf = new \Mpdf\Mpdf([
            'setAutoTopMargin' => 'stretch',
            'setAutoBottomMargin' => 'pad',
            'autoMarginPadding' => 5
        ]);
        $mpdf->text_input_as_HTML = true;

        // Define the Header/Footer before writing anything so they appear on the first page
        $mpdf->SetHTMLHeader($html_header);
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>
                <td width="33%">{DATE j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">E-voting</td>
            </tr>
        </table>');
        $count = count($input['pilihan']); $i=1;  
        foreach ($input['pilihan'] as $key => $value) {
            $data_isi['kandidat']   = $this->m_dinamic->getWhere ('kandidat','id_kandidat',$value)->result_array();
            $data_isi['pemilihan']   = $this->m_dinamic->getWhere ('pemilihan','id_pemilihan',$data_isi['kandidat'][0]['id_pemilihan'])->result_array();

            $pilih      = array ( 'hasil' => $data_isi['kandidat'][0]['hasil'] + 1 );
            
            $u_kandidat = $this->m_dinamic->update_data('id_kandidat',$value,$pilih,'kandidat');
            
            $html_isi = $this->load->view('bilik_pemilihan/isi_vvpat', $data_isi, TRUE);
            $mpdf->WriteHTML($html_isi);

            if($i != $count){
                $mpdf->AddPage();
            }
            $i++;
        }
        $mpdf->Output(realpath('./assets/ballots').'/'.date('Y-m-d-H-m-s').'_'.$this->session->userdata('id_login').'.pdf','F');

        $biliks     = array ( 'id_pemilih' => null );
        $stat       = array ( 'status' => 3 );

        if ($this->session->userdata('id_jenis') == 1) {
            $this->m_dinamic->update_data('no_identitas',$bilik[0]['id_pemilih'],$stat,'data_pemilih_umum');
        }else{
            $this->m_dinamic->update_data('no_identitas',$bilik[0]['id_pemilih'],$stat,'data_pemilih_pelajar');
        }
        $this->m_dinamic->update_data('id_bilik',$this->session->userdata('id_login'),$biliks,'user_bilik');
        
        // <script>
        // alert('Pemilihan berhasil, terimakasih telah mengguanakan hak pilih Anda');
        // window.location.href='".base_url('bilik-suara/bilik')."';
        // </script>";
        $this->load->view('bilik_pemilihan/store');
    }

    public function status(){
        $data      = $this->m_dinamic->getWhere ('user_bilik','id_bilik',$this->session->userdata('id_login'))->result_array();
		echo json_encode($data[0]);
    }
    public function interval(){
        $data['kegiatan']   = $this->m_dinamic->getWhere ('kegiatan','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
        $data['tps']        = $this->m_dinamic->getWhere ('admin_tps','id_tps',$this->session->userdata('id_tps'))->result_array();
        $data['bilik']      = $this->m_dinamic->getWhere ('user_bilik','id_bilik',$this->session->userdata('id_login'))->result_array();

		echo json_encode($data);
    }
}
