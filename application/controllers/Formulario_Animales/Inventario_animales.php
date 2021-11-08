<?php

class Inventario_animales extends BaseController
{
    public function index()
    {
        $data = array(
            'estancias' => $this->Estancia_model->getEstancias(),
            'stock_estancias_bovinos' => $this->Inventario_animales_model->getInventarioAnimalesBovinos(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos()

        );
        $this->loadView('Inventario_animales', 'form/formulario_animales/Inventario_animales/listbovinos', $data);
    }
    public function listAnimales()
    {
        $data = array(
            'estancias' => $this->Estancia_model->getEstancias(),
            'stock_estancias_bovinos' => $this->Inventario_animales_model->getInventarioAnimales(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos()

        );
        $this->loadView('Inventario_animales', 'form/formulario_animales/Inventario_animales/listanimales', $data);
    }
    public function guardarBovino()
    {
        $id_tipo_animal = $this->input->post('raza');
        $id_estancia = $this->input->post('id_estancia');
        $sexo = $this->input->post('sex');
        $stock = $this->input->post('cantidad');
        $categoria = $this->input->post('categoria');

        $this->form_validation->set_rules('raza', 'id tipo animal', 'required');
        $this->form_validation->set_rules('id_estancia', 'id estancia', 'required');
        $this->form_validation->set_rules('estancia', 'estancia', 'required');
        $this->form_validation->set_rules('categoria', 'categoria', 'required');
        $this->form_validation->set_rules('raza', 'id tipo animal', 'required');
        $this->form_validation->set_rules('sex', 'sexo del animal', 'required');
        if (!($this->Inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria))) {
            if ($this->form_validation->run()) {
                $data = array(
                    'id_tipo_animal' => $id_tipo_animal,
                    'id_estancia' => $id_estancia,
                    'sexo' => $sexo,
                    'stock' => $stock,
                    'categoria' => $categoria,
                    'estado' => '1',
                );
                $this->Inventario_animales_model->guardarInventario($data);
                $this->index();
            } else {
                $this->index();
            }
        } else {
            $this->session->set_flashdata("error", "Ya existe un stock con las mismos datos");
            $this->index();
        }
    }
    public function guardarAnimal()
    {
        $id_tipo_animal = $this->input->post('raza');
        $id_estancia = $this->input->post('id_estancia');
        $sexo = $this->input->post('sex');
        $stock = $this->input->post('cantidad');
        $categoria = $this->input->post('categoria');

        $this->form_validation->set_rules('raza', 'id tipo animal', 'required');
        $this->form_validation->set_rules('id_estancia', 'id estancia', 'required');
        $this->form_validation->set_rules('estancia', 'estancia', 'required');
        $this->form_validation->set_rules('categoria', 'categoria', 'required');
        $this->form_validation->set_rules('raza', 'id tipo animal', 'required');
        $this->form_validation->set_rules('sex', 'sexo del animal', 'required');
        if (!($this->Inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria))) {
            if ($this->form_validation->run()) {
                $data = array(
                    'id_tipo_animal' => $id_tipo_animal,
                    'id_estancia' => $id_estancia,
                    'sexo' => $sexo,
                    'stock' => $stock,
                    'categoria' => $categoria,
                    'estado' => '1',
                );
                $this->Inventario_animales_model->guardarInventario($data);
                $this->listAnimales();
            } else {
                $this->listAnimales();
            }
        } else {
            $this->session->set_flashdata("error", "Ya existe un stock con las mismos datos");
            $this->listAnimales();
        }
    }
    public function editarbovinos($id_animal)
    {
        $data = array(
            'animal' => $this->Inventario_animales_model->getInventarioAnimal($id_animal),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),

        );
        $this->loadView('Inventario_animales', 'form/formulario_animales/Inventario_animales/editarbovinos', $data);
    }
    public function editarAnimal($id_animal)
    {
        $data = array(
            'animal' => $this->Inventario_animales_model->getInventarioAnimal($id_animal),

        );
        $this->loadView('Inventario_animales', 'form/formulario_animales/Inventario_animales/editaranimal', $data);
    }
    public function actualizarBovino()
    {
        $id_animal = $this->input->post('id_animal');
        $stock = $this->input->post('cantidad');

        $this->form_validation->set_rules('id_animal', 'id_animal', 'required');
        $this->form_validation->set_rules('cantidad', 'stock ', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'stock' => $stock,
                'estado' => '1',
            );
            $this->Inventario_animales_model->actualizarInventario($id_animal, $data);
            $this->index();
        } else {
            $this->session->set_flashdata("error", "Error en los campos");
            $this->editarbovinos($id_animal);
        }
    }
    public function actualizarAnimal()
    {
        $id_animal = $this->input->post('id_animal');
        $stock = $this->input->post('cantidad');

        $this->form_validation->set_rules('id_animal', 'id_animal', 'required');
        $this->form_validation->set_rules('cantidad', 'stock ', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'stock' => $stock,
                'estado' => '1',
            );
            $this->Inventario_animales_model->actualizarInventario($id_animal, $data);
            $this->listAnimales();
        } else {
            $this->session->set_flashdata("error", "Error en los campos");
            $this->editarAnimal($id_animal);
        }
    }
    public function borrar($id_animal)
    {
        $data = array(
            'estado' => '0',
         );
         $this->Inventario_animales_model->borrar($id_animal,$data);

         echo 'Formulario_Animales/Inventario_animales';
    }
    public function cambioCategoria()
    {
        $this->Inventario_animales_model->cambioCategoriaBovinos();
       
        echo 'Formulario_Animales/Inventario_animales';

    }
}
