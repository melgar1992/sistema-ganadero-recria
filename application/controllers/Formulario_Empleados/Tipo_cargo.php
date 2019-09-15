<?php

class Tipo_cargo extends BaseController
{
    public function index()
    {
        $data = array(
            'tipo_cargos' => $this->Tipo_cargo_model->getTipoCargos(),
        );

        $this->loadView('Tipo_contrato', '/form/formulario_empleado/tipo_cargo/list', $data);
    
    }
    public function guardartipo_cargo()
    {
        $cargo = $this->input->post("cargo");
        $area = $this->input->post("area");
    
        $this->form_validation->set_rules("cargo", "Cargo", "required|is_unique[tipos_cargos.cargo]");
        if ($this->form_validation->run()) {


            $data = array(
                'cargo' => $cargo,
                'area' => $area,
                'estado' => "1"
            );

            if ($this->Tipo_cargo_model->guardarCat($data)) {
                redirect(base_url() ."Formulario_Empleados/Tipo_cargo");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        
        } else {
            $this->index();
      
        }
    

        }
    
    public function editar($id_tipo_cargo)
    {

        $data = array(
            'tipo_cargo' => $this->Tipo_cargo_model->getTipoCargo($id_tipo_cargo),
        );
        $this->loadView('Cargos', '/form/formulario_empleado/tipo_cargo/editar', $data);
    }
    public function actualizarTipoCargo()
    {
        $id_tipo_cargo= $this->input->post("id_tipo_cargo");
        $cargo = $this->input->post("cargo");
        $area = $this->input->post("area");
        
        $cargoActual=$this->Tipo_cargo_model->getTipoCargo($id_tipo_cargo);
        if ($cargo==$cargoActual->cargo) {
            $unique='';

        }
        else{
            $unique='|is_unique[tipos_cargos.cargo]';
        }

        $this->form_validation->set_rules("cargo", "Cargo", "required".$unique);
        if ($this->form_validation->run()) {

            $data = array(
                'cargo' => $cargo,
                'area' => $area,
                'estado' => "1"
            );
            if ($this->Tipo_cargo_model->actualizar($id_tipo_cargo, $data)) {
                redirect(base_url() . "Formulario_Empleados/Tipo_cargo");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formulario_Empleados/Tipo_cargo/editar" . $id_tipo_cargo);
            }
        }
        else {
            $this->editar($id_tipo_cargo);
        }
        
        
    }   
    
    public function borrar($id_tipo_cargo)
    {
        $data = array(
            'estado' => "0",

        );
        $this->Tipo_cargo_model->actualizar($id_tipo_cargo, $data);
        redirect(base_url() . "Formulario_Empleados/Tipo_cargo");
    }


}