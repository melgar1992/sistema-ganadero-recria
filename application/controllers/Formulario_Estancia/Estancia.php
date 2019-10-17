<?php

class Estancia extends BaseController
{
    public function index()
    {
        $data = array(
            'empleados' => $this->Empleado_model->getEmpleados(),
            'estancias' => $this->Estancia_model->getEstancias(),

        );

        $this->loadView('Estancia', '/form/formulario_estancia/estancia/list', $data);
    }
    public function guardarEstancia()
    {

        $id_empleado = $this->input->post('id_empleado');
        $nombre = $this->input->post('nombre');
        $departamento = $this->input->post('departamento');
        $provincia = $this->input->post('provincia');
        $municipio = $this->input->post('municipio');
        $referencia = $this->input->post('referencia');

        $this->form_validation->set_rules("id_empleado", "id_empleado", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("departamento", "departamento", "required");
        $this->form_validation->set_rules("provincia", "provincia", "required");
        $this->form_validation->set_rules("municipio", "municipio", "required");
        $this->form_validation->set_rules("referencia", "referencia", "required");

        if ($this->form_validation->run()) {
            $datos = array(
                'id_empleado' => $id_empleado,
                'nombre' => $nombre,
                'departamento' => $departamento,
                'provincia' => $provincia,
                'municipio' => $municipio,
                'referencia' => $referencia,
                'estado' => '1'
            );
            if ($this->Estancia_model->guardarEstancia($datos)) {
                redirect(base_url() . "Formulario_Estancia/Estancia");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function actualizarEstancia()
    {
        $id_estancia = $this->input->post('id_estancia');
        $id_empleado = $this->input->post('id_empleado');
        $nombre = $this->input->post('nombre');
        $departamento = $this->input->post('departamento');
        $provincia = $this->input->post('provincia');
        $municipio = $this->input->post('municipio');
        $referencia = $this->input->post('referencia');

        $this->form_validation->set_rules("id_empleado", "id_empleado", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("departamento", "departamento", "required");
        $this->form_validation->set_rules("provincia", "provincia", "required");
        $this->form_validation->set_rules("municipio", "municipio", "required");
        $this->form_validation->set_rules("referencia", "referencia", "required");

        if ($this->form_validation->run()) {
            $datos = array(
                'id_empleado' => $id_empleado,
                'nombre' => $nombre,
                'departamento' => $departamento,
                'provincia' => $provincia,
                'municipio' => $municipio,
                'referencia' => $referencia,
                'estado' => '1'
            );
            if ($this->Estancia_model->actualizarEstancia($id_estancia, $datos)) {
                redirect(base_url() . "Formulario_Estancia/Estancia");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_estancia)
    {


        $data = array(
            'empleados' => $this->Empleado_model->getEmpleados(),
            'estancia' => $this->Estancia_model->getEstancia($id_estancia),

        );

        $this->loadView('Estancia', '/form/formulario_estancia/estancia/editar', $data);
    }
    public function borrar($id_estancia)
    {
        $datos = array(
            'estado' => '0', 
        );

        $this->Estancia_model->actualizarEstancia($id_estancia,$datos);
        echo "Formulario_Estancia/Estancia";
    }
}
