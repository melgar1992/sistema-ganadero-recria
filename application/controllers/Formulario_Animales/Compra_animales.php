<?php

class Compra_animales extends BaseController
{
    public function index()
    {
    
        $data = array(
            'ingreso_aniamales' => $this->compra_animales_model->getIngresoAnimales() , );
    }


}