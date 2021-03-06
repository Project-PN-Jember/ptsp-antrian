<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->library('secure');
    }

	public function index()
	{
		$data['dataCs'] = $this->db->select('id, nama, status, level, foto')
									->where('level !=', 'admin')
									->where('level !=', 'hakim')
									->where('status_user', 1)
									->get('user')->result();
		$this->load->view('landing-page', $data);
	}
}
