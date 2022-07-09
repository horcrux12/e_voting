<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;

class Berita_acara extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->model('berita_acara/m_berita_acara');
        // $this->load->model('m_dinamic');
    }
	 
	public function serverSide()
    {
        // POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->m_bilik->get_datatables($postData);

		echo json_encode($data);
    }

	public function index()
	{
		$page_content["page"] 	= 'berita_acara/tables';
		$page_content["css"] 	= '';
		$page_content["js"] 	= '';
		$page_content["title"] 	= "Berita Acara";
		$page_content["data"] 	= "";

		$this->templates->pageTemplates($page_content);
	}

	public function berita_acara(){
		$data['tps'] 		= $this->m_berita_acara->get_tps_data($this->session->userdata('id_login'))->result_array();
		$data['pemilihan'] 	= $this->m_berita_acara->get_pemilihan($this->session->userdata('id_kegiatan'))->result_array();
		$data['kandidat'] 	= $this->m_dinamic->getWhere('kandidat','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
        $html_header = $this->load->view('berita_acara/header_berita_acara', $data, TRUE);
        $html_isi = $this->load->view('berita_acara/main_berita_acara', $data, TRUE);
        // $mpdf->Output();
		
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
		$mpdf->WriteHTML($html_isi);
		// $mpdf->AddPage();
		// $mpdf->WriteHTML('<p>iya</p>');
		// $mpdf->WriteHTML('Hello World');

		$mpdf->Output();
	}

	public function hasil_suara(){
		if ($this->session->userdata('id_jenis') == 1) {
			$jumlah_pemilih			= $this->m_berita_acara->get_tps_umum($this->session->userdata('id_login'));
			$jumlah_belum_memilih	= $this->m_berita_acara->get_tps_free_umum($this->session->userdata('id_login'));
		}else{
			$jumlah_pemilih			= $this->m_berita_acara->get_tps_pelajar($this->session->userdata('id_login'));
			$jumlah_belum_memilih	= $this->m_berita_acara->get_tps_free_pelajar($this->session->userdata('id_login'));
		}
		$data['jumlah_pemilih']			= $jumlah_pemilih;
		$data['jumlah_belum_memilih']	= $jumlah_belum_memilih;
		$data['tps'] 					= $this->m_berita_acara->get_tps_data($this->session->userdata('id_login'))->result_array();
		$data['pemilihan'] 				= $this->m_berita_acara->get_pemilihan($this->session->userdata('id_kegiatan'))->result_array();
		$data['kandidat'] 				= $this->m_dinamic->getWhere('kandidat','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
		// $data['kandidat'] 	= $this->m_dinamic->getWhere('kandidat','id_kegiatan',$this->session->userdata('id_kegiatan'))->result_array();
        $html_header = $this->load->view('berita_acara/header_hasil_c1', $data, TRUE);
        $html_isi = $this->load->view('berita_acara/main_hasil_c1', $data, TRUE);
        // $mpdf->Output();
		
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
		$mpdf->WriteHTML($html_isi);
		// $mpdf->AddPage();
		// $mpdf->WriteHTML('<p>iya</p>');
		// $mpdf->WriteHTML('Hello World');

		$mpdf->Output();
	}
}
