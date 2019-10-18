<?php

class Venta_animales extends BaseController
{
    public function index()
    {
        $data = array(
            'ventas_animales' => $this->Venta_animales_model->getVentasAnimales(),

        );


        $this->loadView('Ingresos', '/form/formulario_animales/egreso_animales/list', $data);
    
    }


}