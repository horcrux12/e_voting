<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;

class Coba extends MX_Controller {

    protected function ci()
    {
        return get_instance();
    }

	// Load database
	public function __construct(){
		parent::__construct();
		// $this->load->model('Get_data');
		$this->load->helper('url');
		// $this->load->library('upload');
		// $this->load->library('image_lib');
		// require_once('fpdf/fpdf.php');
		// require_once('fpdi/fpdi.php');
	}
	
	public function index()
	{
		// require_once('tcpdf/tcpdf.php');
		// require_once('fpdi2/src/autoload.php');	

		// $data['title'] = "Detail";
        // $this->load->view('coba', $data );
        
		// $mpdf = new \Mpdf\Mpdf();
		$data['isi'] = "isi";
        $html_header = $this->load->view('header_c1', [], TRUE);
        $html_isi = $this->load->view('main_c1', $data, TRUE);
        // $mpdf->Output();
		
		$mpdf = new \Mpdf\Mpdf([
			'setAutoTopMargin' => 'stretch',
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
		// $mpdf->WriteText(5,'www.fpdf.org','http://www.fpdf.org');
		$mpdf->WriteHTML($html_isi);
		$mpdf->AddPage();
		$mpdf->WriteHTML('<p>iya</p>');
		// $mpdf->WriteHTML('Hello World');

		$mpdf->Output();
	}
}
