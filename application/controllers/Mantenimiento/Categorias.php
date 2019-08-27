<?php

class Categorias extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'categorias' => $this->Categorias_model->getCategorias(),
        );

        $this->loadView('Categorias', '/form/admin/categorias/list', $data);
    }
    public function guardarCategoria()
    {
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[categorias.nombre]");
        if ($this->form_validation->run()) {


            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => "1"
            );

            if ($this->Categorias_model->guardarCat($data)) {
                redirect(base_url() . "Mantenimiento/categorias");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }

        echo $nombre . " " . $descripcion;
    }
    public function editar($id_categoria)
    {

        $data = array(
            'categoria' => $this->Categorias_model->getCategoria($id_categoria),
        );
        $this->loadView('Categorias', '/form/admin/categorias/editar', $data);
    }
    public function actualizarCategoria()
    {
        $id_categoria = $this->input->post("id_categorias");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $categoriaActual=$this->Categorias_model->getCategoria($id_categoria);
        if ($nombre==$categoriaActual->nombre) {
            $unique='';

        }
        else{
            $unique='|is_unique[categorias.nombre]';
        }

        $this->form_validation->set_rules("nombre", "Nombre", "required".$unique);
        if ($this->form_validation->run()) {

            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => "1"
            );
            if ($this->Categorias_model->actualizar($id_categoria, $data)) {
                redirect(base_url() . "Mantenimiento/categorias");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Mantenimiento/categorias/editar" . $id_categoria);
            }
        }
        else {
            $this->editar($id_categoria);
        }

        
    }
    public function vista($id_categorias)

    {
        $data = array(
            'categoria' => $this->Categorias_model->getCategoria($id_categorias),

        );

        $this->load->view("/form/admin/categorias/vista", $data);
    }
    public function borrar($id_categorias)
    {
        $data = array(
            'estado' => "0",

        );
        $this->Categorias_model->actualizar($id_categorias, $data);
        echo "Mantenimiento/Categorias";
    }
}
