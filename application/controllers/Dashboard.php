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
      'inventario' => $this->Inventario_animales_model->getSumatoriaInventarioBovinoAnual(),
      'years' => $this->Reportes_model->getYears(),
      'ingresos_por_meses' => $this->Reportes_model->getIngresosPorMeses(date("y")),
    );

    $this->loadView('Dashboard', '/form/dashboard', $datos);
  }
  public function Reporte_categoria_bovino()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'inventario_categorias' => $this->Reportes_model->getInvenarioCategoriaBovino(),
      'estancias'=>$this->Reportes_model-> getEstanciaAnimalBovino(),
     
    );

    $this->load->view('form/reportes/reportes_suplementarios/categoria_animales_bovinos', $datos);
  }
  public function Reporte_categoria_animal()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'inventario_categorias' => $this->Reportes_model->getIventarioCategoriAnimal(),
      'estancias'=>$this->Reportes_model-> getEstanciaAnimal(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/categoria_animales_bovinos', $datos);
  }
  public function Reporte_venta_animal_bovino()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'venta_animales_bovinos' => $this->Reportes_model->getReporteVentaCategoriaBovino(),
      'totales_ventas' => $this->Reportes_model->getSumaTotalesVentasAnualAnimalesBovinos(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/venta_animales_bovinos', $datos);
  }
  public function Reporte_venta_animal()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'venta_animales_bovinos' => $this->Reportes_model->getReporteVentaCategoriaAnimal(),
      'totales_ventas' => $this->Reportes_model->getSumaTotalesVentasAnualAnimales(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/venta_animales_bovinos', $datos);
  }
  public function Reporte_compra_animal_bovino()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'compra_animales_bovinos' => $this->Reportes_model->getReporteCompraCategoriaBovino(),
      'totales_compras' => $this->Reportes_model->getSumaTotalesCompraAnualBovinos(),
    );

    $this->load->view('form/reportes/reportes_suplementarios/compra_animales', $datos);
  }
  public function Reporte_compra_animal()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'compra_animales_bovinos' => $this->Reportes_model->getReporteCompraCategoriaAnimal(),
      'totales_compras' => $this->Reportes_model->getSumaTotalesCompraAnualAnimales(),
    );
    $this->load->view('form/reportes/reportes_suplementarios/compra_animales', $datos);
  }
  public function Control_animal_bovino()
  {
    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'control_animales' => $this->Reportes_model->getReporteControlBovino(),
      'estancias'=>$this->Reportes_model->getReporteControlBovino(),

    );

    $this->load->view('form/reportes/reportes_suplementarios/control_animal', $datos);
  }
  public function Balance_general()
  {
    $fechafin = $this->input->post('fechafin');
    $fechainicio = $this->input->post('fechainicio');

    $datos = array(
      'empresa' => $this->Empresa_model->getEmpresa(),
      'ingreso_venta_animal' => $this->Reportes_model->getIngresoVentaAnimalesEntreFechas($fechainicio, $fechafin),
      'comision' => $this->Reportes_model->getComisionesAnimales($fechainicio, $fechafin),
      'otros_ingresos' => $this->Reportes_model->getOtrosIngresos($fechainicio, $fechafin),
      'pago_gastos_fijos' => $this->Reportes_model->getPagoGastosFijos($fechainicio, $fechafin),
      'pago_gastos_variables' => $this->Reportes_model->getPagoGastosVariables($fechainicio, $fechafin),
      'pago_empleados' => $this->Reportes_model->getPagoEmpleados($fechainicio, $fechafin),
      'egreso_compra_animal' => $this->Reportes_model->getIngresoCompraAnimalesEntreFechas($fechainicio, $fechafin),

    );

    $this->load->view('form/reportes/reportes_generales/balance_general', $datos);
  }
  public function Datos_grafico_principal()
  {
    $year = $this->input->post('year');
    $datos = array(
      'ingresos_por_meses' => $this->Reportes_model->getIngresosPorMeses($year),
      'egresos_por_meses' => $this->Reportes_model->getEgresoPorMeses($year),
    );

    echo json_encode($datos);
  }
}
