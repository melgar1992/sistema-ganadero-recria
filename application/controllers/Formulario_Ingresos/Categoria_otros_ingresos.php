<?php

class Categoria_otros_ingresos extends BaseController
{
    public function index()
    {
        $data = array(
            'categoria_otros_ingresos' => $this->Categoria_otros_ingresos_model->getTipoCategoriaOtrosIngresos(),
        );

        $this->loadView('Categoria_otros_ingresos', '/form/formulario_ingresos/categoria_otros_ingresos/list', $data);
    }
    public function guardarTipoTransporte()
    {
        $nombre = $this->input->post('nombre');
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[categoria_ingresos.nombres]");
        if ($this->form_validation->run()) {


            $data = array(
                'nombres' => $nombre,
                'estado' => "1"
            );

            if ($this->Categoria_otros_ingresos_model->guardarCategoriaIngresos($data)) {
                redirect(base_url() . "Formularios_Ingresos/Categoria_otros_ingresos");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function Editar($id_categoria_ingresos)
    {
        $data = array(
            'categoria_ingresos' => $this->Categoria_otros_ingresos_model->getCategoria_ingreso($id_categoria_ingresos),
        );
        $this->loadView('Tipo_transporte', '/form/formulario_generales/tipo_transporte/editar', $data);
    }
    public function ActualizarTipoTransporte()
    {
        $id_tipo_transporte = $this->input->post("id_tipo_transporte");
        $nombre = $this->input->post("nombre");
        $tipo_transporteActual = $this->Tipo_transporte_model->getTipo_transporte($id_tipo_transporte);
        if ($nombre == $tipo_transporteActual->nombres) {
            $unique = '';
        } else {
            $unique = '|is_unique[tipo_transporte.nombres]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required" . $unique);
        if ($this->form_validation->run()) {

            $data = array(
                'nombres' => $nombre,
                'estado' => "1"
            );
            if ($this->Tipo_transporte_model->actualizar($id_tipo_transporte, $data)) {
                redirect(base_url() . "Formularios_Generales/Tipo_transporte");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios_Generales/Tipo_transporte/editar" . $id_tipo_transporte);
            }
        } else {
            $this->Editar($id_tipo_transporte);
        }
    }
    public function borrar($id_tipo_transporte)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Tipo_transporte_model->actualizar($id_tipo_transporte, $data);
        redirect(base_url() . "Formularios_Generales/Tipo_transporte");
    }
}
    
    


