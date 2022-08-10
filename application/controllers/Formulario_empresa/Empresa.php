<?php

class Empresa extends BaseController
{
    public function index()
    {
        $data = array(
            'empresa' => $this->Empresa_model->getEmpresa()
        );

        $this->loadView('Empresa', '/form/formulario_empresa/list', $data);
    }
    public function guardarEmpresa()
    {
        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $descripcion = $this->input->post('descripcion');
        $id = $this->input->post('id');

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("telefono", "Telefono", "required");


        if ($this->form_validation->run()) {
            if ($id == 0) {
                $this->Empresa_model->guardarEmpresa($nombre, $telefono, $descripcion);
                $this->index();
            } else {
                $this->Empresa_model->actualizar($id, $nombre, $telefono, $descripcion);
                $this->index();
            }
        } else {
            $this->index();
        }
    }
}
