<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BaseController {
    
    function __construct(){
		parent::__construct();			
    }    

public function index()
{ 
  $datos['datos']='';

    $this->loadView('','/form/dashboard',$datos);
}
}