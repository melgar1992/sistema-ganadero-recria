<?php

class Control_animales extends BaseController
{
    public function listBovino()
    {
        $data = array(
            'estancias' => $this->Estancia_model->getEstancias(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),
            'Control_animales' => $this->Animales_model->getControlAnimalesBovinos(),

        );

        $this->loadView('control_animales', 'form/formulario_animales/control_animales/listbovinos', $data);
    }
    public function listAnimales()
    {
        $data = array(
            'estancias' => $this->Estancia_model->getEstancias(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),
            'Control_animales' => $this->Animales_model->getControlAnimales(),

        );

        $this->loadView('control_animales', 'form/formulario_animales/control_animales/listanimales', $data);
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
                        if ($cantidad < $animal->stock) {
                            $data = array(
                                'id_animal' => $animal->id_animal,
                                'cantidad' => $cantidad,
                                'tipo_movimiento' => $tipo_movimiento,
                                'fecha' => $fecha,

                            );
                            $this->Animales_model->guardarControl($data);
                            $nuevoStock = (int) $animal->stock - (int) $cantidad;
                            $datosAnimal = array(
                                'stock' => $nuevoStock,
                            );
                            $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                            redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        } else {
                            $this->session->set_flashdata("error", "No se pueden morir mas animales de los registrados!");
                            redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                        }
                        break;
                    case "Conteo":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControl($data);
                        if ($cantidad > $animal->stock) {
                            $this->session->set_flashdata("error", "Tu conteo actual no puede ser mayor que tu inventario!!");
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
                        $this->Animales_model->guardarControl($data);
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
                    $this->Animales_model->guardarControl($data);

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
    public function editarBovinos($id_detalle_venta_animales)
    {
        $data = array(
            'control_bovino' => $this->Animales_model->getControlAnimalBovino($id_detalle_venta_animales),
            'estancias' => $this->Estancia_model->getEstancias(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),
        );

        $this->loadView('control_animales', 'form/formulario_animales/control_animales/editarbovinos', $data);
    }
    public function editarAnimales($id_detalle_venta_animales)
    {
        $data = array(
            'control_animal' => $this->Animales_model->getControlAnimal($id_detalle_venta_animales),
            'estancias' => $this->Estancia_model->getEstancias(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos(),
        );

        $this->loadView('control_animales', 'form/formulario_animales/control_animales/editaranimales', $data);
    }
    public function actualizarControlBovino()
    {
        $id_detalle_venta_animales = $this->input->post('id_detalle_venta_animales');
        $id_estancia = $this->input->post('id_estancia');
        $cantidad = $this->input->post('cantidad');
        $tipo_movimiento = $this->input->post('tipo_movimiento');
        $fecha = $this->input->post('fecha');
        $id_tipo_animal = $this->input->post('raza');
        $categoria = $this->input->post('categoria');
        $sexo = $this->input->post('sexo');

        $this->form_validation->set_rules('cantidad', 'cantidad', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('id_detalle_venta_animales', 'id_detalle_venta_animales', 'required');

        if ($this->form_validation->run()) {
            $animal = $this->inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria);
            $controlActual = $this->Animales_model->getControlAnimalBovino($id_detalle_venta_animales);
            switch ($tipo_movimiento) {
                case "Muerte":
                    if ($cantidad < $animal->stock) {
                        $data = array(
                            'cantidad' => $cantidad,
                            'fecha' => $fecha,
                        );
                        $this->Animales_model->actualizarControl($id_detalle_venta_animales, $data);
                        $diferencia = (int) $cantidad - (int) $controlActual->cantidad;
                        $nuevoStock = (int) $animal->stock - (int) $diferencia;
                        $datosAnimal = array(
                            'stock' => $nuevoStock,
                        );
                        $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                        redirect(base_url() . 'Formulario_Animales/control_animales/listbovino');
                    } else {
                        $this->session->set_flashdata("error", "No se pueden morir mas animales de los registrados!");
                        redirect(base_url() . 'Formulario_Animales/control_animales/editarbovinos/' . $id_detalle_venta_animales);
                    }
                    break;
                case "Conteo":
                    $data = array(
                        'cantidad' => $cantidad,
                        'fecha' => $fecha,
                    );
                    $this->Animales_model->actualizarControl($id_detalle_venta_animales, $data);
                    if ($cantidad > $animal->stock) {
                        $this->session->set_flashdata("error", "Tu conteo actual no puede ser mayor que tu inventario!!");
                        redirect(base_url() . 'Formulario_Animales/control_animales/editarBovino' . $id_detalle_venta_animales);
                    } else {
                        redirect(base_url() . 'Formulario_Animales/control_animales/listBovino');
                    }

                    break;
                case "Nacimiento":
                    $data = array(
                        'cantidad' => $cantidad,
                        'fecha' => $fecha,
                    );
                    $this->Animales_model->actualizarControl($id_detalle_venta_animales, $data);
                    $diferencia = (int) $cantidad - (int) $controlActual->cantidad;
                    $nuevoStock = (int) $animal->stock + (int) $diferencia;
                    $datosAnimal = array(
                        'stock' => $nuevoStock,
                    );
                    $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                    redirect(base_url() . 'Formulario_Animales/control_animales/listbovino');
                    break;
            }
        } else {
            $this->session->set_flashdata("error", "No se llenaron los campos requeridos correctamente");
            redirect(base_url() . 'Formulario_Animales/control_animales/editarbovinos/' . $id_detalle_venta_animales);
        }
    }
    public function guarcarControlAnimal()
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
                        if ($cantidad < $animal->stock) {
                            $data = array(
                                'id_animal' => $animal->id_animal,
                                'cantidad' => $cantidad,
                                'tipo_movimiento' => $tipo_movimiento,
                                'fecha' => $fecha,

                            );
                            $this->Animales_model->guardarControl($data);
                            $nuevoStock = (int) $animal->stock - (int) $cantidad;
                            $datosAnimal = array(
                                'stock' => $nuevoStock,
                            );
                            $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                            redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                        } else {
                            $this->session->set_flashdata("error", "No se pueden morir mas animales de los registrados!");
                            redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                        }
                        break;
                    case "Conteo":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControl($data);
                        if ($cantidad > $animal->stock) {
                            $this->session->set_flashdata("error", "Tu conteo actual no puede ser mayor que tu inventario!!");
                            redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                        } else {
                            redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                        }

                        break;
                    case "Nacimiento":
                        $data = array(
                            'id_animal' => $animal->id_animal,
                            'cantidad' => $cantidad,
                            'tipo_movimiento' => $tipo_movimiento,
                            'fecha' => $fecha,

                        );
                        $this->Animales_model->guardarControl($data);
                        $nuevoStock = (int) $animal->stock + (int) $cantidad;
                        $datosAnimal = array(
                            'stock' => $nuevoStock,
                        );
                        $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                        redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
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
                    $this->Animales_model->guardarControl($data);

                    redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                } else {
                    $this->session->set_flashdata("error", "No se puede hacer control de animales no registrados!");
                    redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
                }
            }
        } else {
            $this->session->set_flashdata("error", "No se llenaron los campos requeridos correctamente");
            redirect(base_url() . 'Formulario_Animales/control_animales/listanimales');
        }
    }
    public function borrar($id_detalle_venta_animales)
    {
        $controlActual = $this->Animales_model->getControlAnimalBovino($id_detalle_venta_animales);
        $animal = $this->inventario_animales_model->buscarInventarioAnimal($controlActual->id_estancia, $controlActual->id_tipo_animal, $controlActual->sexo, $controlActual->categoria);
        switch ($controlActual->tipo_movimiento) {
            case "Muerte":
                if ($controlActual->cantidad < $animal->stock) {
                    $this->Animales_model->borrarControl($id_detalle_venta_animales);
                    $nuevoStock = (int) $animal->stock + (int) $controlActual->cantidad;
                    $datosAnimal = array(
                        'stock' => $nuevoStock,
                    );
                    $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                    echo 'Formulario_Animales/control_animales/listBovino';
                } else {
                    $this->session->set_flashdata("error", "No se pueden morir mas animales de los registrados!");
                    echo 'Formulario_Animales/control_animales/listBovino';
                }
                break;
            case "Conteo":
                $this->Animales_model->borrarControl($id_detalle_venta_animales);
                echo 'Formulario_Animales/control_animales/listBovino';
                break;
            case "Nacimiento":
                $this->Animales_model->borrarControl($id_detalle_venta_animales);
                $nuevoStock = (int) $animal->stock - (int) $controlActual->cantidad;
                $datosAnimal = array(
                    'stock' => $nuevoStock,
                );
                $this->Animales_model->actualizarAnimal($animal->id_animal, $datosAnimal);
                echo 'Formulario_Animales/control_animales/listBovino';
                break;
        }
        echo 'Formulario_Animales/control_animales/listBovino';
    }
}
