<?php

class Intermediario extends BaseController
{
    public function index()
    {
        $data = array(

            'intermediarios' => $this->Intermediario_model->getIntermediarios(),
        );

        $this->loadView('Intermediario', '/form/formulario_generales/intermediario/list', $data);
    }
    public function guardarIntermediario()
    {
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required|is_unique[persona.carnet_identidad]");
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        

        if ($this->form_validation->run()) {


            $datospersona = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datosintermediario = array(
               
                'estado' => "1"
            );

            if ($this->Intermediario_model->guardarIntermediario($datospersona, $datosintermediario)) {
                redirect(base_url() . "Formularios_Generales/Intermediario");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_intermediario)
    {
        $data = array(
            'intermediario' => $this->Intermediario_model->getIntermediario($id_intermediario),
           
        );
        $this->loadView('Intermediario', '/form/formulario_generales/intermediario/editar', $data);
    }
    public function ActualizarIntermediario()
    {
        $id_intermediario = $this->input->post("id_intermediario");
        $id_persona = $this->input->post("id_persona");
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
    

        $intermediarioActual = $this->Intermediario_model->getIntermediario($id_intermediario);
        if ($ci == $intermediarioActual->carnet_identidad) {
            $unique = '';
        } else {
            $unique = '|is_unique[persona.carnet_identidad]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required" . $unique);
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        

        if ($this->form_validation->run()) {

            $datospersona = array(

                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datosintermediario = array(
                
                'estado' => "1"
            );

            if ($this->Intermediario_model->actualizar($id_intermediario,$id_persona, $datospersona,$datosintermediario)) {
                redirect(base_url() . "Formularios_Generales/Intermediario");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios_Generales/Intermediario/editar" . $id_intermediario);
            }
        } else {
            $this->Editar($id_intermediario);
        }
    }
    public function borrar($id_intermediario)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Intermediario_model->borrar($id_intermediario, $data);
        redirect(base_url() . "Formularios_Generales/Intermediario");
    }
    
    }


