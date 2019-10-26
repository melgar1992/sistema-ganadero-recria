<?php

class Egreso_gasto_fijo extends BaseController
{
    public function index()
    {
        $data = array(

            'pagos_gastos_fijos' => $this->Egreso_gasto_fijo_model->getPagosGastosFijos(),
            'gastos_fijos' => $this->Gastos_fijo_model->getGastosFijos(),
            'empleados' => $this->Empleado_model->getEmpleados()

        );

        $this->loadView('Egreso_gasto_fijo', 'form/formulario_egresos/egreso_gasto_fijo/list', $data);
    }
    public function guardarEgresoGastoFijo()
    {

        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");
        $gasto_fijo = $this->input->post("gastos_fijos");
        $mes_correspondiente = $this->input->post("mes_correspondiente");
        $total = $this->input->post("total");

        $this->form_validation->set_rules('id_empleado', 'id_empleado', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('gastos_fijos', 'gastos fijos', 'required');
        $this->form_validation->set_rules('mes_correspondiente', 'mes correspondiente', 'required');
        $this->form_validation->set_rules('total', 'total', 'required');
        

        if ($this->form_validation->run()) {

            $data = array(
                'id_empleado' => $id_empleado,
                'id_usuarios' => $usuarios,
                'fecha' => $fecha,
                'id_gastos_fijos' => $gasto_fijo,
                'mes_correspondiente' => $mes_correspondiente,
                'total' => $total,
                'estado'=> '1'
            );
            if ($this->Egreso_gasto_fijo_model->guardarEgresoGastoFijo($data)) {
                $this->index();
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . 'Formulario_Egresos/Egreso_gasto_fijo');
            }
            

        } else {
            $this->session->set_flashdata("error", "Los datos llenados son incorrectos");
            redirect(base_url() . 'Formulario_Egresos/Egreso_gasto_fijo');
        }
    }

    public function editar($id_pago_gasto_fijo)
    {
        $meses=array(
            'Enerno',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre',

        );
        $data = array(

            'pago_gasto_fijo' => $this->Egreso_gasto_fijo_model->getPagoGastoFijo($id_pago_gasto_fijo),
            'gastos_fijos' => $this->Gastos_fijo_model->getGastosFijos(),
            'empleados' => $this->Empleado_model->getEmpleados(),
            'meses'=>$meses,

        );

        $this->loadView('Egreso_gasto_fijo', 'form/formulario_egresos/egreso_gasto_fijo/editar', $data);
    }

    public function actualizarEgresoGastoFijo()
    {
        $id_pago_gasto_fijo = $this->input->post("id_pago_gasto_fijo");
        $id_empleado = $this->input->post("id_empleado");
    
        $gasto_fijo = $this->input->post("gastos_fijos");
        $mes_correspondiente = $this->input->post("mes_correspondiente");
        $total = $this->input->post("total");

        $this->form_validation->set_rules('empleado', 'Datos del empleado', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('gastos_fijos', ' gastos_fijos', 'required');
        $this->form_validation->set_rules('mes_correspondiente', 'mes_correspondiente', 'required');
        $this->form_validation->set_rules('total', 'total', 'required');
        if ($this->form_validation->run()) {

            $data = array(
               'id_empleado'=>$id_empleado,
                'id_gastos_fijos' => $gasto_fijo,
                'mes_correspondiente' => $mes_correspondiente,
                'total' => $total,
                'estado'=> '1'
            );
            if ($this->Egreso_gasto_fijo_model->actualizarEgresoGastoFijo($id_pago_gasto_fijo,$data)) {
                $this->index();
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . 'Formulario_Egresos/Egreso_gasto_fijo');
            }
            

        } else {
            $this->index();
        }
    }
    public function borrar($id_pago_gasto_fijo)
    {
        $datos = array('estado' => '0', );
        $this->Egreso_gasto_fijo_model->actualizarEgresoGastoFijo($id_pago_gasto_fijo,$datos);
        echo 'Formulario_Egresos/Egreso_gasto_fijo';
    }



}