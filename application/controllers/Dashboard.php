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
  public function Reporte_categoria_bovino()
  {
    $datos = array(
      'inventario_categorias' => $this->Reportes_model->getInvenarioCategoriaBovino(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/categoria_animales_bovinos', $datos);
  }
  public function Reporte_categoria_animal()
  {
    $datos = array(
      'inventario_categorias' => $this->Reportes_model->getIventarioCategoriAnimal(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/categoria_animales_bovinos', $datos);
  }
  public function Reporte_venta_animal_bovino()
  {
    $datos = array(
      'venta_animales_bovinos' => $this->Reportes_model->getReporteVentaCategoriaBovino(),
      'totales_ventas' => $this->Reportes_model->getSumaTotalesVentasAnualAnimalesBovinos(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/venta_animales_bovinos', $datos);
  }
  public function Reporte_venta_animal()
  {
    $datos = array(
      'venta_animales_bovinos' => $this->Reportes_model->getReporteVentaCategoriaAnimal(),
      'totales_ventas' => $this->Reportes_model->getSumaTotalesVentasAnualAnimales(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/venta_animales_bovinos', $datos);
  }
  public function Reporte_compra_animal_bovino()
  {
    $datos = array(
      'compra_animales_bovinos' => $this->Reportes_model->getReporteCompraCategoriaBovino(),
      'totales_compras' => $this->Reportes_model->getSumaTotalesCompraAnualBovinos(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/compra_animales', $datos);
  }
  public function Reporte_compra_animal()
  {
    $datos = array(
      'compra_animales_bovinos' => $this->Reportes_model->getReporteCompraCategoriaAnimal(),
      'totales_compras' => $this->Reportes_model->getSumaTotalesCompraAnualAnimales(),
    );
    $this->load->view('form/reportes/reportes_suplementarios/compra_animales', $datos);
  }
  public function Control_animal_bovino()
  {
    $datos = array(
      'control_animales' => $this->Reportes_model->getReporteControlBovino(),

    );

    $this->load->view('form/reportes/reportes_suplementarios/control_animal', $datos);
  }
  public function Balance_general()
  {
    $fechafin = $this->input->post('fechafin');
    $fechainicio = $this->input->post('fechainicio');
    
    $datos = array(
      'ingreso_venta_animal' => $this->Reportes_model->getIngresoVentaAnimalesEntreFechas($fechainicio, $fechafin),
      'comision_venta' => $this->Reportes_model->getComisionVentasAnimales($fechainicio, $fechafin),
      'otros_ingresos' => $this->Reportes_model->getOtrosIngresos($fechainicio, $fechafin),
      'pago_gastos_fijos' => $this->Reportes_model->getPagoGastosFijos($fechainicio, $fechafin),
      'pago_gastos_variables' => $this->Reportes_model->getPagoGastosVariables($fechainicio, $fechafin),
      'pago_empleados' => $this->Reportes_model->getPagoEmpleados($fechainicio, $fechafin),
      'egreso_compra_animal' => $this->Reportes_model->getIngresoCompraAnimalesEntreFechas($fechainicio, $fechafin),

    );

    $this->load->view('form/reportes/reportes_generales/balance_general', $datos);
  }
}
