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
            "empleados" => $this->Egreso_gasto_variable_model->getEmpleados(),
        );
        $this->loadView('Egreso_gastos_variable', '/form/formulario_egresos/egreso_gasto_variable/add', $data);
    }


    public function guardarEgresos()
    {
        $id_tipo_gastos_variables = $this->input->post("categoriaegresovariables");
        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");   
        $total = $this->input->post("total");
        $this->form_validation->set_rules("categoriaegresovariables", "categoriaegresovariables", "required");
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

            if ($this->Egreso_gasto_variable_model->guardarEgresos($data)) {
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

    public function editar($id_gastos_variables)
    {
        $data = array(
            'egreso_gasto_variable' => $this->Egreso_gasto_variable_model->getEgreso($id_gastos_variables),
            'detalle_egresos' => $this->Egreso_gasto_variable_model->getDetalle($id_gastos_variables),
            "empleados" => $this->Egreso_gasto_variable_model->getEmpleados(),
            "categoriaegresovariables" => $this->Egreso_gasto_variable_model->getCategoriaEgresos(),
        );

        $this->loadView('Egreso_gastos_variable', '/form/formulario_egresos/egreso_gasto_variable/editar', $data);
    }
    public function actualizarEgreso()
    {
        $id_gastos_variables = $this->input->post('id_gastos_variables');
        $id_tipo_gastos_variables = $this->input->post("categoriaegresovariables");
        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");
        $total = $this->input->post("total");

        $this->form_validation->set_rules("categoriaegresovariables", "categoriaegresovariables", "required");
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

            if ($this->Egreso_gasto_variable_model->actualizarEgreso($id_gastos_variables, $data)) {
                $this->Egreso_gasto_variable_model->borrarDetalleEgreso($id_gastos_variables);
                $this->guardar_detalle($id_gastos_variables, $cantidad, $detalle, $precio_unitario, $sub_total);
                $this->index();
            } else {
                redirect(base_url() . 'Formulario_Egresos/Egreso_gasto_variable/editar' . $id_gastos_variables);
            }
        } else {
            $this->editar($id_gastos_variables);
        }
    }
    public function borrar($id_gastos_variables)
    {
        $data = array(
            'estado' => '0'
        );
        $this->Egreso_gasto_variable_model->actualizarEgreso($id_gastos_variables, $data);
        echo 'Formulario_Egresos/Egreso_gasto_variable';
    }

}