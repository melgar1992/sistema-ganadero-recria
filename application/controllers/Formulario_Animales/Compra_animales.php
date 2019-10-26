<?php

class Compra_animales extends BaseController
{
    public function index()
    {

        $data = array(
            'compra_animales' => $this->Compra_animales_model->getCompraAnimales(),
        );
        $this->loadView('Compra_animales', 'form/formulario_animales/compra_animales/list', $data);
    }
    public function addbovinos()
    {
        $data = array(
            'empleados' => $this->Empleado_model->getEmpleados(),
            'ganaderos' => $this->Ganadero_model->getGanaderosExterno(),
            'estancias' => $this->Estancia_model->getEstancias(),
            'transportistas' => $this->Transportista_model->getTransportistas(),
            'intermediarios' => $this->Intermediario_model->getIntermediarios(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos()

        );
        $this->loadView('Compra_animales', 'form/formulario_animales/compra_animales/addbovinos', $data);
    }

    public function guardarCompraBovinos()
    {
        //post que se van a guardar en la tabla de Compra de animales
        $usuario = $this->session->userdata('id_usuarios');
        $id_ganadero = $this->input->post('id_ganadero');
        $id_intermediario = $this->input->post('id_intermediario');
        $comision = $this->input->post('comision');
        $id_empleado = $this->input->post('id_empleado');
        $id_estancia = $this->input->post('id_estancia');
        $fecha = $this->input->post('fecha');
        $id_transportista = $this->input->post('id_transportista');
        $total = $this->input->post('suma_ganado');

        //post que se van a guardar en detalle de compra de animales
        //Por cada detalle se debe ingresar al inventario del la estancia destino
        $categoria = $this->input->post('categoria');
        $id_tipo_animal = $this->input->post('raza');
        $sexo = $this->input->post('sexo');
        $cantidad = $this->input->post('cantidad');
        $precio_unitario = $this->input->post('precio_unitario');
        $precio_transporte = $this->input->post('precio_transporte');
        $placa_camion = $this->input->post('placa_camion');
        $sub_total = $this->input->post('sub_total');


        //Validadcion de los forms, solo se validaran los implementado porque puede hacer una compra vacia para luego editarla y aumentarla.
        $this->form_validation->set_rules('ganadero', 'Id ganadero', 'required');
        $this->form_validation->set_rules('empleado', 'empleado', 'required');
        $this->form_validation->set_rules('estancia', 'estancia', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');
        $this->form_validation->set_rules('transportista', 'transportista', 'required');

        if ($this->form_validation->run()) {
            $datosCompraAnimal = array(
                'id_ganadero' => $id_ganadero,
                'id_usuarios' => $usuario,
                'id_intermediario' => $id_intermediario,
                'comision' => $comision,
                'id_empleado' => $id_empleado,
                'id_estancia' => $id_estancia,
                'fecha' => $fecha,
                'id_transportista' => $id_transportista,
                'total' => $total,
                'estado' => '1',
            );
            if ($this->Compra_animales_model->guardarCompraBovinos($datosCompraAnimal)) {
                $id_compra_animales = $this->Compra_animales_model->ultimoID();
                $this->guardar_detalle_compra_bovinos($id_estancia, $id_compra_animales, $categoria, $id_tipo_animal, $sexo, $cantidad, $precio_unitario, $precio_transporte, $placa_camion, $sub_total);
                redirect(base_url() . 'Formulario_Animales/Compra_animales/');
            } else {
                $this->session->set_flashdata("error", "No se pudieron guardar los datos");
                redirect(base_url() . 'Formulario_Animales/Compra_animales/addbovinos');
            }
        } else {
            $this->session->set_flashdata("error", "No se pudo validar la informacion");
            redirect(base_url() . 'Formulario_Animales/Compra_animales/addbovinos');
        }
    }
    protected function guardar_detalle_compra_bovinos($id_estancia, $id_compra_animales, $categoria, $id_tipo_animal, $sexo, $cantidad, $precio_unitario, $precio_transporte, $placa_camion, $sub_total)
    {
        if (!empty($categoria)) {
            for ($i = 0; $i < count($categoria); $i++) {

                // actualiza o crea el inventario de animales en la estancia correspondiente.
                if ($this->inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal[$i], $sexo[$i], $categoria[$i])) {
                    $animal = $this->inventario_animales_model->buscarInventarioAnimal($id_estancia, $id_tipo_animal[$i], $sexo[$i], $categoria[$i]);
                    $id_animal = $animal->id_animal;
                    $stock = $animal->stock + $cantidad[$i];
                    $datosAnimal = array(
                        'stock' => $stock,
                    );
                    $this->inventario_animales_model->actualizarInventario($id_animal, $datosAnimal);
                    $datosDetalle = array(
                        'id_animal' => $id_animal,
                        'id_compra_animales' => $id_compra_animales,
                        'cantidad' => $cantidad[$i],
                        'precio_unitario' => $precio_unitario[$i],
                        'sub_total' => $sub_total[$i],
                        'precio_transporte' => $precio_transporte[$i],
                        'placa_camion' => $placa_camion[$i],
                    );
                    $this->Compra_animales_model->guardarDetalleBovinos($datosDetalle);
                } else {
                    $datosAnimal = array(
                        'id_tipo_animal' => $id_tipo_animal[$i],
                        'id_estancia' => $id_estancia,
                        'sexo' => $sexo[$i],
                        'stock' => $cantidad[$i],
                        'categoria' => $categoria[$i],
                        'estado' => '1',
                    );
                    $this->inventario_animales_model->guardarInventario($datosAnimal);
                    $id_animal = $this->inventario_animales_model->ultimoID();
                    $datosDetalle = array(
                        'id_animal' => $id_animal,
                        'id_compra_animales' => $id_compra_animales,
                        'cantidad' => $cantidad[$i],
                        'precio_unitario' => $precio_unitario[$i],
                        'sub_total' => $sub_total[$i],
                        'precio_transporte' => $precio_transporte[$i],
                        'placa_camion' => $placa_camion[$i],
                    );
                    $this->Compra_animales_model->guardarDetalleBovinos($datosDetalle);
                }
            }
        }
    }
    public function editarBovinos($id_compra_animales)
    {
        $data = array(
            'compra_animal'=> $this->Compra_animales_model->getCompraAnimal($id_compra_animales),
            'detalle_movimiento_animales' => $this->Compra_animales_model->getDetalleMovimientos($id_compra_animales),
            'empleados' => $this->Empleado_model->getEmpleados(),
            'ganaderos' => $this->Ganadero_model->getGanaderosExterno(),
            'estancias' => $this->Estancia_model->getEstancias(),
            'transportistas' => $this->Transportista_model->getTransportistas(),
            'intermediarios' => $this->Intermediario_model->getIntermediarios(),
            'tipo_animales' => $this->Categoria_animales_model->getCategoriaAnimalBovinos()

        );
        $this->loadView('Compra_animales', 'form/formulario_animales/compra_animales/editarbovinos', $data);
        
    }
}
