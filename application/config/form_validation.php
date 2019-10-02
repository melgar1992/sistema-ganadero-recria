<?php
$config = array(

    'persona' => array(
        array(
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'required'
        ),
        array(
            'field' => 'apellidos',
            'label' => 'apellidos',
            'rules' => 'required'
        ),
        array(
            'field' => 'ci',
            'label' => 'ci',
            'rules' => 'required',
        ),
        array(
            'field' => 'telefono',
            'label' => 'telefono',
            'rules' => 'required'
        )
    ),
    'transportista' => array(
        array(
            'field' => 'trayecto',
            'label' => 'trayecto',
            'rules' => 'required'
        ),
        array(
            'field' => 'tipo_transporte',
            'label' => 'tipo_transporte',
            'rules' => 'required'
        ),
    )

);
