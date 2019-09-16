<?php

class Ganadero extends BaseController
{
    public function index()
    {
        $data = array(
            'ganaderos' => $this->Ganadero_model->getGanaderosExterno(),
        );

        $this->loadView('Ganadero', '/form/formulario_generales/ganadero/list', $data);
    
    }
    public function guardarGanadero()
    {
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $tipo_ganadero = $this->input->post('tipo_ganadero');
        $nombre_estancia = $this->input->post('nombre_estancia');
        $departamento = $this->input->post('departamento');
        $provincia = $this->input->post('provincia');
        $municipio = $this->input->post('municipio');
        $referencia = $this->input->post('referencia');

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
            $datosganadero = array(
                'tipo_ganadero' => $tipo_ganadero,
                'estado' => "1" 
            );
            $datosestancia = array(
                'nombre' => $nombre_estancia,
                'departamento' => $departamento,
                'provincia' => $provincia,
                'municipio' => $municipio,
                'referencia' => $referencia,
            );

            if ($this->Ganadero_model->guardarGanadero($datospersona, $datosganadero, $datosestancia)) {
                redirect(base_url() . "Formularios_Generales/ganadero");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
        
    }

    public function editar($id_ganadero)
    {
        $data = array(
            'ganadero' => $this->Ganadero_model->getGanadero($id_ganadero),
        );
        $this->loadView('Ganadero', '/form/formulario_generales/ganadero/editar', $data);
    }

    public function actualizarGanadero()
    {
        $id_ganadero = $this->input->post("id_ganadero");
        $id_persona = $this->input->post("id_persona");
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');


        $ganaderoActual = $this->Ganadero_model->getGanadero($id_ganadero);
        if ($ci == $ganaderoActual->carnet_identidad) {
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
            $datosganadero = array(
                'estado' => "1"
            );

            if ($this->Transportista_model->actualizar($id_ganadero,$id_persona, $datospersona,$datosganadero)) {
                redirect(base_url() . "Formularios_Generales/Ganadero");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios_Generales/Ganadero/editar" . $id_ganadero);
            }
        } else {
            $this->Editar($id_ganadero);
        }
    }
    public function borrar($id_ganadero)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Transportista_model->borrar($id_ganadero, $data);
        redirect(base_url() . "Formularios_Generales/Ganadero");
    }


}