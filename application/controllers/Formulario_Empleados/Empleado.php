<?php

class Empleado extends BaseController
{
    public function index()
    {
        $data = array(
            'empleados' => $this->Empleado_model->getEmpleados(),

            'tipos_cargos' => $this->Tipo_cargo_model->getTipoCargos(),
        );

        $this->loadView('Empleado', '/form/formulario_empleado/empleado/list', $data);
    }


}