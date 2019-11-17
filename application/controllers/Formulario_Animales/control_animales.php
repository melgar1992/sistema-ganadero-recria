<?php

class control_animales extends BaseController
{
    public function listBovino()
    {
        $data = array(
            'estancias' => $this->Estancia_model->getEstancias(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),
            'Control_animales' => $this->Animales_model->getControlAnimalBovino(),

        );

        $this->loadView('control_animales', 'form/formulario_animales/control_animales/listbovinos', $data);
    }
    public function guardarControlBovino()
    {
        $id_estancia = $this->input->post('id_estancia');
        $cantidad = $this->input->post('cantidad');
        $tipo_movimiento = $this->input->post('tipo_movimiento');
        $fecha = $this->input->post('fecha');
        $id_tipo_animal = $this->input->post('raza');
        $categoria = $this->input->post('categoria');
        $sexo = $this->input->post('sexo');

        $this->form_validation->set_rules('id_estancia', 'id_estancia', 'required');
        $this->form_validation->set_rules('cantidad', 'cantidad', 'required');
        $this->form_validation->set_rules('estancia', 'estancia', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('tipo_movimiento', 'tipo_movimiento', 'required');
        $this->form_validation->set_rules('raza', 'raza', 'required');
        $this->form_validation->set_rules('categoria', 'categoria', 'required');
        $this->form_validation->set_rules('sexo', 'sexo', 'required');

        if ($this->form_validation->run()) {
            if ($this->inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria)) {
                $animal = $this->inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria);
                switch ($tipo_movimiento) {
                    case "Muerte":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControlBovino($data);
                        $nuevoStock = (int) $animal->stock - (int) $cantidad;
                        $datosAnimal = array(
                            'stock' => $nuevoStock,
                        );
                        $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                        redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        break;
                    case "Conteo":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControlBovino($data);
                        if ($cantidad > $animal->stock) {
                            $datosAnimal = array(
                                'stock' => $cantidad,
                            );
                            $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                            redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        } else {
                            redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        }

                        break;
                    case "Nacimiento":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControlBovino($data);
                        $nuevoStock = (int) $animal->stock + (int) $cantidad;
                        $datosAnimal = array(
                            'stock' => $nuevoStock,
                        );
                        $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                        redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        break;
                }
            } else {
                if ($tipo_movimiento == 'Nacimiento') {
                    $datosAnimal = array(
                        'id_estancia' => $id_estancia,
                        'id_tipo_animal' => $id_tipo_animal,
                        'sexo' => $sexo,
                        'categoria' => $categoria,
                        'stock' => $cantidad,
                        'estado' => '1',
                    );
                    $this->inventario_animales_model->guardarInventario($datosAnimal);
                    $id_animal = $this->inventario_animales_model->ultimoID();
                    $data = array(
                        'id_animal' => $id_animal,
                        'cantidad' => $cantidad,
                        'tipo_movimiento' => 'Nacimiento',
                        'fecha' => $fecha,

                    );
                    $this->Animales_model->guardarControlBovino($data);

                    redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                } else {
                    $this->session->set_flashdata("error", "No se puede hacer control de animales no registrados!");
                    redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                }
            }
        } else {
            $this->session->set_flashdata("error", "No se llenaron los campos requeridos correctamente");
            redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
        }
    }
}
