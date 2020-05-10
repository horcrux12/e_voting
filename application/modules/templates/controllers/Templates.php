<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller {

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
	public function pageTemplates($page_content)
	{
		$data["page_content"] = $page_content["page"];
        $data["css"] = $page_content["css"];
        $data["js"] = $page_content["js"];
        $data["title"] = $page_content["title"];
		$data["data"] = $page_content["data"];
		
		if ($this->session->userdata('level_admin') == 1) {
			$this->load->view("templates/vertical_template", $data);
		}elseif ($this->session->userdata('level_admin') == 2) {
			$this->load->view("templates/horizontal_template", $data);
		}
	}
}
