<?php

class Productos extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'productos' => $this->Productos_model->getProductos(),
            'categorias' => $this->Categorias_model->getCategorias(),
        );

        $this->loadView('Productos', '/form/admin/productos/list', $data);
    }
    public function guardarProducto()
    {
        $codigo = $this->input->post("codigo");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $categoria = $this->input->post("categoria");

        $this->form_validation->set_rules("codigo", "Codigo", "required|is_unique[productos.codigo]");
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("precio", "Precio", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");

        if ($this->form_validation->run()) {
            $data = array(

                'id_categorias' => $categoria,
                'codigo' => $codigo,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                'estado' => "1"
            );

            if ($this->Productos_model->guardarProd($data)) {
                redirect(base_url() . "Mantenimiento/productos");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_producto)
    {
        $data = array(
            'producto' => $this->Productos_model->getProducto($id_producto),
            'categorias' => $this->Categorias_model->getCategorias(),
        );
        $this->loadView('Productos', '/form/admin/productos/editar', $data);
    }
    public function actualizarProducto()
    {
        $id_producto = $this->input->post("id_producto");
        $codigo = $this->input->post("codigo");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $categoria = $this->input->post("categoria");

        $productoActual = $this->Productos_model->getProducto($id_producto);
        if ($codigo == $productoActual->codigo) {
            $unique = '';
        } else {
            $unique = '|is_unique[productos.codigo]';
        }

        $this->form_validation->set_rules("codigo", "Codigo", "required" .$unique);
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("precio", "Precio", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");

        if ($this->form_validation->run()) {
            $data = array(

                'id_productos' => $id_producto,
                'id_categorias' => $categoria,
                'codigo' => $codigo,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                'estado' => "1"
            );

            if ($this->Productos_model->actualizar($id_producto, $data)) {
                redirect(base_url() . "Mantenimiento/productos");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        }
        else {
            $this->editar($id_producto);
        }
    }
    public function vista($id_producto)

    {
        $data = array(
            'producto' => $this->Productos_model->getProducto($id_producto),

        );

        $this->load->view("/form/admin/Productos/vista", $data);
    }
    public function borrar($id_producto)
    {
        $data = array(
            'estado' => "0",
        );

        if ($this->Productos_model->actualizar($id_producto, $data)) {
            redirect(base_url() . "Mantenimiento/productos");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
        }
    }
}
