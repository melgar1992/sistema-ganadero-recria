<?php

class Ganadero extends BaseController
{
    public function index()
    {
        $data = array(
            'ganaderos' => $this->Ganadero_model->getGanadero(),
        );

        $this->loadView('Ganadero', '/form/formulario_generales/ganadero/list', $data);
    
    }


}