<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends BaseController
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    $datos = array(
      'ingresos' => $this->Ingreso_model->getIngresoAnual(),
      'egresos' => $this->Egreso_model->getEgresoAnual(),
      'inventario' => $this->inventario_animales_model->getSumatoriaInventarioBovinoAnual(),
    );
    
    $this->loadView('Dashboard', '/form/dashboard', $datos);
  }
}
