<?php

class Gastos_fijo extends BaseController
{
    public function index()
    {
        $data = array(
            'gastos_fijos' => $this->Gastos_fijo_model->getGastosFijos(),
        );

        $this->loadView('Gastos_fijos', '/form/formulario_egresos/gastos_fijos/list', $data);
    }
    public function guardarGastoFijo()
    {
        $nombre = $this->input->post("nombre");
        $total = $this->input->post("total");
        $id_usuario = $this->input->post("id_usuario");

        $this->form_validation->set_rules(
            'nombre',
            'nombre',
            array(
                'required',
                array('validarCuenta', array($this->Gastos_fijo_model, 'validarCuenta'))
            ),
            array('validarCuenta' => 'La cuenta ya existe!')
        );
        $this->form_validation->set_rules('total', 'Total', 'required');
        if ($this->form_validation->run()) {
            $data = array(
                'nombre' => $nombre,
                'total' => $total,
                'estado' => "1",
                'id_usuarios' => $id_usuario
            );

            if ($this->Gastos_fijo_model->guardarGastoFijo($data)) {
                redirect(base_url() . "Formulario_Egresos/Gastos_fijo");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_gasto_fijo)
    {
        $data = array(
            'gasto_fijo' => $this->Gastos_fijo_model->getGastoFijo($id_gasto_fijo),
        );

        $this->loadView('Gastos_fijos', '/form/formulario_egresos/gastos_fijos/editar', $data);
    }
    public function actualizarGastoFijo()
    {
        $nombre = $this->input->post("nombre");
        $total = $this->input->post("total");
        $id_usuario = $this->input->post("id_usuarios");
        $id_gasto_fijo = $this->input->post("id_gastos_fijos");

        $gastoFijoActual = $this->Gastos_fijo_model->getGastoFijo($id_gasto_fijo);
        if ($nombre == $gastoFijoActual->nombre) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('total', 'Total', 'required');
            
        } else {
            $this->form_validation->set_rules(
                'nombre',
                'nombre',
                array(
                    'required',
                    array('validarCuenta', array($this->Gastos_fijo_model, 'validarCuenta'))
                ),
                array('validarCuenta' => 'La cuenta ya existe!')
            );
            $this->form_validation->set_rules('total', 'Total', 'required');
        }


        if ($this->form_validation->run()) {
            $data = array(
                'nombre' => $nombre,
                'total' => $total,
                'estado' => "1",
                'id_usuarios' => $id_usuario
            );

            if ($this->Gastos_fijo_model->actualizar($id_gasto_fijo, $data)) {
                redirect(base_url() . "Formulario_Egresos/Gastos_fijo");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->editar($id_gasto_fijo);
        }
    }


    public function borrar($id_gastos_fijos)
    {
        $data = array(
            'estado' => "0",
        );

        
        $this->Gastos_fijo_model->actualizar($id_gastos_fijos, $data);
        echo "Formulario_Egresos/Gastos_fijo";
    }
}
