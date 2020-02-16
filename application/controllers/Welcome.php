<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDashboard');
    }

	public function index()
	{
		$data['kriteria'] 	= $this->MDashboard->count_kriteria();
		$data['siswa'] 		= $this->MDashboard->count_siswa();
		$data['panitia'] 	= $this->MDashboard->count_panitia();

		$this->page->setTitle('Dashboard');
		loadPage('layouts/index',$data);
	}
}
