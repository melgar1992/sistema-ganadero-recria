<?php

class Pago_empleado extends BaseController
{
    public function index()
    {
        $data = array(

            'boletas_pagos' => $this->Pago_empleado_model->getBoletasPagos(),
            'tipos_pagos' => $this->Pago_empleado_model->getTiposPagos(),
            'empleados' => $this->Empleado_model->getEmpleados()
        
        );
    
        $this->loadView('PagoEmpleado','form/formulario_egresos/pago_empleado/list',$data);
    }


}