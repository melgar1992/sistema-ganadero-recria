<?php

class Egreso_gasto_variable extends BaseController
{
    public function index()
    {
        $data = array(
            'egresos_gastos_variables' => $this->Egreso_gasto_variable_model->getEgresos(),

        );


        $this->loadView('Egreso_gastos_variable', '/form/formulario_egresos/egreso_gasto_variable/list', $data);
    }

    public function add()
    {
        $data = array(
            'egresos_gastos_variables' => $this->Egreso_gasto_variable_model->getEgresos(),
            "categoriaegresovariables" => $this->Egreso_gasto_variable_model->getCategoriaEgresos(),
            "empleados" => $this->Empleado_model->getEmpleados(),
        );
        $this->loadView('Egreso_gastos_variable', '/form/formulario_egresos/egreso_gasto_variable/add', $data);
    }


    public function guardarEgresos()
    {
        $id_tipo_gastos_variables = $this->input->post("categoriagastosvariables");
        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");
      
        $total = $this->input->post("total");

        $this->form_validation->set_rules("categoriagastosvariables", "categoriagastosvariables", "required");
        $this->form_validation->set_rules("id_empleado", "id_empleado", "required");
        $this->form_validation->set_rules("fecha", "fecha", "required");
       

        $cantidad = $this->input->post("cantidad");
        $detalle = $this->input->post("detalle");
        $precio_unitario = $this->input->post("precio_unitario");
        $sub_total = $this->input->post("sub_total");

        if ($this->form_validation->run()) {
            $data = array(
                'id_tipo_gastos_variables' => $id_tipo_gastos_variables,
                'id_empleado' => $id_empleado,
                'id_usuarios' => $usuarios,
                'fecha' => $fecha,
               
                'total' => $total,
                'estado' => '1'

            );

            if ($this->Ingreso_model->guardarEgresos($data)) {
                $id_gastos_variables = $this->Egreso_gasto_variable_model->ultimoID();
                $this->guardar_detalle($id_gastos_variables, $cantidad, $detalle, $precio_unitario, $sub_total);
                $this->index();
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . 'Formulario_egresos/Egreso_gasto_variable/add');
            }
        } else {
            redirect(base_url() . "Formulario_egresos/Egreso_gasto_variable/add");
        }
    }

    protected function guardar_detalle($id_gastos_variables, $cantidad, $detalle, $precio_unitario, $sub_total)
    {
        if (!empty($cantidad)) {
            for ($i = 0; $i < count($cantidad); $i++) {
                $data = array(

                    'id_gastos_variables' => $id_gastos_variables,
                    'cantidad' => $cantidad[$i],
                    'detalle' => $detalle[$i],
                    'precio_unitario' => $precio_unitario[$i],
                    'sub_total' => $sub_total[$i],
                );
                $this->Egreso_gasto_variable_model->guardar_detalle($data);
            }
        }
    }

    public function editar($id_otros_ingresos)
    {
        $data = array(
            'ingreso' => $this->Ingreso_model->getIngreso($id_otros_ingresos),
            'detalle_ingresos' => $this->Ingreso_model->getDetalle($id_otros_ingresos),
            "empleados" => $this->Empleado_model->getEmpleados(),
            "categoriaingresos" => $this->Ingreso_model->getCategoriaIngresos(),
        );

        $this->loadView('Ingresos', '/form/formulario_ingresos/ingresos/editar', $data);
    }
    public function actualizarIngreso()
    {
        $id_otros_ingresos = $this->input->post('id_otros_ingresos');
        $id_categoria_ingresos = $this->input->post("categoriaingresos");
        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");
        $forma_pago = $this->input->post("forma_pago");
        $total = $this->input->post("total");

        $this->form_validation->set_rules("categoriaingresos", "categoriaingresos", "required");
        $this->form_validation->set_rules("id_empleado", "id_empleado", "required");
        $this->form_validation->set_rules("fecha", "fecha", "required");
        $this->form_validation->set_rules("forma_pago", "forma_pago", "required");

        $cantidad = $this->input->post("cantidad");
        $detalle = $this->input->post("detalle");
        $precio_unitario = $this->input->post("precio_unitario");
        $sub_total = $this->input->post("sub_total");

        if ($this->form_validation->run()) {
            $data = array(
                'id_categoria_ingresos' => $id_categoria_ingresos,
                'id_empleado' => $id_empleado,
                'id_usuarios' => $usuarios,
                'fecha' => $fecha,
                'forma_pago' => $forma_pago,
                'total' => $total,
                'estado' => '1'

            );

            if ($this->Ingreso_model->actualizarIngreso($id_otros_ingresos, $data)) {
                $this->Ingreso_model->borrarDetalleIngreso($id_otros_ingresos);
                $this->guardar_detalle($id_otros_ingresos, $cantidad, $detalle, $precio_unitario, $sub_total);
                $this->index();
            } else {
                redirect(base_url() . 'Formulario_Ingresos/Ingreso/editar' . $id_otros_ingresos);
            }
        } else {
            $this->editar($id_otros_ingresos);
        }
    }
    public function borrar($id_otros_ingresos)
    {
        $data = array(
            'estado' => '0'
        );
        $this->Ingreso_model->actualizarIngreso($id_otros_ingresos, $data);
        echo 'Formulario_Ingresos/Ingreso';
    }

}