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
    public function guardarCategoriaOtrosIngresos()
    {
        $nombre = $this->input->post('nombre');
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[categoria_ingresos.nombre]");
        if ($this->form_validation->run()) {


            $data = array(
                'nombre' => $nombre,
                'estado' => "1"
            );

            if ($this->Categoria_otros_ingresos_model->guardarCategoriaIngresos($data)) {
                redirect(base_url() . "Formulario_Ingresos/Categoria_otros_ingresos");
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
        $this->loadView('Categoria_otros_ingresos', '/form/formulario_ingresos/categoria_otros_ingresos/editar', $data);
    }
    public function ActualizarCategoriaIngresos()
    {
        $id_categoria_ingresos = $this->input->post("id_categoria_ingresos");
        $nombre = $this->input->post("nombre");
        $categoria_ingresosActual = $this->Categoria_otros_ingresos_model->getCategoria_ingreso($id_categoria_ingresos);
        if ($nombre == $categoria_ingresosActual->nombre) {
            $unique = '';
        } else {
            $unique = '|is_unique[categoria_ingresos.nombre]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required" . $unique);
        if ($this->form_validation->run()) {

            $data = array(
                'nombre' => $nombre,
                'estado' => "1"
            );
            if ($this->Categoria_otros_ingresos_model->actualizarCategoriaIngresos($id_categoria_ingresos, $data)) {
                redirect(base_url() . "Formulario_Ingresos/Categoria_otros_ingresos");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formulario_Ingresos/Categoria_otros_ingresos/editar" . $id_categoria_ingresos);
            }
        } else {
            $this->Editar($id_categoria_ingresos);
        }
    }


    public function borrar($id_categoria_ingresos)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Categoria_otros_ingresos_model->actualizarCategoriaIngresos($id_categoria_ingresos, $data);
        redirect(base_url() . "Formulario_Ingresos/Categoria_otros_ingresos");
    }
}
