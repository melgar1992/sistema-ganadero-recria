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

    public function guardarEmpleado()
    {
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $tipo_cargo = $this->input->post('tipo_cargo');
        $direccion = $this->input->post('direccion');
        $fecha_ingreso = $this->input->post('fecha_ingreso');
        $fecha_salida = $this->input->post('fecha_salida');
        $sueldo = $this->input->post('sueldo');
        $afp_empleado = $this->input->post('afp_empleado');
        $afp_empleador = $this->input->post('afp_empleador');
        $caja_nacional = $this->input->post('caja_nacional');
        $sueldo_liquido = $this->input->post('sueldo_liquido');
        $sueldo_total = $this->input->post('sueldo_total');


        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required|is_unique[persona.carnet_identidad]");
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        $this->form_validation->set_rules("tipo_cargo", "Tipo Cargo", "required");
        $this->form_validation->set_rules("fecha_ingreso", "Fecha ingreso", "required");
        $this->form_validation->set_rules("sueldo", "Sueldo", "required");
        $this->form_validation->set_rules("afp_empleado", "Afp del empleado", "required");
        $this->form_validation->set_rules("afp_empleador", "afp del empleador", "required");
        $this->form_validation->set_rules("caja_nacional", "Caja Nacional seguro", "required");
        $this->form_validation->set_rules("sueldo_liquido", "Sueldo Liquido", "required");
        $this->form_validation->set_rules("sueldo_total", "Sueldo total", "required");


        if ($this->form_validation->run()) {


            $datospersona = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datosempleado = array(

                'direccion' => $direccion,
            );
            $datoscontrato = array(

                'id_tipos_cargos' => $tipo_cargo,
                'fecha_ingreso' => $fecha_ingreso,
                'fecha_salida' => $fecha_salida,
                'sueldo' => $sueldo,
                'fecha_ingreso' => $fecha_ingreso,
                'afp_empleado' => $afp_empleado,
                'afp_empleador' => $afp_empleador,
                'caja_nacional' => $caja_nacional,
                'sueldo_liquido' => $sueldo_liquido,
                'sueldo_total' => $sueldo_total,
                'estado' => '1',

            );

            if ($this->Empleado_model->guardarEmpleado($datospersona, $datosempleado, $datoscontrato)) {
                redirect(base_url() . "Formulario_Empleados/Empleado");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_contrato_empleado)
    {
        $data = array(
            'empleado' => $this->Empleado_model->getEmpleado($id_contrato_empleado),
            'tipos_cargos' => $this->Tipo_cargo_model->getTipoCargos(),
        );

        $this->loadView('Empleado', '/form/formulario_empleado/empleado/editar', $data);
    }
    public function actualizarEmpleado()
    {
        $id_contrato_empleado = $this->input->post('id_contrato_empleado');
        $id_empleado = $this->input->post('id_empleado');
        $id_persona = $this->input->post('id_persona');
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $tipo_cargo = $this->input->post('tipo_cargo');
        $direccion = $this->input->post('direccion');
        $fecha_ingreso = $this->input->post('fecha_ingreso');
        $fecha_salida = $this->input->post('fecha_salida');
        $sueldo = $this->input->post('sueldo');
        $afp_empleado = $this->input->post('afp_empleado');
        $afp_empleador = $this->input->post('afp_empleador');
        $caja_nacional = $this->input->post('caja_nacional');
        $sueldo_liquido = $this->input->post('sueldo_liquido');
        $sueldo_total = $this->input->post('sueldo_total');




        $empleadoActual = $this->Empleado_model->getEmpleado($id_contrato_empleado);
        if ($ci == $empleadoActual->carnet_identidad) {
            $unique = '';
        } else {
            $unique = '|is_unique[persona.carnet_identidad]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required" . $unique);
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        $this->form_validation->set_rules("tipo_cargo", "Tipo Cargo", "required");
        $this->form_validation->set_rules("fecha_ingreso", "Fecha ingreso", "required");
        $this->form_validation->set_rules("sueldo", "Sueldo", "required");
        $this->form_validation->set_rules("afp_empleado", "Afp del empleado", "required");
        $this->form_validation->set_rules("afp_empleador", "afp del empleador", "required");
        $this->form_validation->set_rules("caja_nacional", "Caja Nacional seguro", "required");
        $this->form_validation->set_rules("sueldo_liquido", "Sueldo Liquido", "required");
        $this->form_validation->set_rules("sueldo_total", "Sueldo total", "required");

        if ($this->form_validation->run()) {

            $datospersona = array(

                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datosEmpleado = array(

                'direccion' => $direccion,
               
            );
            $datosContrato = array(

                'id_tipos_cargos' => $tipo_cargo,
                'fecha_ingreso' => $fecha_ingreso,
                'fecha_salida' => $fecha_salida,
                'sueldo' => $sueldo,
                'fecha_ingreso' => $fecha_ingreso,
                'afp_empleado' => $afp_empleado,
                'afp_empleador' => $afp_empleador,
                'caja_nacional' => $caja_nacional,
                'sueldo_liquido' => $sueldo_liquido,
                'sueldo_total' => $sueldo_total,
                'estado' => '1',
               
            );


            if ($this->Empleado_model->actualizar($id_persona, $id_empleado, $id_contrato_empleado, $datospersona, $datosEmpleado, $datosContrato)) {
                redirect(base_url() . "Formulario_Empleados/Empleado");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formulario_Empleados/Empleado/editar" . $id_contrato_empleado);
            }
        } else {
            $this->Editar($id_contrato_empleado);
        }
    
    }
    public function borrar($id_contrato_empleado)
    {
         $empleado = $this->Empleado_model->getEmpleado($id_contrato_empleado);
        
        $datosborrar = array(
            'estado' =>'0' ,
             );
            $this->Empleado_model->borrar($empleado,$datosborrar);
            $this->index();
    }
}
