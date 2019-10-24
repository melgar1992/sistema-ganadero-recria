<?php

class Compra_animales extends BaseController
{
    public function index()
    {

        $data = array(
            'compra_animales' => $this->Compra_animales_model->getCompraAnimales(),
        );
        $this->loadView('Compra_animales','form/formulario_animales/compra_animales/list',$data);
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
        $this->loadView('Compra_animales','form/formulario_animales/compra_animales/addbovinos',$data);
    }
  
}
