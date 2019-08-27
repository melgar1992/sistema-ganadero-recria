<?php

class Ventas extends BaseController
{

    function __construct()
    {

        parent::__construct();
       
    }

    public function index()
    {
        $fechainicio=$this->input->post("fechainicio");
        $fechafin=$this->input->post("fechafin");
        
        if ($this->input->post("buscar")) {
           $ventas=$this->Ventas_model->getVentasporFecha($fechainicio,$fechafin);

        }
        else{
            $ventas=$this->Ventas_model->getVentas();
        }
       
    

        $data = array(
            'ventas' => $ventas,
            'fechainicio' => $fechainicio,
            'fechafin'=> $fechafin,
         );

        $this->loadView("ReportesVentas","/form/admin/reportes/Ventas",$data);
        
    }




}