<?php

class Transportista extends BaseController
{
    public function index()
    {
        $data = array(
            'tipo_transportes' => $this->Tipo_transporte_model->getTipoTransporte(),
            'transportistas' => $this->Transportista_model->getTransportistas(),
        );

        $this->loadView('Transportista', '/form/formulario_generales/transportista/list', $data);
    }
    public function guardarTransportista()
    {
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $trayecto = $this->input->post('trayecto');
        $id_tipo_transporte = $this->input->post('tipo_transporte');

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required|is_unique[persona.carnet_identidad]");
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        $this->form_validation->set_rules("trayecto", "trayecto", "required");
        $this->form_validation->set_rules("tipo_transporte", "Tipo transporte", "required");

        if ($this->form_validation->run()) {


            $datospersona = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datostransportista = array(
                'trayecto' => $trayecto,
                'id_tipo_transporte' => $id_tipo_transporte,
                'estado' => "1"
            );

            if ($this->Transportista_model->guardarTransportista($datospersona, $datostransportista)) {
                redirect(base_url() . "Formularios_Generales/Transportista");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_transportista)
    {
        $data = array(
            'transportista' => $this->Transportista_model->getTransportista($id_transportista),
            'tipo_transportes' => $this->Tipo_transporte_model->getTipoTransporte(),
        );
        $this->loadView('Tipo_transporte', '/form/formulario_generales/transportista/editar', $data);
    }
    public function ActualizarTransportista()
    {
        $id_transportista = $this->input->post("id_transportista");
        $id_persona = $this->input->post("id_persona");
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $trayecto = $this->input->post('trayecto');
        $id_tipo_transporte = $this->input->post('tipo_transporte');




        $transportistaActual = $this->Transportista_model->getTransportista($id_transportista);
        if ($ci == $transportistaActual->carnet_identidad) {
            $unique = '';
        } else {
            $unique = '|is_unique[persona.carnet_identidad]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules("ci", "CI", "required" . $unique);
        $this->form_validation->set_rules("telefono", "Telefono", "required");
        $this->form_validation->set_rules("trayecto", "trayecto", "required");
        $this->form_validation->set_rules("tipo_transporte", "Tipo transporte", "required");

        if ($this->form_validation->run()) {

            $datospersona = array(

                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datostransportista = array(
                
                'trayecto' => $trayecto,
                'id_tipo_transporte' => $id_tipo_transporte,
                'estado' => "1"
            );

            if ($this->Transportista_model->actualizar($id_transportista,$id_persona, $datospersona,$datostransportista)) {
                redirect(base_url() . "Formularios_Generales/Transportista");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios_Generales/Transportista/editar" . $id_transportista);
            }
        } else {
            $this->Editar($id_transportista);
        }
    }
    public function borrar($id_transportista)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Transportista_model->borrar($id_transportista, $data);
        redirect(base_url() . "Formularios_Generales/Transportista");
    }
}
