<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends BaseController {
    
    function __construct(){
		parent::__construct();			
    }    


public function index()
	{
		if ($this->session->userdata('login')) {
			redirect(base_url().'Dashboard');
		}
		else {
			$this->load->view('login');
		}
		
	}
	


}
