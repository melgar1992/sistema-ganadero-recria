<?php

class Categoria_gastos_variable extends BaseController
{
    public function index()
    {
        $data = array(
            'categoria_gastos_variables' => $this->Categoria_gastos_variable_model->getTipoCategoriaGastosVariable(),
        );

        $this->loadView('Categoria_gastos_variable', '/form/formulario_egresos/categoria_gastos_variables/list', $data);
    }
    public function guardarCategoriaGastosVariables()
    {
        $nombre = $this->input->post('nombre');
        $this->form_validation->set_rules(
            'nombre',
            'Nombre',
            array(
                'required',
                array('validarNombre', array($this->Categoria_gastos_variable_model, 'validarNombre'))
            ),
            array('validarNombre' => 'El nombre ya esta siendo ocupado')
        );
        if ($this->form_validation->run()) {


            $data = array(
                'nombre' => $nombre,
                'estado' => "1"
            );

            if ($this->Categoria_gastos_variable_model->guardarCategoriaGastosVariable($data)) {
                redirect(base_url() . "Formulario_Egresos/Categoria_gastos_variable");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function Editar($id_tipo_gastos_variables)
    {
        $data = array(
            'categoria_gastos_variables' => $this->Categoria_gastos_variable_model->getCategoriaGastosVariable($id_tipo_gastos_variables),
        );
        $this->loadView('Categoria_gastos_variable', '/form/formulario_egresos/categoria_gastos_variables/editar', $data);
    }
    public function ActualizarCategoriaGastosVariables()
    {
        $id_tipo_gastos_variables = $this->input->post("id_tipo_gastos_variables");
        $nombre = $this->input->post("nombre");
        $categoria_gastosActual = $this->Categoria_gastos_variable_model->getCategoriaGastosVariable($id_tipo_gastos_variables);
        if ($nombre == $categoria_gastosActual->nombre) {
            $this->form_validation->set_rules("nombre", "Nombre", "required");
        } else {
            $this->form_validation->set_rules(
                'nombre',
                'Nombre',
                array(
                    'required',
                    array('validarNombre', array($this->Categoria_gastos_variable_model, 'validarNombre'))
                ),
                array('validarNombre' => 'El nombre ya esta siendo ocupado')
            );
        }


        if ($this->form_validation->run()) {

            $data = array(
                'nombre' => $nombre,
                'estado' => "1"
            );
            if ($this->Categoria_gastos_variable_model->actualizarCategoriaGastosVariables($id_tipo_gastos_variables, $data)) {
                redirect(base_url() . "Formulario_Egresos/Categoria_gastos_variable");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formulario_Egresos/Categoria_gastos_variable/editar" . $id_tipo_gastos_variables);
            }
        } else {
            $this->editar($id_tipo_gastos_variables);
        }
    }


    public function borrar($id_tipo_gastos_variables)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Categoria_gastos_variable_model->actualizarCategoriaGastosVariables($id_tipo_gastos_variables, $data);
       echo "Formulario_Egresos/Categoria_gastos_variable";
    }

}